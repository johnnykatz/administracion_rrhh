<table class="table table-responsive" id="puestoTrabajos-table">
    <thead>
        <tr>
            <th>Numero Instrumento</th>
        <th>Fecha Instrumento</th>
        <th>Tipo Instrumento Id</th>
        <th>Estado</th>
        <th>Observacion</th>
        <th>Estructura Id</th>
        <th>Agente Id</th>
        <th>Situacion Laboral Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($puestoTrabajos as $puestoTrabajo)
        <tr>
            <td>{!! $puestoTrabajo->numero_instrumento !!}</td>
            <td>{!! $puestoTrabajo->fecha_instrumento !!}</td>
            <td>{!! $puestoTrabajo->tipo_instrumento_id !!}</td>
            <td>{!! $puestoTrabajo->estado !!}</td>
            <td>{!! $puestoTrabajo->observacion !!}</td>
            <td>{!! $puestoTrabajo->estructura_id !!}</td>
            <td>{!! $puestoTrabajo->agente_id !!}</td>
            <td>{!! $puestoTrabajo->situacion_laboral_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.puestoTrabajos.destroy', $puestoTrabajo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.puestoTrabajos.show', [$puestoTrabajo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.puestoTrabajos.edit', [$puestoTrabajo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>