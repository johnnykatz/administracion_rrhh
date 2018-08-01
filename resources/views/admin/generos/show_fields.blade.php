<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $genero->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $genero->nombre !!}</p>
</div>

<!-- Nombre Reducido Field -->
<div class="form-group">
    {!! Form::label('nombre_reducido', 'Nombre Reducido:') !!}
    <p>{!! $genero->nombre_reducido !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $genero->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $genero->updated_at !!}</p>
</div>

