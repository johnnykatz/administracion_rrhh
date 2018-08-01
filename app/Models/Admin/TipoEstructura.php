<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoEstructura
 * @package App\Models\Admin
 * @version March 7, 2018, 10:13 pm UTC
 *
 * @property string nombre
 */
class TipoEstructura extends Model
{
//    use SoftDeletes;

    public $table = 'tipos_estructuras';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'nombre_corto',
        'slug',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'nombre_corto' => 'string',
        'slug' => 'string'
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

    public function estructuras()
    {
        return $this->hasMany('App\Models\Admin\Estructura');
    }
}
