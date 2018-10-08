<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            DATOS PERSONALES
        </div>
        <div class="box-body">
            <table class="record_properties">
                <tbody>
                @if($agente->tramite_jubilacion)
                    <tr>
                        <td colspan="2">
                            <span class="text-danger"><strong>AGENTE CON JUBILACION EN TRAMITE</strong></span>
                        </td>
                @endif
                <tr>
                    <th>Id</th>
                    <td>{!! $agente->id!!}</td>
                </tr>
                <tr>
                    <th>Activo</th>
                    <td>{!! ($agente->activo)?"SI":"NO"!!}</td>
                </tr>
                <tr>
                    <th>Apellido y Nombre</th>
                    <td>{!! $agente->apellido." ".$agente->nombre!!}</td>
                </tr>
                <tr>
                    <th>D.N.I.</th>
                    <td>{!! $agente->dni!!}</td>
                </tr>
                <tr>
                    <th>Genero</th>
                    <td>{!! $agente->genero->nombre or null!!}</td>
                </tr>
                <tr>
                    <th>Fecha de Nacimiento</th>
                    <td>{!! ($agente->fecha_nacimiento)?date("d-m-Y",strtotime($agente->fecha_nacimiento)):null!!}</td>
                </tr>
                <tr>
                    <th>Direcci&oacute;n</th>
                    <td>{!! $agente->direccion or null!!}</td>
                </tr>
                <tr>
                    <th>Titulo</th>
                    <td>{!! $agente->titulo or null!!}</td>
                </tr>

                <tr>
                    <th>Telefono Celular</th>
                    <td>{!! $agente->telefono_celular or null!!}</td>
                </tr>
                <tr>
                    <th>Telefono Fijo</th>
                    <td>{!! $agente->telefono_fijo or null!!}</td>
                </tr>

                <tr>
                    <th>Otro Telefono</th>
                    <td>{!! $agente->telefono_otro or null!!}</td>
                </tr>
                <tr>
                    <th>Mail</th>
                    <td>{!! $agente->email or null!!}</td>
                </tr>
                <tr>
                    <th>Observaci&oacute;n</th>
                    <td>{!! $agente->observacion or null!!}</td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            Operaciones
        </div>
        <div class="box-body">
            <a href="{!! route('generarSituacionRevista',[$agente->id]) !!}" target="_blank" class="btn btn-default">Imprimir
                Situacion de Revista</a>
        </div>
    </div>
</div>
{{--</div>--}}

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            DATOS LABORALES
        </div>
        <div class="box-body">

            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header">
                        DATOS GENERALES
                    </div>
                    <div class="box-body">
                        <table class="record_properties">
                            <tbody>
                            <tr>
                                <th>Legajo</th>
                                <td>{!! $agente->legajo!!}</td>
                            </tr>
                            <tr>
                                <th>Numero de Tarjeta</th>
                                <td>{!! $agente->numero_tarjeta!!}</td>
                            </tr>
                            <tr>
                                <th>Categoria</th>
                                <td>{!! $agente->categoria!!}</td>
                            </tr>
                            <tr>
                                <th>Fecha de Ingreso</th>
                                <td>{!! ($agente->fecha_ingreso)?date("d-m-Y",strtotime($agente->fecha_ingreso)):null!!}</td>
                            </tr>
                            <tr>
                                <th>Estado Relacion</th>
                                <td>{!! $agente->estadoRelacion->nombre or null!!}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header">
                        PUESTO DE TRABAJO
                    </div>
                    <div class="box-body">
                        <table class="record_properties">
                            <tbody>
                            <tr>
                                <th>Puesto de Trabajo</th>
                                <td>{!! $agente->puestoTrabajo->tipoPuestoTrabajo->nombre or null!!}</td>
                            </tr>
                            <tr>
                                <th>Lugar de Trabajo</th>
                                <td>{!! $agente->puestoTrabajo->estructura->nombre or null!!}</td>
                            </tr>
                            <tr>
                                <th>U.O.</th>
                                <td>{!!($agente->puestoTrabajo->unidadOrganizacion->nombre)? $agente->puestoTrabajo->unidadOrganizacion->codigo." - ".$agente->puestoTrabajo->unidadOrganizacion->nombre: null!!}</td>
                            </tr>
                            <tr>
                                <th>Agrupamiento</th>
                                <td>{!! $agente->puestoTrabajo->agrupamiento->nombre or null!!}</td>
                            </tr>
                            <tr>
                                <th>Situacion Laboral</th>
                                <td>{!! $agente->puestoTrabajo->situacionLaboral->nombre or null!!}</td>
                            </tr>

                            <tr>
                                <th>Instrumento Legal</th>
                                <td>
                                    {!!(isset($agente->puestoTrabajo->tipo_instrumento_id))?$agente->puestoTrabajo->tipoInstrumento->nombre_corto." ".$agente->puestoTrabajo->numero_instrumento:null !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Fecha Instrum. Legal</th>
                                <td>
                                    {!!($agente->puestoTrabajo->fecha_instrumento)?date("d-m-Y",strtotime($agente->puestoTrabajo->fecha_instrumento)):null !!}
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@permission("ver_logs")
<div class="col-md-12">

    <div class="box box-default">
        <div class="box-header">
            Log
        </div>
        <div class="box-body">
            <table class="record_properties">
                <tbody>
                <tr>
                    <th>Id</th>
                    <td>{!! $agente->id!!}</td>
                </tr>
                <tr>
                    <th>Creado el</th>
                    <td>{!! date("d-m-Y H:i:s",strtotime($agente->created_at))!!}</td>
                </tr>
                <tr>
                    <th>Actualizado el</th>
                    <td>{!! date("d-m-Y H:i:s",strtotime($agente->updated_at))!!}</td>
                </tr>
                </tbody>
            </table>
            <div class="table-responsive">
                <table class="table" id="logTables-table">
                    <caption>Modificaciones</caption>
                    <thead>
                    <tr>
                        <th>Tabla</th>
                        <th>Registro Id</th>
                        <th>Campo</th>
                        <th>Valor Anterior</th>
                        <th>Valor Nuevo</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($log as $logTable)
                        <tr>
                            <td>{!! $logTable->tabla !!}</td>
                            <td>{!! $logTable->registro_id !!}</td>
                            <td>{!! $logTable->campo !!}</td>
                            <td>{!! $logTable->valor_anterior !!}</td>
                            <td>{!! $logTable->valor_nuevo !!}</td>
                            <td>{!! $logTable->user->name !!}</td>
                            <td>{!! date("d-m-Y H:i:s",strtotime($logTable->created_at)) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endpermission