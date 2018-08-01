<!-- Tabla Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tabla', 'Tabla:') !!}
    {!! Form::text('tabla', null, ['class' => 'form-control']) !!}
</div>

<!-- Registro Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registro_id', 'Registro Id:') !!}
    {!! Form::text('registro_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Campo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo', 'Campo:') !!}
    {!! Form::text('campo', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Anterior Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_anterior', 'Valor Anterior:') !!}
    {!! Form::text('valor_anterior', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Nuevo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_nuevo', 'Valor Nuevo:') !!}
    {!! Form::text('valor_nuevo', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.logTables.index') !!}" class="btn btn-default">Cancel</a>
</div>
