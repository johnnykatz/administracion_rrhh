{!! Form::model(Request::all(),['route'=>'admin.agentes.index','method'=>'GET','class'=>'form-horizontal','id'=>'form_listado']) !!}
<div class="form-group">
    <div class="col-lg-1 col-sm-1 col-md-2 col-xs-12">
        {!! Form::label('activo', 'Activo:',['class'=>'help-block']) !!}
        {!! Form::select('activo',[1=>'SI',0=>'NO'],(!empty($filtro['activo']))?$filtro['activo']:1,['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-4 col-sm-6 col-md-8 col-xs-12">
        {!! Form::label('comodin', 'D.N.I., Nombre, Legajo, Tarjeta:',['class'=>'help-block']) !!}
        {!! Form::text('comodin',(isset($filtro['comodin']))? $filtro['comodin']:'',['class'=>'form-control', 'placeholder' => 'Introduce aquí su criterio de búsqueda']) !!}
    </div>

    <div class="col-lg-4 col-sm-6 col-md-8 col-xs-12">
        {!! Form::label('estructura_id', 'Lugar de trabajo:',['class'=>'help-block']) !!}
        {!! Form::select('estructura_id',$estructuras,null,['class'=>'form-control select2','placeholder'=>'']) !!}
    </div>
    <div class="col-lg-3 col-sm-6 col-md-8 col-xs-12">
        {!! Form::label('dependencia', 'Incluir Dependencias:',['class'=>'help-block']) !!}
        {!! Form::select('dependencia',['SI'=>'SI','NO'=>'NO'],(!empty($filtro['dependencia']))?$filtro['dependencia']:'SI',['class'=>'form-control']) !!}
    </div>

    <div class="col-lg-4 col-sm-6 col-md-8 col-xs-12">
        {!! Form::label('tipo_puesto_trabajo_id', 'Puesto de Trabajo:',['class'=>'help-block']) !!}
        {!! Form::select('tipo_puesto_trabajo_id',$tiposPuestosTrabajos,null,['class'=>'form-control','placeholder'=>'']) !!}
    </div>
    <div class="col-lg-1 col-sm-1 col-md-2 col-xs-12">
        {!! Form::label('unidad_organizacion_id', 'U.O.:',['class'=>'help-block']) !!}
        {!! Form::select('unidad_organizacion_id',$unidadesOrganizaciones,null,['class'=>'form-control','placeholder'=>'']) !!}
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        {!! Form::label('genero_id', 'Genero:',['class'=>'help-block']) !!}
        {!! Form::select('genero_id',$generos,null,['class'=>'form-control','placeholder'=>'']) !!}
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        {!! Form::label('estado_relacion_id', 'Estado Relacion:',['class'=>'help-block']) !!}
        {!! Form::select('estado_relacion_id',$estadosRelaciones,null,['class'=>'form-control','placeholder'=>'']) !!}
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        {!! Form::label('tipo_agente_id', 'Tipo de Agente:',['class'=>'help-block']) !!}
        {!! Form::select('tipo_agente_id',$tiposAgentes,null,['class'=>'form-control','placeholder'=>'']) !!}
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        {!! Form::label('situacion_laboral_id', 'Situacion Laboral:',['class'=>'help-block']) !!}
        {!! Form::select('situacion_laboral_id',$situacionesLaborales,null,['class'=>'form-control','placeholder'=>'']) !!}
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        {!! Form::label('tramite_jubilacion', 'Jubilacion E/T:',['class'=>'help-block']) !!}
        {!! Form::select('tramite_jubilacion',[1=>'SI',0=>'NO'],(!empty($filtro['tramite_jubilacion']))?$filtro['tramite_jubilacion']:"",['class'=>'form-control','placeholder'=>'']) !!}
    </div>
</div>
<div class="form-group col-sm-2 pull-right ">
    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
    <button class="btn btn-success btn-label-left" type="button" id="btn-exportar-excel"
            title="exportar excel">
                    <span>
                        <i class="fa fa-file-excel-o"></i>
                    </span>
    </button>
</div>
{!! Form::close() !!}