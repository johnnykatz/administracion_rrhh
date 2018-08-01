@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Log Table
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($logTable, ['route' => ['admin.logTables.update', $logTable->id], 'method' => 'patch']) !!}

                        @include('admin.log_tables.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection