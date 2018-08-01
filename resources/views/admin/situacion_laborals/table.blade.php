<table class="table table-responsive" id="situacionLaborals-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Codigo</th>
        <th>Nombre Corto</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($situacionLaborals as $situacionLaboral)
        <tr>
            <td>{!! $situacionLaboral->nombre !!}</td>
            <td>{!! $situacionLaboral->codigo !!}</td>
            <td>{!! $situacionLaboral->nombre_corto !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.situacionLaborals.destroy', $situacionLaboral->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.situacionLaborals.show', [$situacionLaboral->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.situacionLaborals.edit', [$situacionLaboral->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>