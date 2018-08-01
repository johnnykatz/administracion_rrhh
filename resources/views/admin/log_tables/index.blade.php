@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Log Tables</h1>
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
                        @include('admin.log_tables.filtros')
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.log_tables.table')
                <div class="text-center">
                    {!! $logTables->appends(Request::all())->render() !!}
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

