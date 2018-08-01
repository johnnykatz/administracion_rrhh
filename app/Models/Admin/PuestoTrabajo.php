<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PuestoTrabajo
 * @package App\Models\Admin
 * @version March 7, 2018, 11:58 pm UTC
 *
 * @property string numero_instrumento
 * @property date fecha_instrumento
 * @property integer tipo_instrumento_id
 * @property boolean estado
 * @property string observacion
 * @property integer estructura_id
 * @property integer agente_id
 * @property integer situacion_laboral_id
 */
class PuestoTrabajo extends Model
{
//    use SoftDeletes;

    public $table = 'puestos_trabajos';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'numero_instrumento',
        'fecha_instrumento',
        'tipo_instrumento_id',
        'activo',
        'observacion',
        'estructura_id',
        'agente_id',
        'situacion_laboral_id',
        'agrupamiento_id',
        'unidad_organizacion_id',
        'tipo_puesto_trabajo_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'numero_instrumento' => 'string',
        'fecha_instrumento' => 'date',
        'tipo_instrumento_id' => 'integer',
        'activo' => 'boolean',
        'observacion' => 'string',
        'estructura_id' => 'integer',
        'agente_id' => 'integer',
        'situacion_laboral_id' => 'integer',
        'tipo_puesto_trabajo_id' => 'integer',
        'agrupamiento_id' => 'integer',
        'unidad_organizacion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'agente_id' => 'required'
    ];

    public function agente()
    {
        return $this->belongsTo('App\Models\Admin\Agente');
    }

    public function tipoInstrumento()
    {
        return $this->belongsTo('App\Models\Admin\TipoInstrumento');
    }

    public function estructura()
    {
        return $this->belongsTo('App\Models\Admin\Estructura');
    }

    public function situacionLaboral()
    {
        return $this->belongsTo('App\Models\Admin\SituacionLaboral');
    }

    public function agrupamiento()
    {
        return $this->belongsTo('App\Models\Admin\Agrupamiento');
    }

    public function unidadOrganizacion()
    {
        return $this->belongsTo('App\Models\Admin\UnidadOrganizacion');
    }

    public function tipoPuestoTrabajo()
    {
        return $this->belongsTo('App\Models\Admin\TipoPuestoTrabajo');
    }
}
