<?php

namespace App\Providers;

use App\Models\Admin\LogTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogTablesProvider
{

    public static function setLogTable($operacion, $objeto, $objetoOld)
    {
        $self = new self();
        if ($operacion == 'create') {
            $self->setLogCreate($objeto);
        } else {
            $self->controlUpdate($objeto, $objetoOld);
        }
        return;
    }

    private function setLogCreate($objeto)
    {
        $log = new LogTable();
        $log->user_id = Auth::user()->id;
        $log->tabla = $objeto->table;
        $log->operacion = "create";
        $log->registro_id = $objeto->id;
        $log->save();
        return;
    }

    private function controlUpdate($objeto, $objetoOld)
    {
        $campos = $objeto->toArray();
        foreach ($campos as $key => $campo) {
            if ($key == "updated_at")
                continue;
            if ($campo != $objetoOld->$key) {
                self::setLogUpdate($objeto, $objetoOld, $key);
            }
        }
        return;

    }

    private function setLogUpdate($objeto, $objetoOld, $campo)
    {
        $log = new LogTable();
        $log->user_id = Auth::user()->id;
        $log->tabla = $objeto->table;
        $log->operacion = "update";
        $log->campo = $campo;
        $log->valor_anterior = $objetoOld->$campo;
        $log->valor_nuevo = $objeto->$campo;
        $log->registro_id = $objetoOld->id;
        $log->save();
        return;


    }
}
