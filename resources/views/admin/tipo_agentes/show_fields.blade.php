<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tipoAgente->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $tipoAgente->nombre !!}</p>
</div>

<!-- Nombre Reducido Field -->
<div class="form-group">
    {!! Form::label('nombre_reducido', 'Nombre Reducido:') !!}
    <p>{!! $tipoAgente->nombre_reducido !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tipoAgente->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tipoAgente->updated_at !!}</p>
</div>

