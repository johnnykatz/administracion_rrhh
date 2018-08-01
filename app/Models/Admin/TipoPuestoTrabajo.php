<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoPuestoTrabajo
 * @package App\Models\Admin
 * @version March 7, 2018, 11:50 pm UTC
 *
 * @property string nombre
 * @property string nombre_corto
 */
class TipoPuestoTrabajo extends Model
{
//    use SoftDeletes;

    public $table = 'tipos_puestos_trabajos';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'nombre_corto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'nombre_corto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'nombre_corto' => 'required'
    ];

    public function puestosTrabajos()
    {
        return $this->hasMany('App\Models\Admin\PuestoTrabajo');
    }


}
