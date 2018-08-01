<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Corto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_corto', 'Nombre Corto:') !!}
    {!! Form::text('nombre_corto', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.tipoPuestoTrabajos.index') !!}" class="btn btn-default">Cancel</a>
</div>
