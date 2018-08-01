<table class="table table-responsive" id="tipoAgentes-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Nombre Corto</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoAgentes as $tipoAgente)
        <tr>
            <td>{!! $tipoAgente->nombre !!}</td>
            <td>{!! $tipoAgente->nombre_corto !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.tipoAgentes.destroy', $tipoAgente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.tipoAgentes.show', [$tipoAgente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.tipoAgentes.edit', [$tipoAgente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>