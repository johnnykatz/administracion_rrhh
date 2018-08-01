<?php

namespace App\Repositories\Admin;

use App\Models\Admin\UnidadOrganizacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UnidadOrganizacionRepository
 * @package App\Repositories\Admin
 * @version March 7, 2018, 9:59 pm UTC
 *
 * @method UnidadOrganizacion findWithoutFail($id, $columns = ['*'])
 * @method UnidadOrganizacion find($id, $columns = ['*'])
 * @method UnidadOrganizacion first($columns = ['*'])
*/
class UnidadOrganizacionRepository extends BaseRepository
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
        return UnidadOrganizacion::class;
    }
}
