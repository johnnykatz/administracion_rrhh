@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Puesto Trabajo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($puestoTrabajo, ['route' => ['admin.puestoTrabajos.update', $puestoTrabajo->id], 'method' => 'patch']) !!}

                        @include('admin.puesto_trabajos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection