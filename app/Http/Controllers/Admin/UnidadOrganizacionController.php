<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUnidadOrganizacionRequest;
use App\Http\Requests\Admin\UpdateUnidadOrganizacionRequest;
use App\Repositories\Admin\UnidadOrganizacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UnidadOrganizacionController extends AppBaseController
{
    /** @var  UnidadOrganizacionRepository */
    private $unidadOrganizacionRepository;

    public function __construct(UnidadOrganizacionRepository $unidadOrganizacionRepo)
    {
        $this->unidadOrganizacionRepository = $unidadOrganizacionRepo;
    }

    /**
     * Display a listing of the UnidadOrganizacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->unidadOrganizacionRepository->pushCriteria(new RequestCriteria($request));
        $unidadOrganizacions = $this->unidadOrganizacionRepository->all();

        return view('admin.unidad_organizacions.index')
            ->with('unidadOrganizacions', $unidadOrganizacions);
    }

    /**
     * Show the form for creating a new UnidadOrganizacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.unidad_organizacions.create');
    }

    /**
     * Store a newly created UnidadOrganizacion in storage.
     *
     * @param CreateUnidadOrganizacionRequest $request
     *
     * @return Response
     */
    public function store(CreateUnidadOrganizacionRequest $request)
    {
        $input = $request->all();

        $unidadOrganizacion = $this->unidadOrganizacionRepository->create($input);

        Flash::success('Unidad Organizacion saved successfully.');

        return redirect(route('admin.unidadOrganizacions.index'));
    }

    /**
     * Display the specified UnidadOrganizacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unidadOrganizacion = $this->unidadOrganizacionRepository->findWithoutFail($id);

        if (empty($unidadOrganizacion)) {
            Flash::error('Unidad Organizacion not found');

            return redirect(route('admin.unidadOrganizacions.index'));
        }

        return view('admin.unidad_organizacions.show')->with('unidadOrganizacion', $unidadOrganizacion);
    }

    /**
     * Show the form for editing the specified UnidadOrganizacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unidadOrganizacion = $this->unidadOrganizacionRepository->findWithoutFail($id);

        if (empty($unidadOrganizacion)) {
            Flash::error('Unidad Organizacion not found');

            return redirect(route('admin.unidadOrganizacions.index'));
        }

        return view('admin.unidad_organizacions.edit')->with('unidadOrganizacion', $unidadOrganizacion);
    }

    /**
     * Update the specified UnidadOrganizacion in storage.
     *
     * @param  int              $id
     * @param UpdateUnidadOrganizacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnidadOrganizacionRequest $request)
    {
        $unidadOrganizacion = $this->unidadOrganizacionRepository->findWithoutFail($id);

        if (empty($unidadOrganizacion)) {
            Flash::error('Unidad Organizacion not found');

            return redirect(route('admin.unidadOrganizacions.index'));
        }

        $unidadOrganizacion = $this->unidadOrganizacionRepository->update($request->all(), $id);

        Flash::success('Unidad Organizacion updated successfully.');

        return redirect(route('admin.unidadOrganizacions.index'));
    }

    /**
     * Remove the specified UnidadOrganizacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $unidadOrganizacion = $this->unidadOrganizacionRepository->findWithoutFail($id);

        if (empty($unidadOrganizacion)) {
            Flash::error('Unidad Organizacion not found');

            return redirect(route('admin.unidadOrganizacions.index'));
        }

        $this->unidadOrganizacionRepository->delete($id);

        Flash::success('Unidad Organizacion deleted successfully.');

        return redirect(route('admin.unidadOrganizacions.index'));
    }
}
