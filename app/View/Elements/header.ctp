<?php
    App::import('Model', 'Pedido');
    $modeloPedidos = new Pedido();
    $cuantosPedidos = $modeloPedidos->find('count', array(
        'conditions'=>array('Pedido.estado'=>6)
    ));
    $pedidos = $modeloPedidos->find('all', array(
        'conditions'=>array('Pedido.estado'=>6),
        'order'=>array('Pedido.id DESC'),
        'limit'=>4
    ));
    $idUsuario = $this->Session->read('Auth.User.id');
    //debug($cuantosPedidos);
?>
<?php //debug($pedidos); ?>
<header class="header white-bg hidden-print">
    <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
    </div>
    <!--logo start-->
    <a href="#" class="logo" >Bargain-<span>Wholesale</span></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="icon-th-large"></i>
                    <span class="badge bg-important"><?php echo $cuantosPedidos; ?></span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-red"></div>
                    <li>
                        <p class="red">Tienes <?php echo $cuantosPedidos; ?> Pedido(s)</p>
                    </li>                    
                    <?php foreach($pedidos as $p): ?>                    
                    <?php $idPedido = $p['Pedido']['id']; ?>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller'=>'pedidos','action'=>'detalle', $idPedido)); ?>">
                            <span class="photo"><img alt="avatar" src="<?php echo $this->webroot; ?>img/avatar-mini.jpg"></span>
                            <span class="subject">
                                <span class="from"><?php echo $p['User']['nombre']; ?></span>
                                <span class="time"></span>
                            </span>
                            <span class="message">
                                <?php echo $p['Pedido']['created']; ?>
                            </span>
                        </a>
                    </li>            
                    <?php endforeach; ?>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller'=>'pedidos','action'=>'index')); ?>">Ver todos los Pedidos</a>
                    </li>
                </ul>
            </li>
            <!-- inbox dropdown end -->            
        </ul>
    </div>
    <div class="top-nav ">
        <ul class="nav pull-right top-menu">
            <li>
                <input type="text" class="form-control search" placeholder="Search">
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="<?php echo $this->webroot; ?>img/avatar1_small.jpg">
                    <span class="username"><?php echo $this->Session->read('Auth.User.nombre'); ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <!--<li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>-->
                    <li><a href="<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'edit', $idUsuario)); ?>"><i class="icon-cog"></i> Datos</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'cambiopass', $idUsuario)); ?>"><i class="icon-lock"></i> Password</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller'=>'Users', 'action'=>'logout')); ?>"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
    </div>
</header>