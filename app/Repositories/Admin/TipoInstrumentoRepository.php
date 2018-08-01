<?php

namespace App\Repositories\Admin;

use App\Models\Admin\TipoInstrumento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoInstrumentoRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 11:46 pm UTC
 *
 * @method TipoInstrumento findWithoutFail($id, $columns = ['*'])
 * @method TipoInstrumento find($id, $columns = ['*'])
 * @method TipoInstrumento first($columns = ['*'])
*/
class TipoInstrumentoRepository extends BaseRepository
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
        return TipoInstrumento::class;
    }
}
