<?php

namespace App\Repositories\Admin;

use App\Models\Admin\TipoAgente;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoAgenteRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 11:22 pm UTC
 *
 * @method TipoAgente findWithoutFail($id, $columns = ['*'])
 * @method TipoAgente find($id, $columns = ['*'])
 * @method TipoAgente first($columns = ['*'])
*/
class TipoAgenteRepository extends BaseRepository
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
        return TipoAgente::class;
    }
}
