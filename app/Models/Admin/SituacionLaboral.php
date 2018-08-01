<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SituacionLaboral
 * @package App\Models\Admin
 * @version March 7, 2018, 10:05 pm UTC
 *
 * @property string nombre
 * @property string codigo
 * @property string nombre_reducido
 */
class SituacionLaboral extends Model
{
//    use SoftDeletes;

    public $table = 'situaciones_laborales';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'codigo',
        'nombre_corto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'codigo' => 'string',
        'nombre_corto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'codigo' => 'required',
        'nombre_corto' => 'required'
    ];

    public function puestosTrabajos()
    {
        return $this->hasMany('App\Models\Admin\PuestoTrabajo');
    }
}
