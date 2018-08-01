<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LogTable
 * @package App\Models\Admin
 * @version July 31, 2018, 6:11 pm UTC
 *
 * @property string tabla
 * @property integer registro_id
 * @property string campo
 * @property string valor_anterior
 * @property string valor_nuevo
 * @property integer user_id
 */
class LogTable extends Model
{
    public $table = 'log_tables';

    public $fillable = [
        'tabla',
        'registro_id',
        'campo',
        'operacion',
        'valor_anterior',
        'valor_nuevo',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tabla' => 'string',
        'registro_id' => 'integer',
        'operacion' => 'string',
        'campo' => 'string',
        'valor_anterior' => 'string',
        'valor_nuevo' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
