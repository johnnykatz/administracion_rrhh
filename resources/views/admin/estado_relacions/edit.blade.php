@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estado Relacion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoRelacion, ['route' => ['admin.estadoRelacions.update', $estadoRelacion->id], 'method' => 'patch']) !!}

                        @include('admin.estado_relacions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection