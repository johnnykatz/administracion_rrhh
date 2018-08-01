<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Estructura;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstructuraRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 10:17 pm UTC
 *
 * @method Estructura findWithoutFail($id, $columns = ['*'])
 * @method Estructura find($id, $columns = ['*'])
 * @method Estructura first($columns = ['*'])
 */
class EstructuraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'estructura_padre',
        'nombre_reducido',
        'tipo_estructura_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estructura::class;
    }

    public function getEstructurasFilter($request)
    {
        $estructuras = Estructura::from('estructuras as e')
            ->join('tipos_estructuras as t', 't.id', '=', 'e.tipo_estructura_id')
            ->select('e.*')
            ->orderBy('nombre', 'asc');
        if (isset($request['comodin'])) {
            $estructuras->where(function ($query) use ($request) {
                $query->orWhere('e.nombre', 'like', '%' . $request['comodin'] . '%')
                    ->orWhere('e.nombre_corto', 'like', '%' . $request['comodin'] . '%')
                    ->orWhere('t.nombre', 'like', '%' . $request['comodin'] . '%');
            });
        }
        return $estructuras->paginate(15);
    }
}
