@extends('layouts.app')
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        })
    </script>

@endsection
@section('content')
    <section class="content-header">
        <h1>
            Estructura
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.estructuras.store']) !!}

                        @include('admin.estructuras.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
