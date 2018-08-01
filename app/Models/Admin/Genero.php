<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Genero
 * @package App\Models\Admin
 * @version March 7, 2018, 10:21 pm UTC
 *
 * @property string nombre
 * @property string nombre_reducido
 */
class Genero extends Model
{
//    use SoftDeletes;

    public $table = 'generos';
    

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

    public function agentes()
    {
        return $this->hasMany('App\Models\Admin\Agente');
    }
    
}
