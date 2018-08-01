@extends('layouts.app')
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        })
        window.onload = function () {
            $('#btn-exportar-excel').click(function () {
                console.log('ingresa a la funcion');
                $('#form_listado').attr('target', '_blank');
                $('#form_listado').attr('action', '{!! route('listadoAgentesExcel') !!}');
                $('#form_listado').submit();
                $('#form_listado').removeAttr('target');
                $('#form_listado').removeAttr('action');

            });
        }
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/agentes.css')}}">

@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Agentes</h1>
        @permission("abm_agentes")
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{!! route('admin.agentes.create') !!}">Nuevo Agente</a>
        </h1>
        @endpermission

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Filtros de búsqueda</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        @include('admin.agentes.filtros')
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-header">
                    <h4>Registros encontrados:<span class="text-danger"><strong> {!! $agentes->total() !!}</strong></span></h4>
                </div>
                @include('admin.agentes.table')
                <div class="text-center">
                    {!! $agentes->appends(Request::all())->render() !!}
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

