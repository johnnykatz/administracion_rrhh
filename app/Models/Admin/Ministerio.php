<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Ministerio
 * @package App\Models\Admin
 * @version March 7, 2018, 11:44 pm UTC
 *
 */
class Ministerio extends Model
{
//    use SoftDeletes;

    public $table = 'ministerio';

    public $fillable = [
        'leyenda_anio',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'leyenda_anio' => 'text',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];
}
