<style>
    #tablaOrdenes{        
         border-bottom: 1px solid black;
    }
    #tablaOrdenes tr td{
        padding-top: 5px;
        border-top: 1px solid black;
    }
</style>
<div class="row clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb"> <a href="index.html"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="about.html"> About us </a> </div>

            <!-- Quick Help for tablets and large screens -->
            <div class="quick-message hidden-xs">
                <div class="quick-box">
                    <div class="quick-slide"> <span class="title">Help</span>
                        <div class="quickbox slide" id="quickbox">
                            <div class="carousel-inner">
                                <div class="item active"> <a href="#"> <i class="fa fa-envelope fa-fw"></i> Quick Message</a> </div>
                                <div class="item"> <a href="#"> <i class="fa fa-question-circle fa-fw"></i> FAQ</a> </div>
                                <div class="item"> <a href="#"> <i class="fa fa-phone fa-fw"></i> (92)3009712255</a> </div>
                            </div>
                        </div>
                        <a class="left carousel-control" data-slide="prev" href="#quickbox"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="right carousel-control" data-slide="next" href="#quickbox"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                </div>
            </div>
            <!-- end: Quick Help --> 

        </div>
    </div>
</div>

<div class="row clearfix f-space10"></div>
<div class="container">
    <div class="row">        
        <div class="col-md-12">

            <div class="page-title">
                <h2>MY ORDERS </h2>
            </div>

        </div>
    </div>
</div>    

<div class="row clearfix f-space10"></div>
<div class="container">
    <div class="row">        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span><i class="fa fa-money fa-fw"></i> LIST ORDERS</span></div>            
        </div>
    </div>
</div>    
<div class="row clearfix f-space10"></div>

<div class="row clearfix f-space10"></div>
<div class="container">
    <div class="row">        
        <table width="100%" border="0" id="tablaOrdenes">
            <tr>
                <th scope="col"><h2>ORDER</h2></th>
                <th scope="col"><h2>DATE</h2></th>
                <th scope="col"><h2>ESTATUS</h2></th>
                <th scope="col" ><h2>ACTION</h2></th>
            </tr>
            <?php foreach ($misPedidos as $mp): ?>
            <?php $idPedido = $mp['Pedido']['id']; ?>
                <tr>
                    <td align="center"><p><?php echo $mp['Pedido']['numero']; ?></p></td>
                    <td align="center"><?php echo $mp['Pedido']['created']; ?></td>
                    <td align="center">
                        <?php
                            $estado = $mp['Pedido']['estado'];
                            if($estado == 6):
                        ?>
                        Wait
                        <?php elseif($estado == 7): ?>
                        Payment
                        <?php endif; ?>
                    </td>
                    <td align="center">
                        <a href="<?php echo $this->Html->url(array('controller'=>'Productos', 'action'=>'pedidorealizado', $idPedido)); ?>" class="btn normal color2">View</a>                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>    

<div class="row clearfix f-space10"></div>
<div class="container">
    <div class="row">        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
            <a class="btn large color1 pull-right">View My Orders</a>           
            <a class="btn large color2 pull-right">Continue Shopping</a>
        </div>
    </div>
</div>
<div class="row clearfix f-space10"></div>