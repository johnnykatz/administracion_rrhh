<table class="table table-responsive" id="tipoPuestoTrabajos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Nombre Corto</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoPuestoTrabajos as $tipoPuestoTrabajo)
        <tr>
            <td>{!! $tipoPuestoTrabajo->nombre !!}</td>
            <td>{!! $tipoPuestoTrabajo->nombre_corto !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.tipoPuestoTrabajos.destroy', $tipoPuestoTrabajo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.tipoPuestoTrabajos.show', [$tipoPuestoTrabajo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.tipoPuestoTrabajos.edit', [$tipoPuestoTrabajo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>