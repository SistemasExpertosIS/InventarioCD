<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users" aria-hidden="true"></i><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('boxes*') ? 'active' : '' }}">
    <a href="{!! route('boxes.index') !!}"><i class="fa fa-cubes" aria-hidden="true"></i><span>Cajas</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Productos</span></a>
</li>

<li class="{{ Request::is('transports*') ? 'active' : '' }}">
    <a href="{!! route('transports.index') !!}"><i class="fa fa-truck" aria-hidden="true"></i><span>Transportes</span></a>
</li>
<li class="{{ Request::is('movementTypes*') ? 'active' : '' }}">
    <a href="{!! route('movementTypes.index') !!}"><i class="fa fa-edit"></i><span>Tipo Movimientos</span></a>
</li>

<li class="{{ Request::is('branches*') ? 'active' : '' }}">
    <a href="{!! route('branches.index') !!}"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Sucursales</span></a>
</li>

<li class="{{ Request::is('transferMs*') ? 'active' : '' }}">
    <a href="{!! route('transferMs.index') !!}"><i class="fa fa-check-square" aria-hidden="true"></i><span>Traslados M</span></a>
</li>

<!--<li class="{{ Request::is('transferDs*') ? 'active' : '' }}">
    <a href="{!! route('transferDs.index') !!}"><i class="fa fa-check-square-o" aria-hidden="true"></i><span>Traslados D</span></a>
</li>-->

<li class="{{ Request::is('inventories*') ? 'active' : '' }}">
    <a href="{!! route('inventories.index') !!}"><i class="fa fa-clipboard" aria-hidden="true"></i><span>Inventario</span></a>
</li>

<li class="{{ Request::is('reporte*') ? 'active' : '' }}">
    <a href="/reportes"><i class="fa fa-file" aria-hidden="true"></i><span>Reportes</span></a>
</li>

