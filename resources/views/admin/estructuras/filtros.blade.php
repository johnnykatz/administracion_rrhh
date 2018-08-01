{!! Form::model(Request::all(),['route'=>'admin.estructuras.index','method'=>'GET','class'=>'form-horizontal','id'=>'form_listado']) !!}
<div class="form-group">
    <div class="col-lg-6 col-sm-6 col-md-8 col-xs-12">
        {!! Form::label('comodin', 'Buscar:',['class'=>'help-block']) !!}
        {!! Form::text('comodin',(isset($filtro['comodin']))? $filtro['comodin']:'',['class'=>'form-control', 'placeholder' => 'Introduce aquí su criterio de búsqueda']) !!}
    </div>
</div>
<div class="form-group col-sm-2 pull-right ">
    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}