<table class="table table-responsive" id="logTables-table">
    <thead>
    <tr>
        <th>Tabla</th>
        <th>Registro Id</th>
        <th>Campo</th>
        <th>Valor Anterior</th>
        <th>Valor Nuevo</th>
        <th>Usuario</th>
        <th>Fecha</th>
    </tr>
    </thead>
    <tbody>
    @foreach($logTables as $logTable)
        <tr>
            <td>{!! $logTable->tabla !!}</td>
            <td>{!! $logTable->registro_id !!}</td>
            <td>{!! $logTable->campo !!}</td>
            <td>{!! $logTable->valor_anterior !!}</td>
            <td>{!! $logTable->valor_nuevo !!}</td>
            <td>{!! $logTable->user->name or null !!}</td>
            <td>{!! date("d-m-Y H:i:s",strtotime($logTable->created_at)) !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>