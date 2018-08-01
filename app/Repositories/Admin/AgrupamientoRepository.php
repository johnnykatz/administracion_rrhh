<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Agrupamiento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AgrupamientoRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 9:57 pm UTC
 *
 * @method Agrupamiento findWithoutFail($id, $columns = ['*'])
 * @method Agrupamiento find($id, $columns = ['*'])
 * @method Agrupamiento first($columns = ['*'])
*/
class AgrupamientoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agrupamiento::class;
    }
}
