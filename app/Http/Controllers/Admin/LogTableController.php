<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateLogTableRequest;
use App\Http\Requests\Admin\UpdateLogTableRequest;
use App\Models\Admin\LogTable;
use App\Repositories\Admin\LogTableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LogTableController extends AppBaseController
{
    /** @var  LogTableRepository */
    private $logTableRepository;

    public function __construct(LogTableRepository $logTableRepo)
    {
        $this->logTableRepository = $logTableRepo;
    }

    /**
     * Display a listing of the LogTable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->logTableRepository->pushCriteria(new RequestCriteria($request));
        $logTables = $this->logTableRepository->getLogTablesFilter($request);
        $tablas = array(
            'agentes' => 'agentes',
            'puestos_trabajos' => 'puestos_trabajos',
            'estructuras' => 'estructuras'

        );
        return view('admin.log_tables.index')
            ->with('tablas', $tablas)
            ->with('logTables', $logTables);
    }

    /**
     * Show the form for creating a new LogTable.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.log_tables.create');
    }

    /**
     * Store a newly created LogTable in storage.
     *
     * @param CreateLogTableRequest $request
     *
     * @return Response
     */
    public function store(CreateLogTableRequest $request)
    {
        $input = $request->all();

        $logTable = $this->logTableRepository->create($input);

        Flash::success('Log Table saved successfully.');

        return redirect(route('admin.logTables.index'));
    }

    /**
     * Display the specified LogTable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logTable = $this->logTableRepository->findWithoutFail($id);

        if (empty($logTable)) {
            Flash::error('Log Table not found');

            return redirect(route('admin.logTables.index'));
        }

        return view('admin.log_tables.show')->with('logTable', $logTable);
    }

    /**
     * Show the form for editing the specified LogTable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logTable = $this->logTableRepository->findWithoutFail($id);

        if (empty($logTable)) {
            Flash::error('Log Table not found');

            return redirect(route('admin.logTables.index'));
        }

        return view('admin.log_tables.edit')->with('logTable', $logTable);
    }

    /**
     * Update the specified LogTable in storage.
     *
     * @param  int $id
     * @param UpdateLogTableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogTableRequest $request)
    {
        $logTable = $this->logTableRepository->findWithoutFail($id);

        if (empty($logTable)) {
            Flash::error('Log Table not found');

            return redirect(route('admin.logTables.index'));
        }

        $logTable = $this->logTableRepository->update($request->all(), $id);

        Flash::success('Log Table updated successfully.');

        return redirect(route('admin.logTables.index'));
    }

    /**
     * Remove the specified LogTable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logTable = $this->logTableRepository->findWithoutFail($id);

        if (empty($logTable)) {
            Flash::error('Log Table not found');

            return redirect(route('admin.logTables.index'));
        }

        $this->logTableRepository->delete($id);

        Flash::success('Log Table deleted successfully.');

        return redirect(route('admin.logTables.index'));
    }
}
