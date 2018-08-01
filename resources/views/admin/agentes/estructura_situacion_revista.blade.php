<!DOCTYPE html>
<>
<head>
    <meta charset="UTF-8">
    {{--<title>Ministerio Desarrollo Social</title>--}}
    {{--<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="{!! asset("plugin/AdminLTE-2.4.2") !!}">--}}

    {{--<!-- Font Awesome -->--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}

    {{--<!-- Ionicons -->--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}

    {{--<!-- Theme style -->--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/AdminLTE.min.css">--}}
    <style>
        .t-texto {
            margin-left: 50mm;
            margin-right: 30mm;
            margin-top: 0mm;
        }

        body {
            margin: 0px;
        }

        /*.headt td {*/
        /*min-width: 235px;*/
        /*height: 100px;*/
        /*background-color: #433;*/
        /*}*/

        table td {
            height: 7mm;
        }

        .table-logo {
            height: 2mm;
            margin-bottom: 0;
            margin-top: 0;
            font-size: 3mm;
        }

        .texto {
            border-bottom: 2px solid #333333;
        }
    </style>
</head>

<table style="margin-left: 50mm; margin-right: 0">
    <tr>
        <td rowspan="2">
            <img src="{{asset('imagenes/LOGO.png')}}" style="width: 60mm"/>
        </td>
        <td colspan="2" style=" width:108mm;text-align: left;font-size: 4mm">{{$ministerio->leyenda_anio or null}}</td>

    </tr>
</table>


<h1 style="text-align: center"><u>SITUACIÓN DE REVISTA</u></h1>

<table class="t-texto">
    <tr>
        //150 15
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
        <td style="width: 10mm;text-align: right">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5"><strong>CERTIFICO</strong> que el/la Agente:</td>
        <td colspan="10" class="texto">{!! $agente->nombre." ".$agente->apellido !!}</td>
    </tr>
    <tr>
        <td colspan="2">D.N.I. N&deg;:</td>
        <td class="texto"
            colspan="3">{!! is_numeric($agente->dni)?number_format($agente->dni,0,",","."):$agente->dni!!}</td>
        <td colspan="2">Legajo N&deg;:</td>
        <td class="texto" colspan="2">{!! $agente->legajo !!}</td>
        <td colspan="4"> Revista en la Categor&iacute;a:</td>
        <td class="texto" colspan="2">{!!   $agente->categoria!!}</td>
    </tr>

    <tr>
        <td colspan="3">Agrupamiento:</td>
        <td class="texto" colspan="5">{!! $agente->puestoTrabajo->agrupamiento->nombre or null!!}</td>
        <td colspan="2">Estado:</td>
        <td class="texto" colspan="5">{!! $agente->estadoRelacion->nombre or null !!}</td>
    </tr>
    <tr>
        <td colspan="3">Jurisdicci&oacute;n:</td>
        <td class="texto" colspan="3">05-MDSMyJ</td>
        <td colspan="4">Unidad de Organiz.:
        </td>
        <td class="texto"
            colspan="5">{!! (isset($agente->puestoTrabajo->unidadOrganizacion))?$agente->puestoTrabajo->unidadOrganizacion->codigo."-".$agente->puestoTrabajo->unidadOrganizacion->nombre_corto: null!!}</td>
    </tr>
    <tr>
        <td colspan="3">Fecha de
            Ingreso:
        </td>
        <td class="texto"
            colspan="4">{!! ($agente->fecha_ingreso!="")?date("d-m-Y",strtotime($agente->fecha_ingreso)):null !!}</td>
        <td colspan="2">Antig&ucirc;edad:</td>
        <td class="texto" colspan="6">{!! $agente->antiguedad !!}</td>
    </tr>
    <tr>
        <td colspan="4">Presta Servicios en:</td>
        <td class="texto" colspan="11">{!! $agente->puestoTrabajo->estructura->nombre or null !!}</td>
    </tr>
    <tr>
        <td colspan="4">Puesto Laboral:</td>
        <td class="texto" colspan="11">{!! $agente->puestoTrabajo->tipoPuestoTrabajo->nombre or null !!}</td>
    </tr>
    <tr>
        <td colspan="4">Instrumento Legal:</td>
        <td class="texto" colspan="11">{!! $agente->instrumento !!}</td>
    </tr>
</table>

</body>
</html>
