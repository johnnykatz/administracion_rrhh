<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSituacionLaboralRequest;
use App\Http\Requests\Admin\UpdateSituacionLaboralRequest;
use App\Repositories\Admin\SituacionLaboralRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SituacionLaboralController extends AppBaseController
{
    /** @var  SituacionLaboralRepository */
    private $situacionLaboralRepository;

    public function __construct(SituacionLaboralRepository $situacionLaboralRepo)
    {
        $this->situacionLaboralRepository = $situacionLaboralRepo;
    }

    /**
     * Display a listing of the SituacionLaboral.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->situacionLaboralRepository->pushCriteria(new RequestCriteria($request));
        $situacionLaborals = $this->situacionLaboralRepository->all();

        return view('admin.situacion_laborals.index')
            ->with('situacionLaborals', $situacionLaborals);
    }

    /**
     * Show the form for creating a new SituacionLaboral.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.situacion_laborals.create');
    }

    /**
     * Store a newly created SituacionLaboral in storage.
     *
     * @param CreateSituacionLaboralRequest $request
     *
     * @return Response
     */
    public function store(CreateSituacionLaboralRequest $request)
    {
        $input = $request->all();

        $situacionLaboral = $this->situacionLaboralRepository->create($input);

        Flash::success('Situacion Laboral saved successfully.');

        return redirect(route('admin.situacionLaborals.index'));
    }

    /**
     * Display the specified SituacionLaboral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $situacionLaboral = $this->situacionLaboralRepository->findWithoutFail($id);

        if (empty($situacionLaboral)) {
            Flash::error('Situacion Laboral not found');

            return redirect(route('admin.situacionLaborals.index'));
        }

        return view('admin.situacion_laborals.show')->with('situacionLaboral', $situacionLaboral);
    }

    /**
     * Show the form for editing the specified SituacionLaboral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $situacionLaboral = $this->situacionLaboralRepository->findWithoutFail($id);

        if (empty($situacionLaboral)) {
            Flash::error('Situacion Laboral not found');

            return redirect(route('admin.situacionLaborals.index'));
        }

        return view('admin.situacion_laborals.edit')->with('situacionLaboral', $situacionLaboral);
    }

    /**
     * Update the specified SituacionLaboral in storage.
     *
     * @param  int              $id
     * @param UpdateSituacionLaboralRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSituacionLaboralRequest $request)
    {
        $situacionLaboral = $this->situacionLaboralRepository->findWithoutFail($id);

        if (empty($situacionLaboral)) {
            Flash::error('Situacion Laboral not found');

            return redirect(route('admin.situacionLaborals.index'));
        }

        $situacionLaboral = $this->situacionLaboralRepository->update($request->all(), $id);

        Flash::success('Situacion Laboral updated successfully.');

        return redirect(route('admin.situacionLaborals.index'));
    }

    /**
     * Remove the specified SituacionLaboral from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $situacionLaboral = $this->situacionLaboralRepository->findWithoutFail($id);

        if (empty($situacionLaboral)) {
            Flash::error('Situacion Laboral not found');

            return redirect(route('admin.situacionLaborals.index'));
        }

        $this->situacionLaboralRepository->delete($id);

        Flash::success('Situacion Laboral deleted successfully.');

        return redirect(route('admin.situacionLaborals.index'));
    }
}
