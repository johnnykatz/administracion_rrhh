<?php

namespace App\Repositories\Admin;

use App\Models\Admin\EstadoRelacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoRelacionRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 10:01 pm UTC
 *
 * @method EstadoRelacion findWithoutFail($id, $columns = ['*'])
 * @method EstadoRelacion find($id, $columns = ['*'])
 * @method EstadoRelacion first($columns = ['*'])
*/
class EstadoRelacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo',
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EstadoRelacion::class;
    }
}
