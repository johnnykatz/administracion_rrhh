<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Reducido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_corto', 'Nombre Corto:') !!}
    {!! Form::text('nombre_corto', null, ['class' => 'form-control']) !!}
</div>
<!-- Estructura Padre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estructura_padre', 'Estructura Padre:') !!}
    {!! Form::select('estructura_padre',$estructuras,null,['class'=>'form-control select2','placeholder'=>'']) !!}
</div>




<div class="form-group col-sm-6">
    {!! Form::label('tipo_estructura_id', 'Tipo de estructura:') !!}
    {!! Form::select('tipo_estructura_id',$tiposEstructuras,null,['class'=>'form-control select2','placeholder'=>'']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.estructuras.index') !!}" class="btn btn-default">Cancelar</a>
</div>
