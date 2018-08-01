@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agente
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                {{--<div class="row" style="padding-left: 20px">--}}
                @include('admin.agentes.show_fields')
            </div>

            <div class="box-footer">
                <a href="{!! route('admin.agentes.index') !!}" class="btn btn-default">Volver</a>
            </div>
        </div>
    </div>
@endsection
