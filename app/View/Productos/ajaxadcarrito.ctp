<?php //debug($datosPedido);die; ?>
<?php
    App::import('Model', 'Producto');
    $modeloProducto = new Producto();
    
     App::uses('CakeNumber', 'Utility');
?>
<?php 
    $i=0;
    $precioTotal = 0;  
    $cantidadTotal = 0;
    foreach($datosPedido['Item'] as $dpi)
    {
        $i++;
        $precioUnitario = $dpi['precio'];
        $cantidadUnitaria = $dpi['cantidad'];
        $precioTotal += $precioUnitario; 
        $cantidadTotal += $cantidadUnitaria;
    }   
?>    

<?php if(empty($datosPedido)): ?>
    
<?php else: ?>
<div class="qc-row qc-row-heading"> <span class="qc-col-qty">QTY.</span> <span class="qc-col-name"><?php echo $cantidadTotal; ?> items in bag</span> <span class="qc-col-price">$<?php echo CakeNumber::currency($precioTotal, '');; ?></span> </div>
    <?php foreach($datosPedido['Item'] as $dpi): ?>
    <?php //debug($datosPedido); ?>
    <div class="qc-row qc-row-item"> 
        <span class="qc-col-qty"><?php echo $dpi['cantidad']; ?></span> 
        <span class="qc-col-name">
            <a href="#a">
                <?php 
                    //debug($dpi); 
                    $idProducto = $dpi['producto_id'];
                    $datosProducto = $modeloProducto->findById($idProducto, null, null, null, null, -1);
                    echo $datosProducto['Producto']['nombre'];
                ?>
            </a>
        </span> 
        <span class="qc-col-price">$<?php echo $dpi['precio']; ?></span> 
<!--        <span class="qc-col-remove"> <i class="fa fa-times fa-fw"></i> </span> -->
    </div>
<!--    <div class="qc-row qc-row-item"> <span class="qc-col-qty">1</span> <span class="qc-col-name"><a href="#a">Women Fashion hot Wear item</a></span> <span class="qc-col-price">$800</span> <span class="qc-col-remove"> <i class="fa fa-times fa-fw"></i> </span> </div>
    <div class="qc-row qc-row-item"> <span class="qc-col-qty">3</span> <span class="qc-col-name"><a href="#a">Women Fashion hot Wear item</a></span> <span class="qc-col-price">$252.25</span> <span class="qc-col-remove"> <i class="fa fa-times fa-fw"></i> </span> </div>-->
    <?php endforeach; ?>
<div class="qc-row-bottom"><a class="btn qc-btn-viewcart" href="<?php echo $this->Html->url(array('controller'=>'Productos' , 'action'=>'carrito')); ?>">view
        cart</a><a class="btn qc-btn-checkout" href="<?php echo $this->Html->url(array('controller'=>'Productos' , 'action'=>'carrito')); ?>">check
        out</a></div>
<?php endif; ?>
