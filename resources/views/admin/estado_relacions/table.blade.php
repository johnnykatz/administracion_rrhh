<table class="table table-responsive" id="estadoRelacions-table">
    <thead>
        <tr>
            <th>Codigo</th>
        <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($estadoRelacions as $estadoRelacion)
        <tr>
            <td>{!! $estadoRelacion->codigo !!}</td>
            <td>{!! $estadoRelacion->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.estadoRelacions.destroy', $estadoRelacion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.estadoRelacions.show', [$estadoRelacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.estadoRelacions.edit', [$estadoRelacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>