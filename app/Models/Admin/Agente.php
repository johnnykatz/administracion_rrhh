<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agente
 * @package App\Models\Admin
 * @version March 7, 2018, 11:44 pm UTC
 *
 * @property string apellido
 * @property string nombre
 * @property string dni
 * @property date fecha_nacimiento
 * @property string legajo
 * @property string categoria
 * @property date fecha_ingreso
 * @property string titulo
 * @property string motivo_baja
 * @property string observacion
 * @property integer agrupamiento_id
 * @property integer unidad_organizacion_id
 * @property integer estado_relacion_id
 * @property integer estado_agente_id
 * @property integer tipo_agente_id
 * @property integer genero_id
 * @property string telefono_fijo
 * @property string celular
 * @property string telefono_otro
 * @property string email
 * @property string direccion
 * @property string foto
 * @property string numero_tarjeta
 */
class Agente extends Model
{
//    use SoftDeletes;

    public $table = 'agentes';

//
//    protected $dates = ['deleted_at'];


    public $fillable = [
        'apellido',
        'nombre',
        'dni',
        'fecha_nacimiento',
        'legajo',
        'activo',
        'categoria',
        'fecha_ingreso',
        'titulo',
        'motivo_baja',
        'observacion',
        'estado_relacion_id',
        'tipo_agente_id',
        'genero_id',
        'telefono_fijo',
        'telefono_celular',
        'telefono_otro',
        'email',
        'direccion',
        'foto',
        'numero_tarjeta',
        'tramite_jubilacion',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'apellido' => 'string',
        'nombre' => 'string',
        'dni' => 'string',
        'fecha_nacimiento' => 'date',
        'legajo' => 'string',
        'activo' => 'boolean',
        'categoria' => 'string',
        'fecha_ingreso' => 'date',
        'titulo' => 'string',
        'observacion' => 'string',
        'estado_relacion_id' => 'integer',
        'tipo_agente_id' => 'integer',
        'genero_id' => 'integer',
        'telefono_fijo' => 'string',
        'telefono_celular' => 'string',
        'telefono_otro' => 'string',
        'email' => 'string',
        'direccion' => 'string',
        'foto' => 'string',
        'numero_tarjeta' => 'string',
        'tramite_jubilacion' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'apellido' => 'required',
        'nombre' => 'required',
        'dni' => 'required|unique:agentes',
    ];

    public function puestoTrabajo()
    {
        return $this->hasOne('App\Models\Admin\PuestoTrabajo');
    }

    public function estadoRelacion()
    {
        return $this->belongsTo('App\Models\Admin\EstadoRelacion');
    }

    public function tipoAgente()
    {
        return $this->belongsTo('App\Models\Admin\TipoAgente');
    }

    public function genero()
    {
        return $this->belongsTo('App\Models\Admin\Genero');
    }
}
