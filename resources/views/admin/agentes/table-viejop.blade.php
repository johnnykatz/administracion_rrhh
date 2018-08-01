<div class="table-responsive">
    <table class="table table-bordered table-striped" id="agentes-table">
        <thead>
        <tr>
            <th>Apellido y Nombre</th>
            <th>Leg.</th>
            <th>Cat</th>
            <th>DNI</th>
            <th>AG.</th>
            <th>U.O.</th>
            <th>Est.</th>
            <th>Activo</th>
            <th>Tipo Agente Id</th>
            <th>Numero Tarjeta</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($agentes as $agente)
            <tr>
                <td>{!! $agente->apellido .", ".$agente->nombre!!}</td>
                <td>{!! $agente->legajo !!}</td>
                <td>{!! $agente->categoria !!}</td>
                <td>{!! $agente->dni !!}</td>
                <td>{!! $agente->puestoTrabajo->agrupamiento->nombre_corto or null !!}</td>
                <td>{!! $agente->puestoTrabajo->unidadOrganizacion->codigo or null !!}</td>
                <td>{!! $agente->puestoTrabajo->estadoRelacion->nombre_corto or null !!}</td>
                <td>
                    @if($agente->activo)
                        <span class="label label-success">Sí</span>
                    @else
                        <span class="label label-danger">No</span>
                    @endif
                </td>
                <td>{!! $agente->tipo_agente_id !!}</td>
                <td>{!! $agente->numero_tarjeta !!}</td>
                <td>
                    {!! Form::open(['route' => ['admin.agentes.destroy', $agente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.agentes.show', [$agente->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('admin.agentes.edit', [$agente->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>