<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstadoRelacion
 * @package App\Models\Admin
 * @version March 7, 2018, 10:01 pm UTC
 *
 * @property string codigo
 * @property string nombre
 */
class EstadoRelacion extends Model
{
//    use SoftDeletes;

    public $table = 'estados_relaciones';
    

//    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_corto',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_corto' => 'string',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_corto' => 'required',
        'nombre' => 'required'
    ];

    public function agentes()
    {
        return $this->hasMany('App\Models\Admin\Agente');
    }
    
}
