<div class="table-responsive">
    <table class="table table-bordered table-striped" id="agentes-table">
        <thead>
        <th>Datos Personales</th>
        <th>Datos Laborales</th>
        <th colspan="3">Acciones</th>
        </thead>
        <tbody>
        @foreach($agentes as $agente)
            <tr>
                <td class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                    <pre class="{{($agente->activo)?'text-success':'text-danger'}}"
                         style="text-transform: uppercase"><b>{!! $agente->apellido .", ".$agente->nombre!!}</b></pre>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <p><b>Activo:</b>
                            @if($agente->activo)
                                <span class="label label-success">SI</span>
                            @else
                                <span class="label label-danger">NO</span>
                            @endif
                        </p>
                        <p><b>D.N.I.:</b>
                            @if($agente->dni && is_numeric($agente->dni))
                                {!! ($agente->dni)?number_format($agente->dni,0,'.',"."):null !!}
                            @else
                                {!! $agente->dni!!}
                            @endif
                        </p>
                        <p><b>Fecha
                                Nac.:</b> {!! ($agente->fecha_nacimiento)?date("d-m-Y",strtotime($agente->fecha_nacimiento)):null !!}
                        </p>
                        <p><b>Telefono:</b>
                            @if($agente->telefono_celular)
                                {!!  $agente->telefono_celular!!}
                            @elseif($agente->telefono_fijo)
                                {!!  $agente->telefono_fijo!!}
                            @elseif($agente->telefono_otro)
                                {!!  $agente->telefono_otro!!}
                            @endif
                        </p>
                        <p><b>Direccion:</b> {!! $agente->direccion !!}</p>
                        <p><b>Titulo:</b> {!! $agente->titulo !!}</p>

                    </div>

                </td>
                <td class="col-lg-8 col-sm-8 col-md-8 col-xs-8">
                    @if($agente->tramite_jubilacion)
                        <pre class="{{($agente->activo)?'text-success':'text-danger'}}"
                             style="text-transform: uppercase">Lugar de Trabajo:<b> {!! $agente->puestoTrabajo->Estructura->nombre or null!!}<span
                                        class="pull-right">Jub. E/T</span></b></pre>
                    @else
                        <pre class="{{($agente->activo)?'text-success':'text-danger'}}"
                             style="text-transform: uppercase">Lugar de Trabajo: <b>{!! $agente->puestoTrabajo->Estructura->nombre!!}</b></pre>
                    @endif
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <p><b>Tipo Agente:</b> {!! $agente->tipoAgente->nombre or null !!}</p>
                        <p><b>Legajo:</b> {!! $agente->legajo !!}</p>
                        <p><b>Categoria:</b> {!! $agente->categoria !!}</p>
                        <p><b>Estado:</b> {!! $agente->estadoRelacion->nombre or null !!}</p>
                        <p>
                            <b>Ingreso:</b> {!! ($agente->fecha_ingreso)?date("d-m-Y",strtotime($agente->fecha_ingreso)):null !!}
                        </p>

                        <p><b>Numero Tarjeta:</b> {!! $agente->numero_tarjeta or null !!}</p>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <p><b>Situaci&oacute;n
                                Laboral:</b> {!! $agente->puestoTrabajo->situacionLaboral->nombre or null !!}</p>
                        <p><b>Agrup:</b> {!! $agente->puestoTrabajo->agrupamiento->nombre or null !!}</p>
                        <p><b>U.O.:</b> {!! $agente->puestoTrabajo->unidadOrganizacion->codigo or null !!}</p>
                        <p><b>Puesto:</b> {!! $agente->puestoTrabajo->tipoPuestoTrabajo->nombre or null !!}</p>
                        <p><b>Inst. Legal:</b>
                            @if(isset($agente->puestoTrabajo->tipoInstrumento->nombre_corto))
                                {!! $agente->puestoTrabajo->tipoInstrumento->nombre_corto !!}
                            @endif
                            @if(isset($agente->puestoTrabajo->numero_instrumento))
                                {!! $agente->puestoTrabajo->numero_instrumento !!}
                            @endif
                        </p>
                        <p><b>Fecha
                                Inst.:</b> {!! ($agente->puestoTrabajo->fecha_instrumento)?date("d-m-Y",strtotime($agente->puestoTrabajo->fecha_instrumento)):null !!}
                        </p>
                    </div>
                </td>
                <td>
                    {!! Form::open(['route' => ['admin.agentes.destroy', $agente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.agentes.show', [$agente->id]) !!}" title="Ver informacion"
                           class='btn btn-default'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        @permission("abm_agentes")
                        <a href="{!! route('admin.agentes.edit', [$agente->id]) !!}" title="Editar"
                           class='btn btn-warning'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        @endpermission
                        {{--                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>