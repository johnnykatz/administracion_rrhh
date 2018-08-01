<!-- Numero Instrumento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_instrumento', 'Numero Instrumento:') !!}
    {!! Form::text('numero_instrumento', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Instrumento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_instrumento', 'Fecha Instrumento:') !!}
    {!! Form::text('fecha_instrumento', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Situacion Laboral Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('situacion_laboral_id', 'Situacion Laboral Id:') !!}
    {!! Form::text('situacion_laboral_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.puestoTrabajos.index') !!}" class="btn btn-default">Cancel</a>
</div>
