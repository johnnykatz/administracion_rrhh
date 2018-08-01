<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Agente;
use App\Models\Admin\Estructura;
use Illuminate\Support\Facades\DB;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AgenteRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 11:44 pm UTC
 *
 * @method Agente findWithoutFail($id, $columns = ['*'])
 * @method Agente find($id, $columns = ['*'])
 * @method Agente first($columns = ['*'])
 */
class AgenteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'apellido',
        'nombre',
        'dni',
        'fecha_nacimiento',
        'legajo',
        'categoria',
        'fecha_ingreso',
        'titulo',
        'motivo_baja',
        'observacion',
        'agrupamiento_id',
        'unidad_organizacion_id',
        'estado_relacion_id',
        'estado_agente_id',
        'tipo_agente_id',
        'genero_id',
        'telefono_fijo',
        'celular',
        'telefono_otro',
        'email',
        'direccion',
        'foto',
        'numero_tarjeta'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agente::class;
    }

    public function getAgentesFilter($request, $excel = false)
    {
        if ($excel) {
            $agentes = DB::table('agentes as a')
                ->join('puestos_trabajos as p', function ($join) {
                    $join->on('p.agente_id', '=', 'a.id')
                        ->where('p.activo', true);
                })->leftJoin('agrupamientos as ag', 'ag.id', '=', 'p.agrupamiento_id')
                ->leftJoin('unidades_organizaciones as uo', 'uo.id', '=', 'p.unidad_organizacion_id')
                ->leftJoin('estados_relaciones as er', 'er.id', '=', 'a.estado_relacion_id')
                ->leftjoin('situaciones_laborales as sl', 'sl.id', '=', 'p.situacion_laboral_id')
                ->leftjoin('tipos_instrumentos as ti', 'ti.id', '=', 'p.tipo_instrumento_id')
                ->leftjoin('tipos_puestos_trabajos as tp', 'tp.id', '=', 'p.tipo_puesto_trabajo_id')
                ->leftjoin('estructuras as e', 'e.id', '=', 'p.estructura_id');
        } else {
            $agentes = Agente::from('agentes as a')
                ->join('puestos_trabajos as p', function ($join) {
                    $join->on('p.agente_id', '=', 'a.id')
                        ->where('p.activo', true);
                });
        }
        if (isset($request['comodin'])) {
            $agentes->where(function ($query) use ($request) {
                $query->orWhere('a.nombre', 'like', '%' . $request['comodin'] . '%')
                    ->orWhere('a.apellido', 'like', '%' . $request['comodin'] . '%')
                    ->orWhere('a.dni', 'like', '%' . $request['comodin'] . '%')
                    ->orWhere('a.legajo', 'like', '%' . $request['comodin'] . '%')
                    ->orWhere('a.numero_tarjeta', 'like', '%' . $request['comodin'] . '%');
            });
        }
        if (isset($request['activo']) && $request['activo'] != "") {
            $agentes->where('a.activo', $request['activo']);
        }
        if (isset($request['genero_id']) && $request['genero_id'] != "") {
            $agentes->where('a.genero_id', $request['genero_id']);
        }
        if (isset($request['estado_relacion_id']) && $request['estado_relacion_id'] != "") {
            $agentes->where('a.estado_relacion_id', $request['estado_relacion_id']);
        }
        if (isset($request['tipo_agente_id']) && $request['tipo_agente_id'] != "") {
            $agentes->where('a.tipo_agente_id', $request['tipo_agente_id']);
        }
        if (isset($request['unidad_organizacion_id']) && $request['unidad_organizacion_id'] != "") {
            $agentes->where('p.unidad_organizacion_id', $request['unidad_organizacion_id']);
        }
        if (isset($request['estructura_id']) && $request['estructura_id'] != "") {
            if (isset($request['dependencia']) && $request['dependencia'] == 'SI') {
                $estructuras=$this->getDependencias($request['estructura_id']);
            } else {
                $estructuras=[$request['estructura_id']];
            }
//            $a=implode(",",$estructuras);
            $agentes->whereIn('p.estructura_id',$estructuras);
        }
        if (isset($request['situacion_laboral_id']) && $request['situacion_laboral_id'] != "") {
            $agentes->where('p.situacion_laboral_id', $request['situacion_laboral_id']);
        }

        if (isset($request['tipo_puesto_trabajo_id']) && $request['tipo_puesto_trabajo_id'] != "") {
            $agentes->where('p.tipo_puesto_trabajo_id', $request['tipo_puesto_trabajo_id']);
        }
        if (isset($request['tramite_jubilacion']) && $request['tramite_jubilacion'] != "") {
            $agentes->where('a.tramite_jubilacion', $request['tramite_jubilacion']);
        }
        if ($excel) {
            $agentes = $agentes->select(DB::raw('IF(a.activo=true,"SI","NO") as ACTIVO'), DB::raw('DATE_FORMAT(a.fecha_nacimiento,"%d/%m/%Y") as FECHA_NAC'), 'a.legajo AS LEG', DB::raw("CONCAT(a.apellido,' ',a.nombre) AS APELLIDO_Y_NOMBRE"), 'a.categoria AS CAT',
                'a.dni AS DNI', DB::raw('DATE_FORMAT(a.fecha_ingreso,"%d/%m/%Y") as FECHA_INGRESO'), 'ag.nombre_corto as AG', 'uo.codigo as UO', 'er.nombre_corto as EST', 'a.titulo AS TITULO', 'sl.nombre_corto as SITUACION',
                'e.nombre as PRESTA_SERVICIOS', 'tp.nombre_corto as PUESTO_TRABAJO', DB::raw("CONCAT(ti.nombre_corto,' ',p.numero_instrumento) AS INST_LEG"), DB::raw('DATE_FORMAT(p.fecha_instrumento,"%d/%m/%Y") as FECHA_INST'))
                ->groupBy('a.id')
                ->orderBy('a.activo', 'desc')
                ->orderBy('a.apellido', 'ASC')
                ->orderBy('a.nombre', 'ASC')
                ->get();
        } else {
            $agentes = $agentes->select('a.*')
                ->groupBy('a.id')
                ->orderBy('a.activo', 'desc')
                ->orderBy('a.apellido', 'ASC')
                ->orderBy('a.nombre', 'ASC')
                ->paginate();
        }
//        dd(DB::getQueryLog());

        return $agentes;
    }

    private function getDependencias($parent = 0, $arrayEstructuras = array())
    {
        if (count($arrayEstructuras) == 0)
            $arrayEstructuras[] = $parent;
        $result = Estructura::where('estructura_padre', $parent)->get();
        if ($result->count() > 0) {
            foreach ($result as $item) {
                $arrayEstructuras[] = $item->id;
                $arrayEstructuras = $this->getDependencias($item->id, $arrayEstructuras);
            }
        }
        return $arrayEstructuras;
    }

}
