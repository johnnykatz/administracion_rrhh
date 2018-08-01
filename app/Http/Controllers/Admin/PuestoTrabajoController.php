<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePuestoTrabajoRequest;
use App\Http\Requests\Admin\UpdatePuestoTrabajoRequest;
use App\Repositories\Admin\PuestoTrabajoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PuestoTrabajoController extends AppBaseController
{
    /** @var  PuestoTrabajoRepository */
    private $puestoTrabajoRepository;

    public function __construct(PuestoTrabajoRepository $puestoTrabajoRepo)
    {
        $this->puestoTrabajoRepository = $puestoTrabajoRepo;
    }

    /**
     * Display a listing of the PuestoTrabajo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->puestoTrabajoRepository->pushCriteria(new RequestCriteria($request));
        $puestoTrabajos = $this->puestoTrabajoRepository->all();

        return view('admin.puesto_trabajos.index')
            ->with('puestoTrabajos', $puestoTrabajos);
    }

    /**
     * Show the form for creating a new PuestoTrabajo.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.puesto_trabajos.create');
    }

    /**
     * Store a newly created PuestoTrabajo in storage.
     *
     * @param CreatePuestoTrabajoRequest $request
     *
     * @return Response
     */
    public function store(CreatePuestoTrabajoRequest $request)
    {
        $input = $request->all();

        $puestoTrabajo = $this->puestoTrabajoRepository->create($input);

        Flash::success('Puesto Trabajo saved successfully.');

        return redirect(route('admin.puestoTrabajos.index'));
    }

    /**
     * Display the specified PuestoTrabajo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $puestoTrabajo = $this->puestoTrabajoRepository->findWithoutFail($id);

        if (empty($puestoTrabajo)) {
            Flash::error('Puesto Trabajo not found');

            return redirect(route('admin.puestoTrabajos.index'));
        }

        return view('admin.puesto_trabajos.show')->with('puestoTrabajo', $puestoTrabajo);
    }

    /**
     * Show the form for editing the specified PuestoTrabajo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $puestoTrabajo = $this->puestoTrabajoRepository->findWithoutFail($id);

        if (empty($puestoTrabajo)) {
            Flash::error('Puesto Trabajo not found');

            return redirect(route('admin.puestoTrabajos.index'));
        }

        return view('admin.puesto_trabajos.edit')->with('puestoTrabajo', $puestoTrabajo);
    }

    /**
     * Update the specified PuestoTrabajo in storage.
     *
     * @param  int              $id
     * @param UpdatePuestoTrabajoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePuestoTrabajoRequest $request)
    {
        $puestoTrabajo = $this->puestoTrabajoRepository->findWithoutFail($id);

        if (empty($puestoTrabajo)) {
            Flash::error('Puesto Trabajo not found');

            return redirect(route('admin.puestoTrabajos.index'));
        }

        $puestoTrabajo = $this->puestoTrabajoRepository->update($request->all(), $id);

        Flash::success('Puesto Trabajo updated successfully.');

        return redirect(route('admin.puestoTrabajos.index'));
    }

    /**
     * Remove the specified PuestoTrabajo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $puestoTrabajo = $this->puestoTrabajoRepository->findWithoutFail($id);

        if (empty($puestoTrabajo)) {
            Flash::error('Puesto Trabajo not found');

            return redirect(route('admin.puestoTrabajos.index'));
        }

        $this->puestoTrabajoRepository->delete($id);

        Flash::success('Puesto Trabajo deleted successfully.');

        return redirect(route('admin.puestoTrabajos.index'));
    }
}
