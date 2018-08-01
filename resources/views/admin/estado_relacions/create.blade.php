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
                    {!! Form::open(['route' => 'admin.estadoRelacions.store']) !!}

                        @include('admin.estado_relacions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
