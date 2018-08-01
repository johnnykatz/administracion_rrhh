<div class="table-responsive">
    <table class="table table-bordered table-striped" id="agentes-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Tipo Estructura</th>
            <th>Nombre</th>
            <th>Nombre Corto</th>
            <th>Estructura Padre</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($estructuras as $estructura)
            <tr>
                <td>{!! $estructura->id !!}</td>
                <td>{!! $estructura->tipoEstructura->nombre or null !!}</td>
                <td>{!! $estructura->nombre !!}</td>
                <td>{!! $estructura->nombre_corto !!}</td>
                <td>{!! $estructura->estructuraPadre->nombre or null !!}</td>
                <td>
                    {!! Form::open(['route' => ['admin.estructuras.destroy', $estructura->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.estructuras.show', [$estructura->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('admin.estructuras.edit', [$estructura->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>