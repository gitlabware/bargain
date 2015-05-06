<?php
App::import('Model', 'Producto');
$modeloProducto = new Producto();

App::import('Model', 'Imagene');
$modeloImagen = new Imagene();

App::uses('CakeNumber', 'Utility');
?>
<div class="row clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb"> <a href="index.html"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="about.html"> My Cart </a> </div>

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
                <h2>Cart (Please Check this Items)</h2>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix f-space10"></div>
<?php echo $this->Form->create('Producto', array('id' => 'Formulario')); ?>
<!-- product -->
<?php
$total = 0;
$subtotal = 0;
$i = 0;
?>
<?php if(!empty($datosPedido)): ?>
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
                            <div class="image"> <a class="img" href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'detalle', $idProducto)); ?>"><img alt="product info" src="../<?php $this->webroot; ?>files/img/<?php echo $nombreImagen; ?>" title="<?php echo $datosProducto['Producto']['nombre']; ?>"></a> </div>
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
                            <?php echo $this->Form->hidden("precio_$idItem", array('value' => $subA, 'class' => 'fprecios', 'id' => "mfprecio_$idItem")); ?>
                            <?php echo $this->Form->hidden("Dpedido.$i.item_id", array('value' => $idItem)); ?>
                            <?php $idPedido = $datosPedido['Pedido']['id']; ?>
                            <?php echo $this->Form->hidden("Dpedido.$i.pedido_id", array('value' => $idPedido)); ?>
                            <?php echo $this->Form->hidden("Dpedido.$i.cantidad", array('value' => $dpi['cantidad'], 'id'=>"cantForm_$i")); ?>
                            <?php //echo $this->Form->hidden("Producto.$i.", array('value'=>$idProducto)); ?>
                            <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'detalle', $idProducto)); ?>" class="btn normal color2">View Item</a> 
                        </div>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs p-wr">
                    <div class="product-attrb-wr">
                        <div class="product-attrb">                            
                            <div class="att"> <span>Available</span> <span class="size"></span> </div>
                            <!--<div class="att"> <span>:</span> <span class="size">Cotton</span> </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs p-wr">
                    <div class="product-attrb-wr">
                        <div class="product-attrb">
                            <div class="qtyinput">
                                <div class="quantity-inp">
                                    <input id="cantidad_<?php echo $idItem; ?>" type="text" class="quantity-input" name="p_quantity" value="<?php echo $dpi['cantidad']; ?>">                                    
                                    <div class="quantity-txt minusbtn" id="menos_<?php echo $idItem; ?>"><a href="#a" class="qty qtyminus" ><i class="fa fa-minus fa-fw"></i></a></div>
                                    <div class="quantity-txt plusbtn" id="mas_<?php echo $idItem; ?>"><a href="#a" class="qty qtyplus" ><i class="fa fa-plus fa-fw"></i></a></div>
                                </div>
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
                            <div class="remove"> <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'eliminadelcarrito', $idItem)); ?>" onclick="return confirm('Are you sure elim <?php echo $nombre; ?>? ')" class="color2" data-toggle="tooltip" data-original-title="Remove"><i class="fa fa-trash-o fa-fw color2"></i></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix f-space10"></div>
    <script>


                                $("#mas_<?php echo $idItem; ?>").click(function() {

                                    var $precioTotal = 0;
                                    var $cantidad;
                                    var $precio;
                                    var $total;
                                    var $sumaTotal = 0;
                                    var $shipping = 0;
                                    var $tax = 0;

                                    $precio = $("#precio_<?php echo $idItem; ?>").html();
                                    $cantidad = $("#cantidad_<?php echo $idItem; ?>").val();
                                    $("#cantForm_<?php echo $i; ?>").val($cantidad);
                                    $total = Number($cantidad) * Number($precio);
                                    $("#total_<?php echo $idItem; ?>").html($total.toFixed(2));
                                    $("#mfprecio_<?php echo $idItem; ?>").val($total);
                                    
                                    //$shipping = $("#tax").val();
                                    //$tax = $("#shipping").val();
                                    $shipping = 0;
                                    $tax = 0;
                                    
                                    //$campo = 
                                    $(':input.fprecios').each(function() {
                                        $valor = parseFloat($(this).val());
                                        console.log($valor);
                                        $precioTotal += parseFloat($valor);
                                    });
                                    $sumaTotal = Number($shipping) + Number($tax) + Number($precioTotal);
                                    $("#subTotal").html($precioTotal.toFixed(2));
                                    //$("#total").html($sumaTotal);
                                    $("#total").html($precioTotal.toFixed(2));
                                    //console.log($sumaTotal);
                                   
                                });

                                $("#menos_<?php echo $idItem; ?>").click(function() {
                                    var $precioTotal = 0;
                                    $precio = $("#precio_<?php echo $idItem; ?>").html();
                                    $cantidad = $("#cantidad_<?php echo $idItem; ?>").val();
                                    $("#cantForm_<?php echo $i; ?>").val($cantidad);
                                    $total = Number($cantidad) * Number($precio);
                                    $("#total_<?php echo $idItem; ?>").html($total.toFixed(2));
                                    $("#mfprecio_<?php echo $idItem; ?>").val($total);
                                    
                                    //$shipping = $("#tax").val();
                                    //$tax = $("#shipping").val();
                                    $shipping = 0;
                                    $tax = 0;
                                    
                                    //$campo = 
                                    $(':input.fprecios').each(function() {
                                        $valor = parseFloat($(this).val());
                                        console.log($valor);
                                        $precioTotal += parseFloat($valor);
                                    });
                                    $sumaTotal = Number($shipping) + Number($tax) + Number($precioTotal);
                                    $("#subTotal").html($precioTotal.toFixed(2));
                                    //$("#total").html($sumaTotal);
                                    $("#total").html($precioTotal.toFixed(2));
                                });
    </script>
    <?php $i++; ?>
<?php endforeach; ?>
<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="product">
              <div class="col-md-2 col-sm-3 hidden-xs p-wr">
                <div class="product-attrb-wr">
                  0 Items
                </div>
              </div>  
            </div>
        </div>
    </div>  
<?php endif; ?>
<!-- end: product -->

<div class="container">
    <div class="row"> 
        <!-- 	Estimate Shipping & Taxes -->
        <div class="col-md-4  col-sm-4 col-xs-12 cart-box-wr">
            <div class="box-heading"><span>Estimate Shipping</span></div>
            <div class="clearfix f-space10"></div>          
            <div class="box-content cart-box">
                <p>Estimated cost of shipping for each region, the amount is variable</p>                
                <!--<input name="data[Parametro][shipping]" type="text" value="<?php //echo $datosParametros['Parametro']['envio']; ?>" id="shipping" placeholder="Country" class="input4" disabled="disbled" />-->                
                <?php //echo $this->Form->hidden('shipping', array('value'=>$datosParametros['Parametro']['envio'])); ?>
            </div>
            <div class="clearfix f-space30"></div>
        </div>

        <!-- end: Estimate Shipping & Taxes --> 

        <!-- 	Discount Codes -->

        <div class="col-md-4  col-sm-4 col-xs-12 cart-box-wr">
            <div class="box-heading"><span>Estimate Taxes</span></div>
            <div class="clearfix f-space10"></div>
            <div class="box-content cart-box">
                <p>Estimated cost of taxes for each region, the amount is variable.</p>                
                <!--<input type="text" value="<?php //echo $datosParametros['Parametro']['tax']; ?>" id="tax" placeholder="Country" class="input4" disabled="disbled" />-->                                                       
                <?php //echo $this->Form->hidden('tax', array('value'=>$datosParametros['Parametro']['tax'])); ?>
            </div>
            <div class="clearfix f-space30"></div>
        </div>

        <!-- end: Discount Codes --> 

        <!-- 	Total amount -->

        <div class="col-md-4 col-sm-4 col-xs-12 cart-box-wr">
            <div class="box-content">
                <div class="cart-box-tm">
                    <div class="tm1">Sub-Total</div>
                    <div class="tm2" id="subTotal">$<?php echo $subtotal; ?></div>
                </div>
<!--                <div class="clearfix f-space10"></div>
                <div class="cart-box-tm">
                    <div class="tm1">Tax </div>
                    <div class="tm2">$<?php //echo $datosParametros['Parametro']['tax']; ?></div>
                </div>
                <div class="clearfix f-space10"></div>
                <div class="cart-box-tm">
                    <div class="tm1">Shipping </div>
                    <div class="tm2">$<?php //echo $datosParametros['Parametro']['envio']; ?></div>
                </div>-->
                <?php
                    //$costoTotal = 0;
                    //$tax = $datosParametros['Parametro']['tax'];
                    //$shipping = $datosParametros['Parametro']['envio'];                                      
                    //$costoTotal = $subtotal + $tax + $shipping;
                ?>
                <div class="clearfix f-space10"></div>
                <div class="cart-box-tm">
                    <div class="tm3 bgcolor2">Total </div>
                    <div class="tm4 bgcolor2">$<span id="total"><?php echo $subtotal; ?></span></div>
                </div>
                <div class="clearfix f-space10"></div>
                <button class="btn large color1 pull-right">Proceed to Checkout</button>
                <div class="clearfix f-space30"></div>
            </div>
        </div>

        <!-- end: Total amount --> 
    </form>
    </div>
</div>
<!-- Rectangle Banners -->
<?php echo $this->element('tienda/bannersrectangulares'); ?>
<!-- fin Rectangle Banners -->