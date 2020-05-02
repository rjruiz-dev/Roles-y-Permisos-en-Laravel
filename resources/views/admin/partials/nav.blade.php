<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Navegación</li>
    <!-- Optionally, you can add icons to the links -->
    <li {{ request()->is('admin') ? 'class=active' : '' }}>
        <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>
        </a>
    </li>

    <li {{ request()->is('customers') ? 'class=active' : '' }}>
        <a href="{{ route('clientes') }}">
            <i class="fa fa-users"></i> <span>Clientes</span>
        </a>
    </li>    
   
    <!-- <li {{ request()->is('admin/clientes') ? 'class=active' : '' }}>
        <a href="{{ route('admin.clientes.index') }}">
            <i class="fa fa-user"></i> <span>Clientes</span>
        </a>
    </li> -->

    <li class="treeview {{ request()->is('admin/clientes*') ? 'active' : '' }}">                
        <a href="#"><i class="fa fa-users"></i> <span>Clientes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li {{ request()->is('admin/clientes') ? 'class=active' : '' }}><a href="{{ route('admin.clientes.index') }}"><i class="fa fa-user"></i>Listado de Clientes</a></li>
            <li {{ request()->is('admin/clientes/create') ? 'class=active' : '' }}><a href="{{ route('admin.clientes.create') }}"><i class="fa fa-user"></i>Crear un Cliente</a></li>
        </ul>
    </li>
   
    <li class="treeview">                
        <a href="#"><i class="fa fa-bars"></i> <span>Maquinas CNC</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-industry"></i>HASS</a></li>
            <li><a href="#"><i class="fa fa-industry"></i>G280</a></li>
        </ul>
    </li>
</ul>