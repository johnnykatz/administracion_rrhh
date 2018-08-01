<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateTipoInstrumentoRequest;
use App\Http\Requests\Admin\UpdateTipoInstrumentoRequest;
use App\Repositories\Admin\TipoInstrumentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoInstrumentoController extends AppBaseController
{
    /** @var  TipoInstrumentoRepository */
    private $tipoInstrumentoRepository;

    public function __construct(TipoInstrumentoRepository $tipoInstrumentoRepo)
    {
        $this->tipoInstrumentoRepository = $tipoInstrumentoRepo;
    }

    /**
     * Display a listing of the TipoInstrumento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoInstrumentoRepository->pushCriteria(new RequestCriteria($request));
        $tipoInstrumentos = $this->tipoInstrumentoRepository->all();

        return view('admin.tipo_instrumentos.index')
            ->with('tipoInstrumentos', $tipoInstrumentos);
    }

    /**
     * Show the form for creating a new TipoInstrumento.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.tipo_instrumentos.create');
    }

    /**
     * Store a newly created TipoInstrumento in storage.
     *
     * @param CreateTipoInstrumentoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoInstrumentoRequest $request)
    {
        $input = $request->all();

        $tipoInstrumento = $this->tipoInstrumentoRepository->create($input);

        Flash::success('Tipo Instrumento saved successfully.');

        return redirect(route('admin.tipoInstrumentos.index'));
    }

    /**
     * Display the specified TipoInstrumento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoInstrumento = $this->tipoInstrumentoRepository->findWithoutFail($id);

        if (empty($tipoInstrumento)) {
            Flash::error('Tipo Instrumento not found');

            return redirect(route('admin.tipoInstrumentos.index'));
        }

        return view('admin.tipo_instrumentos.show')->with('tipoInstrumento', $tipoInstrumento);
    }

    /**
     * Show the form for editing the specified TipoInstrumento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoInstrumento = $this->tipoInstrumentoRepository->findWithoutFail($id);

        if (empty($tipoInstrumento)) {
            Flash::error('Tipo Instrumento not found');

            return redirect(route('admin.tipoInstrumentos.index'));
        }

        return view('admin.tipo_instrumentos.edit')->with('tipoInstrumento', $tipoInstrumento);
    }

    /**
     * Update the specified TipoInstrumento in storage.
     *
     * @param  int              $id
     * @param UpdateTipoInstrumentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoInstrumentoRequest $request)
    {
        $tipoInstrumento = $this->tipoInstrumentoRepository->findWithoutFail($id);

        if (empty($tipoInstrumento)) {
            Flash::error('Tipo Instrumento not found');

            return redirect(route('admin.tipoInstrumentos.index'));
        }

        $tipoInstrumento = $this->tipoInstrumentoRepository->update($request->all(), $id);

        Flash::success('Tipo Instrumento updated successfully.');

        return redirect(route('admin.tipoInstrumentos.index'));
    }

    /**
     * Remove the specified TipoInstrumento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoInstrumento = $this->tipoInstrumentoRepository->findWithoutFail($id);

        if (empty($tipoInstrumento)) {
            Flash::error('Tipo Instrumento not found');

            return redirect(route('admin.tipoInstrumentos.index'));
        }

        $this->tipoInstrumentoRepository->delete($id);

        Flash::success('Tipo Instrumento deleted successfully.');

        return redirect(route('admin.tipoInstrumentos.index'));
    }
}
