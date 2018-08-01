<div class="box box-primary">
    <div class="box-header">
        MINISTERIO
    </div>
    <div class="box-body">

        <!-- leyenda_anio Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('leyenda_anio', 'Leyenda:') !!}
            {!! Form::textarea('leyenda_anio', null, ['class' => 'form-control','rows'=>4]) !!}
        </div>
        <div class="form-group col-sm-12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>

    </div>
</div>
