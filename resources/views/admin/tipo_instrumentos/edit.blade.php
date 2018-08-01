@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Instrumento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoInstrumento, ['route' => ['admin.tipoInstrumentos.update', $tipoInstrumento->id], 'method' => 'patch']) !!}

                        @include('admin.tipo_instrumentos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection