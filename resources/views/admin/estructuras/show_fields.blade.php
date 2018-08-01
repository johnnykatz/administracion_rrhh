<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $estructura->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $estructura->nombre !!}</p>
</div>

<!-- Estructura Padre Field -->
<div class="form-group">
    {!! Form::label('estructura_padre', 'Estructura Padre:') !!}
    <p>{!! $estructura->estructura_padre !!}</p>
</div>

<!-- Nombre Reducido Field -->
<div class="form-group">
    {!! Form::label('nombre_reducido', 'Nombre Reducido:') !!}
    <p>{!! $estructura->nombre_reducido !!}</p>
</div>

<!-- Tipo Estructura Id Field -->
<div class="form-group">
    {!! Form::label('tipo_estructura_id', 'Tipo Estructura Id:') !!}
    <p>{!! $estructura->tipo_estructura_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $estructura->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $estructura->updated_at !!}</p>
</div>

<div class="table-responsive">
    <table class="table" id="logTables-table">
        <caption>Modificaciones</caption>
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
        @foreach($log as $logTable)
            <tr>
                <td>{!! $logTable->tabla !!}</td>
                <td>{!! $logTable->registro_id !!}</td>
                <td>{!! $logTable->campo !!}</td>
                <td>{!! $logTable->valor_anterior !!}</td>
                <td>{!! $logTable->valor_nuevo !!}</td>
                <td>{!! $logTable->user->name !!}</td>
                <td>{!! date("d-m-Y H:i:s",strtotime($logTable->created_at)) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>