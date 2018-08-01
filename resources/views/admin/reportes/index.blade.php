@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Ministerio de Desarrollo Social
            <small>Panel de control</small>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{!! $datosGenerales['cant_activos'] !!}</h3>

                        <p>Agentes Activos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes de este Ministerio que se encuentran activos">Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{!!  $datosGenerales['cant_planta']!!}</h3>

                        <p>Agentes Planta Permanente</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes activos de este Ministerio de Planta Permanente">Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{!!  $datosGenerales['cant_temp']!!}</h3>

                        <p>Agentes Contratados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes activos de este Ministerio Temporales.">Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{!! $datosGenerales['cant_adsc'] !!}</h3>

                        <p>Agentes Adscritos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes activos de este Ministerio que se encuentran Adscriptos a otros organismos.">Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{!! $datosGenerales['cant_adsc_otro'] !!}</h3>

                        <p>Adsc de otros Organismos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes activos de otros organismos que se encuentran prestando servicio en este Ministerio.">Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{!! $datosGenerales['cant_lic_grem'] !!}</h3>

                        <p>Agentes C/ Lic. Gremial</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes activos de este Ministerio que se encuentran con Licencia Gremial.">Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{!! $datosGenerales['cant_lic_sg'] !!}</h3>

                        <p>Agentes C/ Lic. S/ Goce de H. </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes activos de este Ministerio que se encuentran con Licencia sin Goce de Haberes.">Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple-active">
                    <div class="inner">
                        <h3>{!! $datosGenerales['cant_jubilacion'] !!}</h3>

                        <p>Agentes C/ Jubilacion E/T </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes activos de este Ministerio que se encuentran con Jubilación en Trámite">Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3>{!! $datosGenerales['cant_mujer'] !!}</h3>

                        <p>Agentes Mujeres</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes Mujeres activas de este Ministerio.">Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{!! $datosGenerales['cant_hombre'] !!}</h3>

                        <p>Agentes Hombres</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer" title="Agentes Hombres activos de este Ministerio." >Más info <i class="fa fa-info-circle"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
@endsection

