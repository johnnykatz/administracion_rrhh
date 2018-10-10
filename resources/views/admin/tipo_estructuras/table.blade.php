<table class="table table-responsive" id="tipoEstructuras-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Nombre Corto</th>
            <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoEstructuras as $tipoEstructura)
        <tr>
            <td>{!! $tipoEstructura->nombre !!}</td>
            <td>{!! $tipoEstructura->nombre_corto !!}</td>
            <td>{!! $tipoEstructura->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.tipoEstructuras.destroy', $tipoEstructura->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.tipoEstructuras.show', [$tipoEstructura->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.tipoEstructuras.edit', [$tipoEstructura->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>