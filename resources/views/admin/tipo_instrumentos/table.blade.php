<table class="table table-responsive" id="tipoInstrumentos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Nombre Corto</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoInstrumentos as $tipoInstrumento)
        <tr>
            <td>{!! $tipoInstrumento->nombre !!}</td>
            <td>{!! $tipoInstrumento->nombre_corto !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.tipoInstrumentos.destroy', $tipoInstrumento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.tipoInstrumentos.show', [$tipoInstrumento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.tipoInstrumentos.edit', [$tipoInstrumento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>