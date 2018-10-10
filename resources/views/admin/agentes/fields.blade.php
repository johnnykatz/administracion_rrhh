<div class="box box-primary">
    <div class="box-header">
        DATOS PERSONALES
    </div>
    <div class="box-body">

        <!-- Foto Field -->
    {{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('foto', 'Foto:') !!}--}}
    {{--{!! Form::text('foto', null, ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    <!-- Apellido Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('apellido', 'Apellido:') !!}
            {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Nombre Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Dni Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('dni', 'Dni:') !!}
            {!! Form::number('dni', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Genero Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('genero_id', 'Genero:') !!}
            {!! Form::select('genero_id',$generos,null,['class'=>'form-control','required','placeholder'=>'Seleccione...']) !!}
        </div>

        <!-- Fecha Nacimiento Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
            {!! Form::text('fecha_nacimiento', (isset($agente->fecha_nacimiento))?date("d-m-Y",strtotime($agente->fecha_nacimiento)):null, ['class' => 'form-control datepicker']) !!}
        </div>

        <!-- Titulo Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('titulo', 'Titulo:') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        DATOS LABORALES
    </div>
    <div class="box-body">

        <div class="box box-primary">
            <div class="box-header">
                DATOS GENERALES
            </div>
            <div class="box-body">
                @if(isset($agente))
                    <div class="form-group col-sm-6">
                        {!! Form::label('activo', 'Activo:') !!}
                        {!! Form::select('activo',[1=>'SI',0=>'NO'],isset($agente->activo)?$agente->activo:1,['class'=>'form-control','required']) !!}
                    </div>
            @endif

            <!-- Tipo Agente Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('tipo_agente_id', 'Tipo Agente:') !!}
                    {!! Form::select('tipo_agente_id',$tiposAgentes,null,['class'=>'form-control','required','placeholder'=>'Seleccione...','onchange'=>'selectAdscripto();']) !!}
                </div>

                <!-- Estado Relacion Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('estado_relacion_id', 'Estado Relacion:') !!}
                    {!! Form::select('estado_relacion_id',$estadosRelaciones,null,['class'=>'form-control','required','placeholder'=>'Seleccione...']) !!}
                </div>

                <!-- Legajo Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('legajo', 'Legajo:') !!}
                    {!! Form::text('legajo', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Categoria Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('categoria', 'Categoria:') !!}
                    {!! Form::text('categoria', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Fecha Ingreso Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_ingreso', 'Fecha Ingreso:') !!}
                    {!! Form::text('fecha_ingreso', (isset($agente->fecha_ingreso))?date("d-m-Y",strtotime($agente->fecha_ingreso)):null, ['class' => 'form-control datepicker']) !!}
                </div>

                <!-- Numero Tarjeta Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('numero_tarjeta', 'Numero Tarjeta:') !!}
                    {!! Form::text('numero_tarjeta', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('tramite_jubilacion', 'Jubilacion en Tramite:') !!}
                    {!! Form::select('tramite_jubilacion',[1=>'SI',0=>'NO'],isset($agente)?$agente->tramite_jubilacion:0,['class'=>'form-control','required','placeholder'=>'Seleccione...']) !!}
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                PUESTO LABORAL
            </div>
            <div class="box-body">
                <!-- Unidad Organizacion Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('unidad_organizacion_id', 'Unidad Organizacion:') !!}
                    {!! Form::select('unidad_organizacion_id',$unidadesOrganizaciones,(isset($puestoTrabajo))?$puestoTrabajo->unidad_organizacion_id:null,['class'=>'form-control','required','placeholder'=>'Seleccione...']) !!}
                </div>

                <!-- Agrupamiento Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('agrupamiento_id', 'Agrupamiento:') !!}
                    {!! Form::select('agrupamiento_id',$agrupamientos,(isset($puestoTrabajo))?$puestoTrabajo->agrupamiento_id:null,['class'=>'form-control','required','placeholder'=>'Seleccione...']) !!}
                </div>

                <!-- Estado Relacion Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('situacion_laboral_id', 'Situacion Laboral:') !!}
                    {!! Form::select('situacion_laboral_id',$situacionesLaborales,(isset($puestoTrabajo))?$puestoTrabajo->situacion_laboral_id:null,['class'=>'form-control','required','placeholder'=>'Seleccione...']) !!}
                </div>

                <!-- Agrupamiento Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('tipo_puesto_trabajo_id', 'Puesto de Trabajo:') !!}
                    {!! Form::select('tipo_puesto_trabajo_id',$tiposPuestosTrabajos,(isset($puestoTrabajo))?$puestoTrabajo->tipo_puesto_trabajo_id:null,['class'=>'form-control multiple','required','placeholder'=>'Seleccione...']) !!}
                </div>

                <!-- Agrupamiento Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('estructura_id', 'Lugar de Trabajo:') !!}
                    <div class="input-group">
                        {!! Form::select('estructura_id',$estructuras,(isset($puestoTrabajo))?$puestoTrabajo->estructura_id:null,['class'=>'form-control select2','required','placeholder'=>'Seleccione...']) !!}
                        <span class="input-group-btn">
                          <button class="btn btn-success" onclick="    $('#modalNuevaEstructura').modal('show');"
                                  type="button">Nuevo</button>
                         </span>
                    </div>
                </div>

                <!-- Estado Relacion Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('tipo_instrumento_id', 'Tipo Instrumento Legal:') !!}
                    {!! Form::select('tipo_instrumento_id',$tiposInstrumentos,(isset($puestoTrabajo))?$puestoTrabajo->tipo_instrumento_id:null,['class'=>'form-control','required','placeholder'=>'Seleccione...']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('numero_instrumento', 'Numero de Instrumento:') !!}
                    {!! Form::text('numero_instrumento', (isset($puestoTrabajo))?$puestoTrabajo->numero_instrumento:null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_instrumento', 'Fecha de Instrumento:') !!}
                    {!! Form::text('fecha_instrumento', (isset($puestoTrabajo->fecha_instrumento))?date("d-m-Y",strtotime($puestoTrabajo->fecha_instrumento)):null, ['class' => 'form-control datepicker']) !!}
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                DATOS DE CONTACTO Y OTROS DATOS
            </div>
            <div class="box-body">
                <!-- Direccion Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('direccion', 'Direccion:') !!}
                    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Celular Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('telefono_celular', 'Celular:') !!}
                    {!! Form::text('telefono_celular', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Telefono Fijo Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('telefono_fijo', 'Telefono Fijo:') !!}
                    {!! Form::text('telefono_fijo', null, ['class' => 'form-control']) !!}
                </div>


                <!-- Telefono Otro Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('telefono_otro', 'Telefono Otro:') !!}
                    {!! Form::text('telefono_otro', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Email Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Observacion Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('observacion', 'Observacion:') !!}
                    {!! Form::textarea('observacion', null, ['class' => 'form-control','rows'=>4]) !!}
                </div>

            </div>
        </div>

        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('admin.agentes.index') !!}" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</div>

