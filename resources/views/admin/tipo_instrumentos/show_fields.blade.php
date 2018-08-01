<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tipoInstrumento->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $tipoInstrumento->nombre !!}</p>
</div>

<!-- Nombre Corto Field -->
<div class="form-group">
    {!! Form::label('nombre_corto', 'Nombre Corto:') !!}
    <p>{!! $tipoInstrumento->nombre_corto !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tipoInstrumento->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tipoInstrumento->updated_at !!}</p>
</div>

