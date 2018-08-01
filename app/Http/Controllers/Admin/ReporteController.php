<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AppBaseController;
use App\Providers\ReporteProvider;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReporteController extends AppBaseController
{
    /** @var  AgenteRepository */
    private $reporteProvider;

    public function __construct(ReporteProvider $prov)
    {
        $this->reporteProvider = $prov;
    }

    /**
     * Display a listing of the Agente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $datosGenerales = $this->reporteProvider->getDatosGenerales();

        return view('admin.reportes.index')->with([
            'datosGenerales' => $datosGenerales
        ]);
    }


}
