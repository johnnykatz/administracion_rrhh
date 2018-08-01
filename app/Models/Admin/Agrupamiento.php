<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agrupamiento
 * @package App\Models\Admin
 * @version March 7, 2018, 9:57 pm UTC
 *
 * @property string nombre
 * @property string descripcion
 */
class Agrupamiento extends Model
{
//    use SoftDeletes;

    public $table = 'agrupamientos';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion',
        'nombre_corto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string',
        'nombre_corto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    public function puestosTrabajos()
    {
        return $this->hasMany('App\Models\Admin\PuestoTrabajo');
    }

}
