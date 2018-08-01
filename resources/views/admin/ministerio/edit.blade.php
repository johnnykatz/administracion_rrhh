@extends('layouts.app')
@section('scripts')
    <script>
        //        $(document).ready(function () {
        //            inicializarFecha();
        //            $('.multiple').select2();
        //        })
    </script>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Ministerio
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        @include('adminlte-templates::common.errors')
        {!! Form::model($ministerio, ['route' => ['admin.ministerio.update'], 'method' => 'patch']) !!}

        @include('admin.ministerio.fields')

        {!! Form::close() !!}

    </div>
@endsection