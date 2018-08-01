<table class="table table-responsive" id="agrupamientos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($agrupamientos as $agrupamiento)
        <tr>
            <td>{!! $agrupamiento->nombre !!}</td>
            <td>{!! $agrupamiento->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.agrupamientos.destroy', $agrupamiento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.agrupamientos.show', [$agrupamiento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.agrupamientos.edit', [$agrupamiento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>