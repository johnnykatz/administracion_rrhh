<table class="table table-responsive" id="generos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Nombre Corto</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($generos as $genero)
        <tr>
            <td>{!! $genero->nombre !!}</td>
            <td>{!! $genero->nombre_corto !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.generos.destroy', $genero->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.generos.show', [$genero->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.generos.edit', [$genero->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>