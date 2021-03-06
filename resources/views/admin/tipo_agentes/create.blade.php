@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Agente
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.tipoAgentes.store']) !!}

                        @include('admin.tipo_agentes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
