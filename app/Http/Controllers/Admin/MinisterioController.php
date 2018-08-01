<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateMinisterioRequest;
use App\Models\Admin\Ministerio;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\MinisterioRepository;
use Illuminate\Http\Request;
use Flash;

use Response;

class MinisterioController extends AppBaseController
{
    /** @var  MinisterioRepository */
    private $ministerioRepository;

    public function __construct(MinisterioRepository $agenteRepo)
    {
        $this->ministerioRepository = $agenteRepo;
    }


    /**
     * Show the form for editing the specified Ministerio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit()
    {
        $ministerio = Ministerio::find(1);

        if (empty($ministerio)) {
            Flash::error('Ministerio not found');

            return redirect(route('admin.ministerio.edit'));
        }

        return view('admin.ministerio.edit')->with(
            [
                'ministerio' => $ministerio
            ]);
    }

    /**
     * Update the specified Agente in storage.
     *
     * @param  int $id
     * @param UpdateAgenteRequest $request
     *
     * @return Response
     */
    public function update(UpdateMinisterioRequest $request)
    {
        $ministerio = Ministerio::find(1);

        if (empty($ministerio)) {
            Flash::error('Ministerio not found');

            return redirect(route('admin.ministerio.edit'));
        }

        $ministerio = $this->ministerioRepository->update($request->all(), 1);

        Flash::success('Datos actualizados con exito.');

        return redirect(route('admin.ministerio.edit'));
    }
}
