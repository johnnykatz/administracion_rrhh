<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UnidadOrganizacion
 * @package App\Models\Admin
 * @version March 7, 2018, 9:59 pm UTC
 *
 * @property string codigo
 * @property string nombre
 */
class UnidadOrganizacion extends Model
{
//    use SoftDeletes;

    public $table = 'unidades_organizaciones';

//    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'nombre' => 'string',
        'nombre_corto' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required',
        'nombre' => 'required',
        'nombre_corto' => 'required'
    ];

    public function getFullNameAttribute()
    {
        return $this->attributes['codigo'] . ' - ' . $this->attributes['nombre'];
    }

    public function puestosTrabajos()
    {
        return $this->hasMany('App\Models\Admin\PuestoTrabajo');
    }

}
