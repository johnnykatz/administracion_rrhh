<div class="modal fade" id="modalNuevaEstructura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Lugar de Trabajo de Otro Organismo</h4>
            </div>
            {!! Form::model(Request::all(),['route'=>'admin.estructuras.nueva_estructura_externa','method'=>'POST','id'=>'form_nueva_estructura']) !!}
            <div class="modal-body" id="">
                <div class="row">
                    <div class="col-sm-12">
                        {{--<div class="row">--}}
                        <div class="form-group">
                            {!! Form::label('nombre_estructura', 'Nombre:') !!}
                            {!! Form::text('nombre_estructura',null,['id'=>'nombre_estructura','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nombre_corto_estructura', 'Nombre Corto:') !!}
                            {!! Form::text('nombre_corto_estructura',null,['id'=>'nombre_corto_estructura','class'=>'form-control']) !!}
                        </div>
                        {{ Form::hidden('url',route('admin.estructuras.nueva_estructura_externa')) }}
                        {{ Form::hidden('urlGet',route('getEstructurasAjax')) }}

                        {{--</div>--}}
                        <div class="form-group col-sm-6">
                            <p class="text-danger hidden" id="mensaje"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="modal-footerq">
                    <button type="button" class="btn btn-default" data-dismiss="modal" title="Cancelar"><i
                        >Cancelar</i></button>
                    <button type="button" onclick="return guardarNuevaEstructura()" class="btn btn-primary"
                            id="btn-filter" title="Guardar"
                            data-loading-text="<i class='ion ion-load-c fa-spin'></i> Guardar"><i
                                class='fa fa-check'></i> Guardar
                    </button>
                </div>
                {{--{!! Form::close() !!}--}}
            </div>
        </div>
    </div>
</div>
