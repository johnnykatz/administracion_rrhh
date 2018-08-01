<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Ministerio;
use Illuminate\Support\Facades\DB;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MinisterioRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 11:44 pm UTC
 *
 * @method Ministerio findWithoutFail($id, $columns = ['*'])
 * @method Ministerio find($id, $columns = ['*'])
 * @method Ministerio first($columns = ['*'])
 */
class MinisterioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'leyenda_anio',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ministerio::class;
    }

}
