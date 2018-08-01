<li class="{{ Request::is('agentes*') ? 'active' : '' }}">
    <a href="{!! route('admin.agentes.index') !!}"><i class="fa  fa-male"></i><span>Agentes</span></a>
</li>


{{--<li class="{{ Request::is('puestoTrabajos*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.puestoTrabajos.index') !!}"><i class="fa fa-edit"></i><span>Puesto Trabajos</span></a>--}}
{{--</li>--}}

<li class="{{ (Request::is('admin/reportes*')) ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-pie-chart"></i> <span>Reportes</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('reportes*') ? 'active' : '' }}">
            <a href="{!! route('admin.reportes.index') !!}"><i
                        class="fa fa-edit"></i><span>Resumen</span></a>
        </li>
    </ul>
</li>
@permission(["editar_parametros","abm_agentes"])
<li class="{{ (Request::is('admin/puestoTrabajos*')) ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-edit"></i> <span>Parametros</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        @permission("abm_agentes")
        <li class="{{ Request::is('admin/ministerio*') ? 'active' : '' }}">
            <a href="{!! route('admin.ministerio.edit') !!}"><i
                        class="fa fa-edit"></i><span>Ministerio</span></a>
        </li>
        @endpermission
        @permission("editar_parametros")
        <li class="{{ Request::is('admin/agrupamientos*') ? 'active' : '' }}">
            <a href="{!! route('admin.agrupamientos.index') !!}"><i
                        class="fa fa-edit"></i><span>Agrupamientos</span></a>
        </li>
        <li class="{{ Request::is('admin/unidadOrganizacions*') ? 'active' : '' }}">
            <a href="{!! route('admin.unidadOrganizacions.index') !!}"><i class="fa fa-edit"></i><span>Unidad Organizacions</span></a>
        </li>

        <li class="{{ Request::is('admin/estadoRelacions*') ? 'active' : '' }}">
            <a href="{!! route('admin.estadoRelacions.index') !!}"><i
                        class="fa fa-edit"></i><span>Estado Relacions</span></a>
        </li>

        <li class="{{ Request::is('admin/estadoAgentes*') ? 'active' : '' }}">
            <a href="{!! route('admin.estadoAgentes.index') !!}"><i
                        class="fa fa-edit"></i><span>Estado Agentes</span></a>
        </li>

        <li class="{{ Request::is('admin/situacionLaborals*') ? 'active' : '' }}">
            <a href="{!! route('admin.situacionLaborals.index') !!}"><i
                        class="fa fa-edit"></i><span>Situacion Laborals</span></a>
        </li>

        <li class="{{ Request::is('admin/tipoEstructuras*') ? 'active' : '' }}">
            <a href="{!! route('admin.tipoEstructuras.index') !!}"><i
                        class="fa fa-edit"></i><span>Tipo Estructuras</span></a>
        </li>

        <li class="{{ Request::is('admin/estructuras*') ? 'active' : '' }}">
            <a href="{!! route('admin.estructuras.index') !!}"><i class="fa fa-edit"></i><span>Estructuras</span></a>
        </li>

        <li class="{{ Request::is('admin/generos*') ? 'active' : '' }}">
            <a href="{!! route('admin.generos.index') !!}"><i class="fa fa-edit"></i><span>Generos</span></a>
        </li>

        <li class="{{ Request::is('admin/tipoAgentes*') ? 'active' : '' }}">
            <a href="{!! route('admin.tipoAgentes.index') !!}"><i class="fa fa-edit"></i><span>Tipo Agentes</span></a>
        </li>

        <li class="{{ Request::is('admin/tipoInstrumentos*') ? 'active' : '' }}">
            <a href="{!! route('admin.tipoInstrumentos.index') !!}"><i
                        class="fa fa-edit"></i><span>Tipo Instrumentos</span></a>
        </li>

        <li class="{{ Request::is('admin/tipoPuestoTrabajos*') ? 'active' : '' }}">
            <a href="{!! route('admin.tipoPuestoTrabajos.index') !!}"><i class="fa fa-edit"></i><span>Tipo Puesto Trabajos</span></a>
        </li>
        @endpermission

    </ul>
</li>
@endpermission

@permission("usuarios")
<li class="{{ (Request::is('admin/permissions*') or Request::is('admin/roles*') or Request::is('admin/users*')) ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-users"></i> <span>Usuarios</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/permissions*') ? 'active' : '' }}">
            <a href="{!! route('admin.permissions.index') !!}"><i class="fa fa-edit"></i><span>Permisos</span></a>
        </li>
        <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
            <a href="{!! route('admin.roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
        </li>

        <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
            <a href="{!! route('admin.users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
        </li>

    </ul>
</li>
@endpermission

@permission("ver_logs")
@role("admin")
<li class="{{ Request::is('logTables*') ? 'active' : '' }}">
    <a href="{!! route('admin.logTables.index') !!}"><i class="fa fa-edit"></i><span>Log Tables</span></a>
</li>
@endrole
@endpermission

