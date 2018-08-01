@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agrupamiento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($agrupamiento, ['route' => ['admin.agrupamientos.update', $agrupamiento->id], 'method' => 'patch']) !!}

                        @include('admin.agrupamientos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection