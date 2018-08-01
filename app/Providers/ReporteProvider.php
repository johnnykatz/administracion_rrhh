<?php

namespace App\Providers;

use App\Models\Admin\Agente;

class ReporteProvider
{

    public function getDatosGenerales()
    {
        $result = array();

        $result['cant_activos'] = $this->getAgentesActivos();
        $result['cant_adsc'] = $this->getAgentesAdscriptos();
        $result['cant_adsc_otro'] = $this->getAdscriptosOtroOrganismo();
        $result['cant_lic_grem'] = $this->getAgentesLicGremial();
        $result['cant_lic_sg'] = $this->getAgentesLicSGoceH();
        $result['cant_planta'] = $this->getAgentesPlanta();
        $result['cant_temp'] = $this->getAgentesTemporales();
        $result['cant_jubilacion'] = $this->getAgentesJubilacion();
        $result['cant_hombre'] = $this->getAgentesHombres();
        $result['cant_mujer'] = $this->getAgentesMujeres();
        return $result;

    }

    public function getAgentesActivos()
    {
        return Agente::from('agentes as a')->where('activo', true)->where('tipo_agente_id', 1)->count();

    }

    public function getAgentesHombres()
    {
        return Agente::where('activo', true)->where('tipo_agente_id', 1)->where('genero_id', 2)->count();

    }

    public function getAgentesMujeres()
    {
        return Agente::where('activo', true)->where('tipo_agente_id', 1)->where('genero_id', 1)->count();

    }

    public function getAgentesJubilacion()
    {
        return Agente::where('activo', true)->where('tipo_agente_id', 1)->where('tramite_jubilacion', true)->count();

    }

    public function getAgentesPlanta()
    {
        return Agente::where('activo', true)->where('tipo_agente_id', 1)->where('estado_relacion_id', 1)->count();
    }

    public function getAgentesTemporales()
    {
        return Agente::where('activo', true)->where('tipo_agente_id', 1)->where('estado_relacion_id', 2)->count();
    }

    public function getAgentesAdscriptos()
    {
        return Agente::from('agentes as a')->join('puestos_trabajos as p', 'p.agente_id', '=', 'a.id')
            ->where('p.situacion_laboral_id', 2)
            ->where('a.activo', true)
            ->where('p.activo', true)
            ->where('a.tipo_agente_id', 1)
            ->select('a.id')->groupBy('a.id')->count();

    }

    public function getAdscriptosOtroOrganismo()
    {
        return Agente::where('activo', true)->where('tipo_agente_id', 2)->count();

    }

    public function getAgentesLicGremial()
    {
        return Agente::from('agentes as a')->join('puestos_trabajos as p', 'p.agente_id', '=', 'a.id')
            ->where('p.situacion_laboral_id', 3)
            ->where('a.activo', true)
            ->where('p.activo', true)
            ->where('a.tipo_agente_id', 1)
            ->select('a.id')->groupBy('a.id')->count();
    }

    public function getAgentesLicSGoceH()
    {
        return Agente::from('agentes as a')->join('puestos_trabajos as p', 'p.agente_id', '=', 'a.id')
            ->where('p.situacion_laboral_id', 4)
            ->where('a.activo', true)
            ->where('p.activo', true)
            ->where('a.tipo_agente_id', 1)
            ->select('a.id')->groupBy('a.id')->count();
    }


}
