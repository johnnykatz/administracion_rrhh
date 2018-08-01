@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Situacion Laboral
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($situacionLaboral, ['route' => ['admin.situacionLaborals.update', $situacionLaboral->id], 'method' => 'patch']) !!}

                        @include('admin.situacion_laborals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection