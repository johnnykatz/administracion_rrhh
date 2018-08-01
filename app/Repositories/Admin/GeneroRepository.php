<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Genero;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GeneroRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 10:21 pm UTC
 *
 * @method Genero findWithoutFail($id, $columns = ['*'])
 * @method Genero find($id, $columns = ['*'])
 * @method Genero first($columns = ['*'])
*/
class GeneroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nombre_reducido'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Genero::class;
    }
}
