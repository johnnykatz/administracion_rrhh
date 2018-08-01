@extends('layouts.app')
@section('scripts')
    <script>
        $(document).ready(function () {
            inicializarFecha();
            $('.select2').select2();
        })
    </script>
    <script src="{{ asset('js/agentes.js') }}"></script>

@endsection
@include('admin.agentes.modal_nuevo_estructura')

@section('content')
    <section class="content-header">
        <h1>
            Agente
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        {{--<div class="box box-primary">--}}

        {{--<div class="box-body">--}}
        {{--<div class="row">--}}
        {!! Form::open(['route' => 'admin.agentes.store']) !!}

        @include('admin.agentes.fields')

        {!! Form::close() !!}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
