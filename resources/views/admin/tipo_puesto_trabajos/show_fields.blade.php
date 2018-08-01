<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tipoPuestoTrabajo->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $tipoPuestoTrabajo->nombre !!}</p>
</div>

<!-- Nombre Corto Field -->
<div class="form-group">
    {!! Form::label('nombre_corto', 'Nombre Corto:') !!}
    <p>{!! $tipoPuestoTrabajo->nombre_corto !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tipoPuestoTrabajo->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tipoPuestoTrabajo->updated_at !!}</p>
</div>

