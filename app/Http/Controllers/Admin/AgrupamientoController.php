<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateAgrupamientoRequest;
use App\Http\Requests\Admin\UpdateAgrupamientoRequest;
use App\Repositories\Admin\AgrupamientoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AgrupamientoController extends AppBaseController
{
    /** @var  AgrupamientoRepository */
    private $agrupamientoRepository;

    public function __construct(AgrupamientoRepository $agrupamientoRepo)
    {
        $this->agrupamientoRepository = $agrupamientoRepo;
    }

    /**
     * Display a listing of the Agrupamiento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->agrupamientoRepository->pushCriteria(new RequestCriteria($request));
        $agrupamientos = $this->agrupamientoRepository->all();

        return view('admin.agrupamientos.index')
            ->with('agrupamientos', $agrupamientos);
    }

    /**
     * Show the form for creating a new Agrupamiento.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.agrupamientos.create');
    }

    /**
     * Store a newly created Agrupamiento in storage.
     *
     * @param CreateAgrupamientoRequest $request
     *
     * @return Response
     */
    public function store(CreateAgrupamientoRequest $request)
    {
        $input = $request->all();

        $agrupamiento = $this->agrupamientoRepository->create($input);

        Flash::success('Agrupamiento saved successfully.');

        return redirect(route('admin.agrupamientos.index'));
    }

    /**
     * Display the specified Agrupamiento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agrupamiento = $this->agrupamientoRepository->findWithoutFail($id);

        if (empty($agrupamiento)) {
            Flash::error('Agrupamiento not found');

            return redirect(route('admin.agrupamientos.index'));
        }

        return view('admin.agrupamientos.show')->with('agrupamiento', $agrupamiento);
    }

    /**
     * Show the form for editing the specified Agrupamiento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agrupamiento = $this->agrupamientoRepository->findWithoutFail($id);

        if (empty($agrupamiento)) {
            Flash::error('Agrupamiento not found');

            return redirect(route('admin.agrupamientos.index'));
        }

        return view('admin.agrupamientos.edit')->with('agrupamiento', $agrupamiento);
    }

    /**
     * Update the specified Agrupamiento in storage.
     *
     * @param  int              $id
     * @param UpdateAgrupamientoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgrupamientoRequest $request)
    {
        $agrupamiento = $this->agrupamientoRepository->findWithoutFail($id);

        if (empty($agrupamiento)) {
            Flash::error('Agrupamiento not found');

            return redirect(route('admin.agrupamientos.index'));
        }

        $agrupamiento = $this->agrupamientoRepository->update($request->all(), $id);

        Flash::success('Agrupamiento updated successfully.');

        return redirect(route('admin.agrupamientos.index'));
    }

    /**
     * Remove the specified Agrupamiento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agrupamiento = $this->agrupamientoRepository->findWithoutFail($id);

        if (empty($agrupamiento)) {
            Flash::error('Agrupamiento not found');

            return redirect(route('admin.agrupamientos.index'));
        }

        $this->agrupamientoRepository->delete($id);

        Flash::success('Agrupamiento deleted successfully.');

        return redirect(route('admin.agrupamientos.index'));
    }
}
