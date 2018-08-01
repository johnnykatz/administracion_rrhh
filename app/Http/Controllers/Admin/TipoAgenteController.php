<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateTipoAgenteRequest;
use App\Http\Requests\Admin\UpdateTipoAgenteRequest;
use App\Repositories\Admin\TipoAgenteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoAgenteController extends AppBaseController
{
    /** @var  TipoAgenteRepository */
    private $tipoAgenteRepository;

    public function __construct(TipoAgenteRepository $tipoAgenteRepo)
    {
        $this->tipoAgenteRepository = $tipoAgenteRepo;
    }

    /**
     * Display a listing of the TipoAgente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoAgenteRepository->pushCriteria(new RequestCriteria($request));
        $tipoAgentes = $this->tipoAgenteRepository->all();

        return view('admin.tipo_agentes.index')
            ->with('tipoAgentes', $tipoAgentes);
    }

    /**
     * Show the form for creating a new TipoAgente.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.tipo_agentes.create');
    }

    /**
     * Store a newly created TipoAgente in storage.
     *
     * @param CreateTipoAgenteRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoAgenteRequest $request)
    {
        $input = $request->all();

        $tipoAgente = $this->tipoAgenteRepository->create($input);

        Flash::success('Tipo Agente saved successfully.');

        return redirect(route('admin.tipoAgentes.index'));
    }

    /**
     * Display the specified TipoAgente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoAgente = $this->tipoAgenteRepository->findWithoutFail($id);

        if (empty($tipoAgente)) {
            Flash::error('Tipo Agente not found');

            return redirect(route('admin.tipoAgentes.index'));
        }

        return view('admin.tipo_agentes.show')->with('tipoAgente', $tipoAgente);
    }

    /**
     * Show the form for editing the specified TipoAgente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoAgente = $this->tipoAgenteRepository->findWithoutFail($id);

        if (empty($tipoAgente)) {
            Flash::error('Tipo Agente not found');

            return redirect(route('admin.tipoAgentes.index'));
        }

        return view('admin.tipo_agentes.edit')->with('tipoAgente', $tipoAgente);
    }

    /**
     * Update the specified TipoAgente in storage.
     *
     * @param  int              $id
     * @param UpdateTipoAgenteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoAgenteRequest $request)
    {
        $tipoAgente = $this->tipoAgenteRepository->findWithoutFail($id);

        if (empty($tipoAgente)) {
            Flash::error('Tipo Agente not found');

            return redirect(route('admin.tipoAgentes.index'));
        }

        $tipoAgente = $this->tipoAgenteRepository->update($request->all(), $id);

        Flash::success('Tipo Agente updated successfully.');

        return redirect(route('admin.tipoAgentes.index'));
    }

    /**
     * Remove the specified TipoAgente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoAgente = $this->tipoAgenteRepository->findWithoutFail($id);

        if (empty($tipoAgente)) {
            Flash::error('Tipo Agente not found');

            return redirect(route('admin.tipoAgentes.index'));
        }

        $this->tipoAgenteRepository->delete($id);

        Flash::success('Tipo Agente deleted successfully.');

        return redirect(route('admin.tipoAgentes.index'));
    }
}
