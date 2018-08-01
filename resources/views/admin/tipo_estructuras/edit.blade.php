@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Estructura
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoEstructura, ['route' => ['admin.tipoEstructuras.update', $tipoEstructura->id], 'method' => 'patch']) !!}

                        @include('admin.tipo_estructuras.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection