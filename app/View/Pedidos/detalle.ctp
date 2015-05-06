<?php
  App::import('Model', 'Parametro');
  $modeloParametro = new Parametro();
  $datosParametro = $modeloParametro->find('first');
?>
<!-- invoice start-->
<section>
    <div class="panel panel-primary">
        <!--<div class="panel-heading navyblue"> INVOICE</div>-->
        <div class="panel-body">
           <div class="row invoice-list">                
                <div class="col-lg-4 col-sm-4">
                    <h4><?php echo $datosParametro['Parametro']['datostienda']; ?></h4>                    
                </div>
                <div class="col-lg-4 col-sm-4">
                    
                </div>
                <div class="col-lg-4 col-sm-4">
                    <h4>
                      <b>Invoice: </b> <?php echo $datosPedido['Pedido']['factura']; ?><br />
                      <?php
                        $fecha = $datosPedido['Pedido']['created'];
                        $fechaSeparada = explode(" ", $fecha);
                        //debug($fechaSeparada);
                      ?>
                      <b>Date: </b> <?php echo $fechaSeparada['0']; ?>
                    </h4>                    
                </div>
            </div>
            <div class="row invoice-list">
                <div class="text-center corporate-id">
                    <img src="<?php echo $this->webroot; ?>img/logo.png" alt="">
                    <!--<a href="#" class="logo">Bargain-<span>Wholesale</span></a>-->
                </div>
                <div class="col-lg-4 col-sm-4">
                    <h4><b>Customer:</b> <?php echo $datosPedido['User']['nombre']; ?></h4>                    
                </div>
                <div class="col-lg-4 col-sm-4">
                    
                </div>
                <div class="col-lg-4 col-sm-4">
                    <h4><b>Order: </b> <?php echo $datosPedido['Pedido']['numero']; ?></h4>                    
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Sku</th>
                        <th class="hidden-phone">Description</th>
                        <th class="">Unit Cost</th>
                        <th class="">Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php
                    $precioParcial = 0;
                    $subtotal = 0;
                    $total = 0;
                    ?>
                    <?php foreach ($datosPedido['Item'] as $dpi): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $dpi['Producto']['nombre']; ?></td>
                            <td><?php echo $dpi['Producto']['sku']; ?></td>
                            <td class="hidden-phone"><?php echo substr($dpi['Producto']['resumen'], 0, 30); ?> ...</td>
                            <td class=""><?php echo $dpi['Producto']['precio']; ?></td>
                            <?php
                            $precio = $dpi['precio'];
                            //debug($precio);
                            $cantidad = $dpi['cantidad'];
                            //debug($cantidad);
                            $precioParcial = $precio * $cantidad;
                            //debug($precioParcial);\
                            $subtotal += $precioParcial;
                            $tax = $datosPedido['Pedido']['tax'];
                            $shipping = $datosPedido['Pedido']['shipping'];
                            $total = $subtotal + $tax + $shipping;
                            ?>
                            <td class=""><?php echo $dpi['cantidad']; ?></td>
                            <td>$ <?php echo $precioParcial; ?></td>
                        </tr>      
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-4 invoice-block pull-right">
                    <ul class="unstyled amounts">
<!--                        <li><strong>Sub - Total amount :</strong> $<?php //echo $subtotal; ?></li>
                        <li><strong>Shipping :</strong> <?php //echo $datosPedido['Pedido']['shipping']; ?></li>
                        <li><strong>Tax :</strong> <?php //echo $datosPedido['Pedido']['tax']; ?></li>-->
                        <li><strong>Grand Total :</strong> $<?php echo $subtotal; ?></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <ul class="unstyled amounts">
<!--                        <li><strong>Sub - Total amount :</strong> $<?php //echo $subtotal; ?></li>
                        <li><strong>Shipping :</strong> <?php //echo $datosPedido['Pedido']['shipping']; ?></li>
                        <li><strong>Tax :</strong> <?php //echo $datosPedido['Pedido']['tax']; ?></li>-->
                        <li><strong><?php echo $datosParametro['Parametro']['cuenta']; ?></strong></li>
                    </ul>
                </div>
            </div>
            <div class="text-center invoice-btn hidden-print">
                <a href="<?php echo $this->Html->url(array('controller' => 'pedidos', 'action' => 'pagado', $datosPedido['Pedido']['id'])); ?>" class="btn btn-danger btn-lg"><i class="icon-check"></i> Pago Realizado </a>
                <a class="btn btn-info btn-lg" onclick="javascript:window.print();"><i class="icon-print"></i> Imprimir </a>
            </div>
        </div>
    </div>
</section>
<!-- invoice end-->