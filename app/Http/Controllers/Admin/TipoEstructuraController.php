<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateTipoEstructuraRequest;
use App\Http\Requests\Admin\UpdateTipoEstructuraRequest;
use App\Repositories\Admin\TipoEstructuraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoEstructuraController extends AppBaseController
{
    /** @var  TipoEstructuraRepository */
    private $tipoEstructuraRepository;

    public function __construct(TipoEstructuraRepository $tipoEstructuraRepo)
    {
        $this->tipoEstructuraRepository = $tipoEstructuraRepo;
    }

    /**
     * Display a listing of the TipoEstructura.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoEstructuraRepository->pushCriteria(new RequestCriteria($request));
        $tipoEstructuras = $this->tipoEstructuraRepository->all();

        return view('admin.tipo_estructuras.index')
            ->with('tipoEstructuras', $tipoEstructuras);
    }

    /**
     * Show the form for creating a new TipoEstructura.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.tipo_estructuras.create');
    }

    /**
     * Store a newly created TipoEstructura in storage.
     *
     * @param CreateTipoEstructuraRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoEstructuraRequest $request)
    {
        $input = $request->all();

        $tipoEstructura = $this->tipoEstructuraRepository->create($input);

        Flash::success('Tipo Estructura saved successfully.');

        return redirect(route('admin.tipoEstructuras.index'));
    }

    /**
     * Display the specified TipoEstructura.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoEstructura = $this->tipoEstructuraRepository->findWithoutFail($id);

        if (empty($tipoEstructura)) {
            Flash::error('Tipo Estructura not found');

            return redirect(route('admin.tipoEstructuras.index'));
        }

        return view('admin.tipo_estructuras.show')->with('tipoEstructura', $tipoEstructura);
    }

    /**
     * Show the form for editing the specified TipoEstructura.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoEstructura = $this->tipoEstructuraRepository->findWithoutFail($id);

        if (empty($tipoEstructura)) {
            Flash::error('Tipo Estructura not found');

            return redirect(route('admin.tipoEstructuras.index'));
        }

        return view('admin.tipo_estructuras.edit')->with('tipoEstructura', $tipoEstructura);
    }

    /**
     * Update the specified TipoEstructura in storage.
     *
     * @param  int              $id
     * @param UpdateTipoEstructuraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoEstructuraRequest $request)
    {
        $tipoEstructura = $this->tipoEstructuraRepository->findWithoutFail($id);

        if (empty($tipoEstructura)) {
            Flash::error('Tipo Estructura not found');

            return redirect(route('admin.tipoEstructuras.index'));
        }

        $tipoEstructura = $this->tipoEstructuraRepository->update($request->all(), $id);

        Flash::success('Tipo Estructura updated successfully.');

        return redirect(route('admin.tipoEstructuras.index'));
    }

    /**
     * Remove the specified TipoEstructura from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoEstructura = $this->tipoEstructuraRepository->findWithoutFail($id);

        if (empty($tipoEstructura)) {
            Flash::error('Tipo Estructura not found');

            return redirect(route('admin.tipoEstructuras.index'));
        }

        $this->tipoEstructuraRepository->delete($id);

        Flash::success('Tipo Estructura deleted successfully.');

        return redirect(route('admin.tipoEstructuras.index'));
    }
}
