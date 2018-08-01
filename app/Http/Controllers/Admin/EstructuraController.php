<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateEstructuraRequest;
use App\Http\Requests\Admin\UpdateEstructuraRequest;
use App\Models\Admin\Estructura;
use App\Models\Admin\LogTable;
use App\Models\Admin\TipoEstructura;
use App\Models\Admin\TipoInstrumento;
use App\Providers\LogTablesProvider;
use App\Repositories\Admin\EstructuraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstructuraController extends AppBaseController
{
    /** @var  EstructuraRepository */
    private $estructuraRepository;

    public function __construct(EstructuraRepository $estructuraRepo)
    {
        $this->estructuraRepository = $estructuraRepo;
    }

    /**
     * Display a listing of the Estructura.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estructuraRepository->pushCriteria(new RequestCriteria($request));
        $estructuras = $this->estructuraRepository->getEstructurasFilter($request);
        return view('admin.estructuras.index')
            ->with('estructuras', $estructuras);
    }

    /**
     * Show the form for creating a new Estructura.
     *
     * @return Response
     */
    public function create()
    {
        $estructuras = Estructura::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $tiposEstructuras = TipoEstructura::orderBy('nombre', 'asc')->pluck('nombre', 'id');

        return view('admin.estructuras.create')
            ->with('estructuras', $estructuras)
            ->with('tiposEstructuras', $tiposEstructuras);
    }

    /**
     * Store a newly created Estructura in storage.
     *
     * @param CreateEstructuraRequest $request
     *
     * @return Response
     */
    public function store(CreateEstructuraRequest $request)
    {
        $input = $request->all();

        $estructura = $this->estructuraRepository->create($input);
        //guardo log
        LogTablesProvider::setLogTable('create', $estructura, null);
        Flash::success('Estructura saved successfully.');

        return redirect(route('admin.estructuras.index'));
    }

    /**
     * Display the specified Estructura.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estructura = $this->estructuraRepository->findWithoutFail($id);

        if (empty($estructura)) {
            Flash::error('Estructura not found');

            return redirect(route('admin.estructuras.index'));
        }
        $log = LogTable::where('tabla', 'estructuras')->where('registro_id', $estructura->id)->orderBy('id', 'desc')->get();

        return view('admin.estructuras.show')
            ->with('log', $log)
            ->with('estructura', $estructura);
    }

    /**
     * Show the form for editing the specified Estructura.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estructura = $this->estructuraRepository->findWithoutFail($id);

        if (empty($estructura)) {
            Flash::error('Estructura not found');

            return redirect(route('admin.estructuras.index'));
        }
        $estructuras = Estructura::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $tiposEstructuras = TipoEstructura::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        return view('admin.estructuras.edit')
            ->with('estructuras', $estructuras)
            ->with('tiposEstructuras', $tiposEstructuras)
            ->with('estructura', $estructura);
    }

    /**
     * Update the specified Estructura in storage.
     *
     * @param  int $id
     * @param UpdateEstructuraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstructuraRequest $request)
    {
        $estructura = $this->estructuraRepository->findWithoutFail($id);
        $estructuraOld = clone $estructura;
        if (empty($estructura)) {
            Flash::error('Estructura not found');

            return redirect(route('admin.estructuras.index'));
        }

        $estructura = $this->estructuraRepository->update($request->all(), $id);
        LogTablesProvider::setLogTable('update', $estructura, $estructuraOld);

        Flash::success('Estructura updated successfully.');

        return redirect(route('admin.estructuras.index'));
    }

    /**
     * Remove the specified Estructura from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estructura = $this->estructuraRepository->findWithoutFail($id);

        if (empty($estructura)) {
            Flash::error('Estructura not found');

            return redirect(route('admin.estructuras.index'));
        }

        $this->estructuraRepository->delete($id);

        Flash::success('Estructura deleted successfully.');

        return redirect(route('admin.estructuras.index'));
    }

    public function nuevaEstructuraExterna(Request $request)
    {
        $estructura = Estructura::where('nombre', trim($request['nombre_estructura']))->first();
        if (!$estructura) {
            $tipoEstructura = TipoEstructura::where('slug', 'externo')->first();
            $estructura = new Estructura();
            $estructura->tipo_estructura_id = $tipoEstructura->id;
            $estructura->nombre = trim($request['nombre_estructura']);
            $estructura->nombre_corto = trim($request['nombre_corto_estructura']);
            $estructura->save();
            LogTablesProvider::setLogTable('create', $estructura, null);
            $result['estado'] = 'success';
            $result['id'] = $estructura->id;
        } else {
            $result['id'] = $estructura->id;
            $result['estado'] = 'error';
            $result['mensaje'] = 'Ya existe el lugar de trabajo que intenta ingresar';
        }
        return response()->json($result);
    }

    public function getEstructurasAjax(Request $request)
    {
        $estructuras = Estructura::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return response()->json($estructuras);
    }
}
