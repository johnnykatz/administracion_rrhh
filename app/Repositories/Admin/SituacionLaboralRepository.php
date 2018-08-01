<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SituacionLaboral;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SituacionLaboralRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 10:05 pm UTC
 *
 * @method SituacionLaboral findWithoutFail($id, $columns = ['*'])
 * @method SituacionLaboral find($id, $columns = ['*'])
 * @method SituacionLaboral first($columns = ['*'])
*/
class SituacionLaboralRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'codigo',
        'nombre_reducido'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SituacionLaboral::class;
    }
}
