<?php

namespace App\Repositories\Admin;

use App\Models\Admin\TipoEstructura;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoEstructuraRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 10:13 pm UTC
 *
 * @method TipoEstructura findWithoutFail($id, $columns = ['*'])
 * @method TipoEstructura find($id, $columns = ['*'])
 * @method TipoEstructura first($columns = ['*'])
*/
class TipoEstructuraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TipoEstructura::class;
    }
}
