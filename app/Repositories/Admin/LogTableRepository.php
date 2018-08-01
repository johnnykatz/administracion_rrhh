<?php

namespace App\Repositories\Admin;

use App\Models\Admin\LogTable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LogTableRepository
 * @package App\Repositories\Admin
 * @version July 31, 2018, 6:11 pm UTC
 *
 * @method LogTable findWithoutFail($id, $columns = ['*'])
 * @method LogTable find($id, $columns = ['*'])
 * @method LogTable first($columns = ['*'])
 */
class LogTableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tabla',
        'registro_id',
        'campo',
        'valor_anterior',
        'valor_nuevo',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LogTable::class;
    }

    public function getLogTablesFilter($request)
    {
        $logTables = LogTable::from('log_tables as l')
            ->join('users as u', 'u.id', '=', 'l.user_id')
            ->select('l.*')
            ->orderBy('id', 'desc');
        if ($request['comodin'] != "") {
            $logTables->where(function ($query) use ($request) {
                $query->orWhere('l.campo', 'like', '%' . $request['comodin'] . '%')
                    ->orWhere('l.valor_anterior', 'like', '%' . $request['comodin'] . '%')
                    ->orWhere('l.valor_nuevo', 'like', '%' . $request['comodin'] . '%');
            });
        }
        if ($request['tabla'] != "") {
            $logTables->where('tabla', '=', $request['tabla']);
        }
        return $logTables->paginate(15);

    }
}
