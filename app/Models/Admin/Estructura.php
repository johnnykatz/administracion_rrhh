<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estructura
 * @package App\Models\Admin
 * @version March 7, 2018, 10:17 pm UTC
 *
 * @property string nombre
 * @property integer estructura_padre
 * @property string nombre_reducido
 * @property integer tipo_estructura_id
 */
class Estructura extends Model
{
//    use SoftDeletes;

    public $table = 'estructuras';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'estructura_padre',
        'nombre_corto',
        'tipo_estructura_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'estructura_padre' => 'integer',
        'nombre_corto' => 'string',
        'tipo_estructura_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'estructura_padre' => 'nullable',
        'nombre_corto' => 'required'
    ];


    public function puestosTrabajos()
    {
        return $this->hasMany('App\Models\Admin\PuestoTrabajo');
    }

    public function tipoEstructura()
    {
        return $this->belongsTo('App\Models\Admin\TipoEstructura');
    }

    public function estructuraPadre()
    {
        return $this->belongsTo('App\Models\Admin\Estructura','estructura_padre');
    }

}
