<div id="sidebar"  class="nav-collapse hidden-print">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu"> 
<!--        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>Bloques</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Bloques', 'action' => 'index')); ?>" class="general.html">Listado de Bloques</a></li>
                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Bloques', 'action' => 'add')); ?>" class="general.html">Nuevo Bloque</a></li>
            </ul>
        </li>-->
        
<!--        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-tags"></i>
                <span>Bloques</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Bloques', 'action' => 'index')); ?>" class="general.html">Listado de Bloques</a></li>
                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Bloques', 'action' => 'add')); ?>" class="general.html">Nuevo Bloque</a></li>
            </ul>
        </li>-->
        
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-th-large"></i>
                <span>Categories</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Categorias', 'action' => 'index')); ?>" class="general.html">Listado</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Categorias', 'action' => 'add')); ?>" class="general.html">Nueva</a></li>
            </ul>
        </li>
        
<!--        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-picture"></i>
                <span>Imagenes</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Imagenes', 'action' => 'index')); ?>" class="general.html">Listado de Imagenes</a></li>
                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Imagenes', 'action' => 'add')); ?>" class="general.html">Nueva Imagen</a></li>
            </ul>
        </li>-->
        
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-bookmark"></i>
                <span>Marcas</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Marcas', 'action' => 'index')); ?>" class="general.html">Listado</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Marcas', 'action' => 'add')); ?>" class="general.html">Nueva</a></li>
            </ul>
        </li>
        
<!--        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-file-text-alt"></i>
                <span>Paginas</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Paginas', 'action' => 'index')); ?>" class="general.html">Listado de Paginas</a></li>
                <li><a href="<?php //echo $this->Html->url(array('controller' => 'Paginas', 'action' => 'add')); ?>" class="general.html">Nueva Pagina</a></li>
            </ul>
        </li>-->
        
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-star"></i>
                <span>Productos</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'listado')); ?>" class="general.html">Listado de Productos</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'add')); ?>" class="general.html">Nuevo Producto</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-money"></i>
                <span>Pedidos</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Pedidos', 'action' => 'index')); ?>" class="general.html">Listado de Pedidos</a></li>                
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-dollar"></i>
                <span>Ventas</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Pedidos', 'action' => 'ventas')); ?>" class="general.html">Listado</a></li>                
            </ul>
        </li>
        
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon-user"></i>
                <span>Usuarios</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'index')); ?>" class="general.html">Listado de Usuarios</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'add')); ?>" class="general.html">Nuevo Usuario</a></li>
            </ul>
        </li>

    </ul>
    <!-- sidebar menu end-->
</div>