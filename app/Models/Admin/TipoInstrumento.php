<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoInstrumento
 * @package App\Models\Admin
 * @version March 7, 2018, 11:46 pm UTC
 *
 * @property string nombre
 * @property string nombre_corto
 */
class TipoInstrumento extends Model
{
//    use SoftDeletes;

    public $table = 'tipos_instrumentos';


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
        'nombre' => 'required'
    ];

    public function instrumentos()
    {
        return $this->hasMany('App\Models\Admin\Instrumento');
    }

}
