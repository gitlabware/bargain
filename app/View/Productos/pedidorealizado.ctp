<?php
App::import('Model', 'Producto');
$modeloProducto = new Producto();

App::import('Model', 'Imagene');
$modeloImagen = new Imagene();

App::import('Model', 'Parametro');
$modeloParametro = new Parametro();

App::uses('CakeNumber', 'Utility');
?>
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

          <div class="page-title" style="height: 200px;">
                <h2>SUCCESSFULLY ORDER <strong>No. <?php echo $datosPedido['Pedido']['numero']; ?></strong></h2>
                <h3>
                  <?php 
                    $cuenta = $modeloParametro->find('first');
                    //debug($cuenta);
                    echo $cuenta['Parametro']['cuenta'];
                  ?>
                </h3>
            </div>

        </div>
    </div>
</div>    

<div class="row clearfix f-space10"></div>
<div class="container">
    <div class="row">        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span><i class="fa fa-money fa-fw"></i> ORDER DETAIL</span></div>            
        </div>
    </div>
</div>    
<div class="row clearfix f-space10"></div>

<?php
$total = 0;
$subtotal = 0;
$i = 0;
?>
<?php foreach ($datosPedido['Item'] as $dpi): ?>
    <div class="container">
        <div class="row">
            <div class="product">
                <div class="col-md-2 col-sm-3 hidden-xs p-wr">
                    <div class="product-attrb-wr">
                        <div class="product-attrb">
                            <?php
                            $idProducto = $dpi['producto_id'];
                            $idItem = $dpi['id'];
                            $datosProducto = $modeloProducto->findById($idProducto, null, null, null, null, -1);
                            //$imagen = $modeloImagen->findByProductoId($idProducto, null, null, null, null, -1);
                            $imagen = $modeloImagen->find('first', array(
                                'recursive' => -1,
                                'conditions' => array('Imagene.producto_id' => $idProducto)
                            ));
                            $nombreImagen = $imagen['Imagene']['imagen'];
                            //echo WWW_ROOT . 'files' . DS . 'img' . DS . $nombreImagen;
                            //debug($imagen);
                            ?>
                            <div class="image"> 
                                <a class="img" href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'detalle', $idProducto)); ?>">
                                    <img alt="product info" src="../../<?php $this->webroot; ?>files/img/<?php echo $nombreImagen; ?>" title="<?php echo $datosProducto['Producto']['nombre']; ?>"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-7 col-xs-9 p-wr">
                    <div class="product-attrb-wr">
                        <div class="product-meta">
                            <div class="name">
                                <h3>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'detalle', $idProducto)); ?>">
                                        <?php
                                        //debug($dpi); 
                                        //$datosProducto = $modeloProducto->findById($idProducto, null, null, null, null, -1);
                                        $nombre = $datosProducto['Producto']['nombre'];
                                        echo $datosProducto['Producto']['nombre'];
                                        ?>
                                    </a>
                                </h3>
                            </div>
                            <div class="price"> <span class="price-new"><span class="sym">$</span><?php echo $dpi['precio']; ?></span>  </div>
                            <div id="precio_<?php echo $idItem; ?>" style="display: none"><?php echo $dpi['precio']; ?></div>
                            <?php $subA = $dpi['precio'] * $dpi['cantidad']; ?>

                            <?php $idPedido = $datosPedido['Pedido']['id']; ?>

                            <?php //echo $this->Form->hidden("Producto.$i.", array('value'=>$idProducto)); ?>
                            <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'detalle', $idProducto)); ?>" class="btn normal color2">View Item</a> 
                        </div>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs p-wr">
                    <div class="product-attrb-wr">
                        <div class="product-attrb">                            
                            <div class="att"> <span>Available</span> <span class="size"></span> </div>
                            <!--<div class="att"> <span>Type:</span> <span class="size">Cotton</span> </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs p-wr">
                    <div class="product-attrb-wr">
                        <div class="product-attrb">
                            <div class="qtyinput">
                                <?php echo $dpi['cantidad']; ?>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs p-wr">
                    <div class="product-attrb-wr">
                        <div class="product-attrb">
                            <div class="price"> 
                                <span class="t-price"><span class="sym">$</span>
                                    <span id="total_<?php echo $idItem; ?>">
                                        <?php
                                        $total = $dpi['cantidad'] * $dpi['precio'];
                                        $subtotal += $total;
                                        echo $total;
                                        ?>
                                    </span>
                                </span> 
                            </div>
                            <div id="totales_<?php echo $idItem ?>" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-3 p-wr">
                    <div class="product-attrb-wr">
                        <div class="product-attrb">
                            OK                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row clearfix f-space10"></div>   
    <?php $i++; ?>
<?php endforeach; ?>

<div class="container">
    <div class="row" style="float: right">        
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block" >
            <div class="box-heading"><span><i class="fa fa-money fa-fw"></i> TOTAL <?php echo $subtotal; ?></span></div>            
        </div>
    </div>
</div>      


<div class="row clearfix f-space10"></div>
<div class="container">
    <div class="row">        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
          <a class="btn large color1 pull-right" href="<?php echo $this->Html->url(array('controller'=>'Pedidos', 'action'=>'misordenes')); ?>">View My Orders</a>           
            <a class="btn large color2 pull-right" href="<?php echo $this->Html->url(array('controller'=>'productos', 'action'=>'tienda')); ?>">Continue Shopping</a>
        </div>
    </div>
</div>
<div class="row clearfix f-space10"></div>