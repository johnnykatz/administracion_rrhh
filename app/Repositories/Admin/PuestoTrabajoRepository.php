<?php

namespace App\Repositories\Admin;

use App\Models\Admin\PuestoTrabajo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PuestoTrabajoRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 11:58 pm UTC
 *
 * @method PuestoTrabajo findWithoutFail($id, $columns = ['*'])
 * @method PuestoTrabajo find($id, $columns = ['*'])
 * @method PuestoTrabajo first($columns = ['*'])
*/
class PuestoTrabajoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero_instrumento',
        'fecha_instrumento',
        'tipo_instrumento_id',
        'estado',
        'observacion',
        'estructura_id',
        'agente_id',
        'situacion_laboral_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PuestoTrabajo::class;
    }
}
