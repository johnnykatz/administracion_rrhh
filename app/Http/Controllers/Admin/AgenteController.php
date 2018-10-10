<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateAgenteRequest;
use App\Http\Requests\Admin\UpdateAgenteRequest;
use App\Models\Admin\Agente;
use App\Models\Admin\Agrupamiento;
use App\Models\Admin\EstadoAgente;
use App\Models\Admin\EstadoRelacion;
use App\Models\Admin\Estructura;
use App\Models\Admin\Genero;
use App\Models\Admin\LogTable;
use App\Models\Admin\Ministerio;
use App\Models\Admin\PuestoTrabajo;
use App\Models\Admin\SituacionLaboral;
use App\Models\Admin\TipoAgente;
use App\Models\Admin\TipoInstrumento;
use App\Models\Admin\TipoPuestoTrabajo;
use App\Models\Admin\UnidadOrganizacion;
use App\Providers\LogTablesProvider;
use App\Repositories\Admin\AgenteRepository;
use App\Http\Controllers\AppBaseController;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Flash;
//use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AgenteController extends AppBaseController
{
    /** @var  AgenteRepository */
    private $agenteRepository;

    public function __construct(AgenteRepository $agenteRepo)
    {
        $this->agenteRepository = $agenteRepo;
    }

    /**
     * Display a listing of the Agente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $agentes = $this->agenteRepository->getAgentesFilter($request);

        $tiposAgentes = TipoAgente::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $agrupamientos = Agrupamiento::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $unidadesOrganizaciones = UnidadOrganizacion::orderBy("codigo", 'ASC')->get()->pluck('codigo', 'id');
        $estadosRelaciones = EstadoRelacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $tiposPuestosTrabajos = TipoPuestoTrabajo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $situacionesLaborales = SituacionLaboral::orderBy('nombre', 'ASC')->pluck('nombre_corto', 'id');
        $estructuras = Estructura::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('admin.agentes.index')
            ->with(['agentes' => $agentes,
                "generos" => $generos,
                "tiposAgentes" => $tiposAgentes,
                "agrupamientos" => $agrupamientos,
                "unidadesOrganizaciones" => $unidadesOrganizaciones,
                "estadosRelaciones" => $estadosRelaciones,
                "tiposPuestosTrabajos" => $tiposPuestosTrabajos,
                "situacionesLaborales" => $situacionesLaborales,
                "estructuras" => $estructuras,
                "filtro" => $request->all()

            ]);
    }

    /**
     * Show the form for creating a new Agente.
     *
     * @return Response
     */
    public function create()
    {
        $tiposAgentes = TipoAgente::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $agrupamientos = Agrupamiento::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $unidadesOrganizaciones = UnidadOrganizacion::orderBy("codigo", 'ASC')->get()->pluck('full_name', 'id');
        $estadosRelaciones = EstadoRelacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $tiposPuestosTrabajos = TipoPuestoTrabajo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $situacionesLaborales = SituacionLaboral::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $tiposInstrumentos = TipoInstrumento::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estructuras = Estructura::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('admin.agentes.create')->with(
            [
                "generos" => $generos,
                "tiposAgentes" => $tiposAgentes,
                "agrupamientos" => $agrupamientos,
                "unidadesOrganizaciones" => $unidadesOrganizaciones,
                "estadosRelaciones" => $estadosRelaciones,
                "tiposPuestosTrabajos" => $tiposPuestosTrabajos,
                "situacionesLaborales" => $situacionesLaborales,
                "tiposInstrumentos" => $tiposInstrumentos,
                "estructuras" => $estructuras,
            ]
        );
    }

    /**
     * Store a newly created Agente in storage.
     *
     * @param CreateAgenteRequest $request
     *
     * @return Response
     */
    public function store(CreateAgenteRequest $request)
    {
        $request['fecha_ingreso'] = ($request['fecha_ingreso']) ? date("Y-m-d", strtotime($request['fecha_ingreso'])) : null;
        $request['fecha_nacimiento'] = ($request['fecha_nacimiento']) ? date("Y-m-d", strtotime($request['fecha_nacimiento'])) : null;
        $request['fecha_instrumento'] = ($request['fecha_instrumento']) ? date("Y-m-d", strtotime($request['fecha_instrumento'])) : null;
        $input = $request->all();


        $agente = $this->agenteRepository->create($input);
        //guardo log
        LogTablesProvider::setLogTable('create', $agente, null);

        $puestoTrabajo = new PuestoTrabajo();
        $puestoTrabajo->agente_id = $agente->id;
        $puestoTrabajo->unidad_organizacion_id = $request['unidad_organizacion_id'];
        $puestoTrabajo->tipo_puesto_trabajo_id = $request['tipo_puesto_trabajo_id'];
        $puestoTrabajo->tipo_instrumento_id = $request['tipo_instrumento_id'];
        $puestoTrabajo->estructura_id = $request['estructura_id'];
        $puestoTrabajo->situacion_laboral_id = $request['situacion_laboral_id'];
        $puestoTrabajo->agrupamiento_id = $request['agrupamiento_id'];
        $puestoTrabajo->numero_instrumento = $request['numero_instrumento'];
        $puestoTrabajo->fecha_instrumento = ($request['fecha_instrumento']) ? date("Y-m-d", strtotime($request['fecha_instrumento'])) : null;
        $puestoTrabajo->save();

        LogTablesProvider::setLogTable('create', $puestoTrabajo, null);

        Flash::success('Agente guardado con éxito.');

        return redirect(route('admin.agentes.index'));
    }

    /**
     * Display the specified Agente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);
        $puestoTrabajo = PuestoTrabajo::where('agente_id', $agente->id)->first();
        if ($puestoTrabajo) {
            $puestoTrabajoId = $puestoTrabajo->id;
        } else {
            $puestoTrabajoId = null;
        }
        $log = LogTable::where('tabla', 'agentes')
            ->where('registro_id', $agente->id)
            ->orWhere(function ($sql) use ($puestoTrabajoId) {
                $sql->where('tabla', 'puestos_trabajos')
                    ->where('registro_id', $puestoTrabajoId);
            })
            ->orderBy('id','desc')
            ->get();

        if (empty($agente)) {
            Flash::error('Agente not found');

            return redirect(route('admin.agentes.index'));
        }

        return view('admin.agentes.show')
            ->with('log', $log)
            ->with('agente', $agente);
    }

    /**
     * Show the form for editing the specified Agente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);

        if (empty($agente)) {
            Flash::error('Agente not found');

            return redirect(route('admin.agentes.index'));
        }
        $tiposAgentes = TipoAgente::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $agrupamientos = Agrupamiento::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $unidadesOrganizaciones = UnidadOrganizacion::orderBy("codigo", 'ASC')->get()->pluck('full_name', 'id');
        $estadosRelaciones = EstadoRelacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $tiposPuestosTrabajos = TipoPuestoTrabajo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $situacionesLaborales = SituacionLaboral::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $tiposInstrumentos = TipoInstrumento::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estructuras = Estructura::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('admin.agentes.edit')->with(
            [
                'agente' => $agente,
                'puestoTrabajo' => $agente->puestoTrabajo,
                "generos" => $generos,
                "tiposAgentes" => $tiposAgentes,
                "agrupamientos" => $agrupamientos,
                "unidadesOrganizaciones" => $unidadesOrganizaciones,
                "estadosRelaciones" => $estadosRelaciones,
                "tiposPuestosTrabajos" => $tiposPuestosTrabajos,
                "situacionesLaborales" => $situacionesLaborales,
                "tiposInstrumentos" => $tiposInstrumentos,
                "estructuras" => $estructuras,
            ]);
    }

    /**
     * Update the specified Agente in storage.
     *
     * @param  int $id
     * @param UpdateAgenteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgenteRequest $request)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);
        $agenteOld = clone $agente;
        if (empty($agente)) {
            Flash::error('Agente not found');

            return redirect(route('admin.agentes.index'));
        }

        $request['fecha_nacimiento'] = ($request['fecha_nacimiento']) ? date("Y-m-d", strtotime($request['fecha_nacimiento'])) : null;
        $request['fecha_instrumento'] = ($request['fecha_instrumento']) ? date("Y-m-d", strtotime($request['fecha_instrumento'])) : null;
        $request['fecha_ingreso'] = ($request['fecha_ingreso']) ? date("Y-m-d", strtotime($request['fecha_ingreso'])) : null;
        $agente = $this->agenteRepository->update($request->all(), $id);
        LogTablesProvider::setLogTable('update', $agente, $agenteOld);

        $puestoTrabajo = $agente->puestoTrabajo;
        $puestoTrabajoOld = clone $puestoTrabajo;

        $puestoTrabajo->unidad_organizacion_id = $request['unidad_organizacion_id'];
        $puestoTrabajo->tipo_puesto_trabajo_id = $request['tipo_puesto_trabajo_id'];
        $puestoTrabajo->tipo_instrumento_id = $request['tipo_instrumento_id'];
        $puestoTrabajo->estructura_id = $request['estructura_id'];
        $puestoTrabajo->situacion_laboral_id = $request['situacion_laboral_id'];
        $puestoTrabajo->agrupamiento_id = $request['agrupamiento_id'];
        $puestoTrabajo->numero_instrumento = $request['numero_instrumento'];
        $puestoTrabajo->fecha_instrumento = ($request['fecha_instrumento']) ? date("Y-m-d", strtotime($request['fecha_instrumento'])) : null;
        $puestoTrabajo->save();

        LogTablesProvider::setLogTable('update', $puestoTrabajo, $puestoTrabajoOld);


        Flash::success('Agente actualizado con exito.');

        return redirect(route('admin.agentes.index'));
    }

    /**
     * Remove the specified Agente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);

        if (empty($agente)) {
            Flash::error('Agente not found');

            return redirect(route('admin.agentes.index'));
        }

        $this->agenteRepository->delete($id);

        Flash::success('Agente deleted successfully.');

        return redirect(route('admin.agentes.index'));
    }

    public function listadoAgentesExcel(Request $request)
    {
        $agentes = $this->agenteRepository->getAgentesFilter($request, true);
        $agentesArray = array();
        foreach ($agentes as $agente) {
            $agente = (array)$agente;
            $agentesArray[] = $agente;

        }
        Excel::create('Listado de agentes -' . date("Y-m-d"), function ($excel) use ($agentesArray) {
            $excel->sheet('Agentes', function ($sheet) use ($agentesArray) {
                $sheet->fromArray($agentesArray);
            });
        })->export("xls");
    }

    public function generarSituacionRevista($id)
    {
        $agente = Agente::find($id);
        if ($agente->fecha_ingres != "") {
            $agente->antiguedad = Carbon::createFromFormat('Y-m-d', $agente->fecha_ingreso)->age;
        } else {
            $agente->antiguedad = null;
        }
        if (isset($agente->puestoTrabajo->tipo_instrumento_id)) {
            $instrumento = $agente->puestoTrabajo->tipoInstrumento->nombre_corto . " " . $agente->puestoTrabajo->numero_instrumento;
            if ($agente->puestoTrabajo->tipo_instrumento_id != 1 and $agente->puestoTrabajo->fecha_instrumento != "") {
                $instrumento .= "  de fecha " . date("d-m-Y", strtotime($agente->puestoTrabajo->fecha_instrumento));
            }
            $agente->instrumento = $instrumento;
        } else {
            $agente->instrumento = "EN TRAMITE";
        }
        \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isJavascriptEnabled' => true, 'defaultFont' => 'sans-serif']);


//        $pdf = \PDF::loadView('admin.agentes.estructura_situacion_revista', compact('agente'));
//        return $pdf->download('invoice.pdf');

        $ministerio = Ministerio::find(1);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('admin.agentes.estructura_situacion_revista')
            ->with([
                "agente" => $agente,
                "ministerio" => $ministerio,
            ]));
        return $pdf->stream();

    }
}
