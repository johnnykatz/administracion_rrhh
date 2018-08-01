<table class="table table-responsive" id="unidadOrganizacions-table">
    <thead>
        <tr>
            <th>Codigo</th>
        <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($unidadOrganizacions as $unidadOrganizacion)
        <tr>
            <td>{!! $unidadOrganizacion->codigo !!}</td>
            <td>{!! $unidadOrganizacion->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.unidadOrganizacions.destroy', $unidadOrganizacion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.unidadOrganizacions.show', [$unidadOrganizacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.unidadOrganizacions.edit', [$unidadOrganizacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>