<?php

namespace App\Repositories\Admin;

use App\Models\Admin\TipoPuestoTrabajo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoPuestoTrabajoRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 11:50 pm UTC
 *
 * @method TipoPuestoTrabajo findWithoutFail($id, $columns = ['*'])
 * @method TipoPuestoTrabajo find($id, $columns = ['*'])
 * @method TipoPuestoTrabajo first($columns = ['*'])
*/
class TipoPuestoTrabajoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nombre_corto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TipoPuestoTrabajo::class;
    }
}
