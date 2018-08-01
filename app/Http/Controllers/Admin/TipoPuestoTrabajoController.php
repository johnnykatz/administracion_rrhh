<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateTipoPuestoTrabajoRequest;
use App\Http\Requests\Admin\UpdateTipoPuestoTrabajoRequest;
use App\Repositories\Admin\TipoPuestoTrabajoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoPuestoTrabajoController extends AppBaseController
{
    /** @var  TipoPuestoTrabajoRepository */
    private $tipoPuestoTrabajoRepository;

    public function __construct(TipoPuestoTrabajoRepository $tipoPuestoTrabajoRepo)
    {
        $this->tipoPuestoTrabajoRepository = $tipoPuestoTrabajoRepo;
    }

    /**
     * Display a listing of the TipoPuestoTrabajo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoPuestoTrabajoRepository->pushCriteria(new RequestCriteria($request));
        $tipoPuestoTrabajos = $this->tipoPuestoTrabajoRepository->all();

        return view('admin.tipo_puesto_trabajos.index')
            ->with('tipoPuestoTrabajos', $tipoPuestoTrabajos);
    }

    /**
     * Show the form for creating a new TipoPuestoTrabajo.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.tipo_puesto_trabajos.create');
    }

    /**
     * Store a newly created TipoPuestoTrabajo in storage.
     *
     * @param CreateTipoPuestoTrabajoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoPuestoTrabajoRequest $request)
    {
        $input = $request->all();

        $tipoPuestoTrabajo = $this->tipoPuestoTrabajoRepository->create($input);

        Flash::success('Tipo Puesto Trabajo saved successfully.');

        return redirect(route('admin.tipoPuestoTrabajos.index'));
    }

    /**
     * Display the specified TipoPuestoTrabajo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoPuestoTrabajo = $this->tipoPuestoTrabajoRepository->findWithoutFail($id);

        if (empty($tipoPuestoTrabajo)) {
            Flash::error('Tipo Puesto Trabajo not found');

            return redirect(route('admin.tipoPuestoTrabajos.index'));
        }

        return view('admin.tipo_puesto_trabajos.show')->with('tipoPuestoTrabajo', $tipoPuestoTrabajo);
    }

    /**
     * Show the form for editing the specified TipoPuestoTrabajo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoPuestoTrabajo = $this->tipoPuestoTrabajoRepository->findWithoutFail($id);

        if (empty($tipoPuestoTrabajo)) {
            Flash::error('Tipo Puesto Trabajo not found');

            return redirect(route('admin.tipoPuestoTrabajos.index'));
        }

        return view('admin.tipo_puesto_trabajos.edit')->with('tipoPuestoTrabajo', $tipoPuestoTrabajo);
    }

    /**
     * Update the specified TipoPuestoTrabajo in storage.
     *
     * @param  int              $id
     * @param UpdateTipoPuestoTrabajoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoPuestoTrabajoRequest $request)
    {
        $tipoPuestoTrabajo = $this->tipoPuestoTrabajoRepository->findWithoutFail($id);

        if (empty($tipoPuestoTrabajo)) {
            Flash::error('Tipo Puesto Trabajo not found');

            return redirect(route('admin.tipoPuestoTrabajos.index'));
        }

        $tipoPuestoTrabajo = $this->tipoPuestoTrabajoRepository->update($request->all(), $id);

        Flash::success('Tipo Puesto Trabajo updated successfully.');

        return redirect(route('admin.tipoPuestoTrabajos.index'));
    }

    /**
     * Remove the specified TipoPuestoTrabajo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoPuestoTrabajo = $this->tipoPuestoTrabajoRepository->findWithoutFail($id);

        if (empty($tipoPuestoTrabajo)) {
            Flash::error('Tipo Puesto Trabajo not found');

            return redirect(route('admin.tipoPuestoTrabajos.index'));
        }

        $this->tipoPuestoTrabajoRepository->delete($id);

        Flash::success('Tipo Puesto Trabajo deleted successfully.');

        return redirect(route('admin.tipoPuestoTrabajos.index'));
    }
}
