<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateEstadoRelacionRequest;
use App\Http\Requests\Admin\UpdateEstadoRelacionRequest;
use App\Repositories\Admin\EstadoRelacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstadoRelacionController extends AppBaseController
{
    /** @var  EstadoRelacionRepository */
    private $estadoRelacionRepository;

    public function __construct(EstadoRelacionRepository $estadoRelacionRepo)
    {
        $this->estadoRelacionRepository = $estadoRelacionRepo;
    }

    /**
     * Display a listing of the EstadoRelacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoRelacionRepository->pushCriteria(new RequestCriteria($request));
        $estadoRelacions = $this->estadoRelacionRepository->all();

        return view('admin.estado_relacions.index')
            ->with('estadoRelacions', $estadoRelacions);
    }

    /**
     * Show the form for creating a new EstadoRelacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.estado_relacions.create');
    }

    /**
     * Store a newly created EstadoRelacion in storage.
     *
     * @param CreateEstadoRelacionRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoRelacionRequest $request)
    {
        $input = $request->all();

        $estadoRelacion = $this->estadoRelacionRepository->create($input);

        Flash::success('Estado Relacion saved successfully.');

        return redirect(route('admin.estadoRelacions.index'));
    }

    /**
     * Display the specified EstadoRelacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoRelacion = $this->estadoRelacionRepository->findWithoutFail($id);

        if (empty($estadoRelacion)) {
            Flash::error('Estado Relacion not found');

            return redirect(route('admin.estadoRelacions.index'));
        }

        return view('admin.estado_relacions.show')->with('estadoRelacion', $estadoRelacion);
    }

    /**
     * Show the form for editing the specified EstadoRelacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoRelacion = $this->estadoRelacionRepository->findWithoutFail($id);

        if (empty($estadoRelacion)) {
            Flash::error('Estado Relacion not found');

            return redirect(route('admin.estadoRelacions.index'));
        }

        return view('admin.estado_relacions.edit')->with('estadoRelacion', $estadoRelacion);
    }

    /**
     * Update the specified EstadoRelacion in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoRelacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoRelacionRequest $request)
    {
        $estadoRelacion = $this->estadoRelacionRepository->findWithoutFail($id);

        if (empty($estadoRelacion)) {
            Flash::error('Estado Relacion not found');

            return redirect(route('admin.estadoRelacions.index'));
        }

        $estadoRelacion = $this->estadoRelacionRepository->update($request->all(), $id);

        Flash::success('Estado Relacion updated successfully.');

        return redirect(route('admin.estadoRelacions.index'));
    }

    /**
     * Remove the specified EstadoRelacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoRelacion = $this->estadoRelacionRepository->findWithoutFail($id);

        if (empty($estadoRelacion)) {
            Flash::error('Estado Relacion not found');

            return redirect(route('admin.estadoRelacions.index'));
        }

        $this->estadoRelacionRepository->delete($id);

        Flash::success('Estado Relacion deleted successfully.');

        return redirect(route('admin.estadoRelacions.index'));
    }
}
