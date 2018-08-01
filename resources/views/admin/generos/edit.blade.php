@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Genero
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($genero, ['route' => ['admin.generos.update', $genero->id], 'method' => 'patch']) !!}

                        @include('admin.generos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection