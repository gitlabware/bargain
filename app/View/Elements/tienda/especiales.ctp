<?php
App::import('Model', 'Producto');
$modeloProducto = new Producto();

App::import('Model', 'Imagene');
$modeloImagenes = new Imagene();

$productosEspeciales = $modeloProducto->find('all', array(
    'recursive' => -1,
    'conditions' => array('Producto.estado' => 2),
    'limit' => 3,
    'order' => 'RAND()'
        ));
?>
<?php $rol = $this->Session->read('Auth.User.role'); ?>
<?php $idUsuario = $this->Session->read('Auth.User.id'); ?>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-block sidebar">
    <div class="box-heading"><span>Especials</span></div>
    <div class="box-content">
        <div class="box-products slide carousel-fade" id="productc2">
            <ol class="carousel-indicators">
                <li class="active" data-slide-to="0" data-target="#productc2"></li>
                <li class="" data-slide-to="1" data-target="#productc2"></li>
                <li class="" data-slide-to="2" data-target="#productc2"></li>
            </ol>
            <div class="carousel-inner"> 
                <!-- item -->
                <?php for ($k = 0; $k <= 2; $k++): ?>
                    <?php if ($k === 0): ?>
                        <div class="item active">
                        <?php else: ?>
                            <div class="item">
                            <?php endif; ?>
                            <div class="product-block">                            
                                <div class="image">
                                    <div class="product-label product-new"><span>ESPECIAL</span></div>
                                    <?php
                                    $idProducto = $productosEspeciales[$k]['Producto']['id'];
                                    //debug($idProducto);
                                    $sqlImagenes = $modeloImagenes->find('first', array(
                                        'recursive' => -1,
                                        'conditions' => array('Imagene.producto_id' => $idProducto),
                                        'order' => 'Imagene.id ASC'
                                    ));
                                    //debug($sqlImagenes);die;
                                    ?>
                                    <a class="img" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><img alt="product info" src="<?php echo $this->webroot; ?>files/img/<?php echo $sqlImagenes['Imagene']['imagen']; ?>" title="product title"></a>
                                </div>
                                <div class="product-meta">
                                    <div class="name"><a href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><?php echo $productosEspeciales[$k]['Producto']['nombre']; ?></a></div>
                                    <div class="big-price">
                                        <?php if ($rol == 'visitante'): ?>
                                            <span class="price-new">
                                                <span class="sym">$</span><?php echo $productosEspeciales[$k]['Producto']['precio']; ?>
                                            </span> 
                                        <?php else: ?>
                                            <span class="price-new">
                                                <span class="sym"></span>
                                            </span> 
                                        <?php endif; ?>
                                    </div>
                                    <div class="big-btns">
                                        <?php if ($rol == 'visitante'): ?>
                                            <a class="btn btn-default btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> 
                                            <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" id="btnCarte_<?php echo $idProducto; ?>">Add to Cart</a>
                                        <?php else: ?>
                                            <a class="btn btn-large btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> 
                                            <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" href="#">Register</a>
                                        <?php endif; ?>                                         
                                    </div>
                                    <div class="small-price"> 
                                        <?php if ($rol == 'visitante'): ?>
                                            <span class="price-new">
                                                <span class="sym">$</span><?php echo $productosEspeciales[$k]['Producto']['precio']; ?>
                                            </span> 
                                        <?php else: ?>
                                            <span class="price-new">
                                                <span class="sym"></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
                                    <div class="small-btns">                                                    
                                        <?php if ($rol == 'visitante'): ?>
                                            <button class="btn btn-default btn-addtocart pull-left" id="btnCart_<?php echo $idProducto; ?>" data-toggle="tooltip" title="Add to Cart"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                                            <script type="text/javascript">
                                                $("#btnCarte_<?php echo $idProducto; ?>").bind('click', function() {
                                                    $.ajax({
                                                        async: true,
                                                        type: 'post',
                                                        complete: function(request, json) {
                                                            $('#carrito').html(request.responseText);
                                                        }, url: '<?php echo $this->Html->url(array('action' => 'ajaxadcarrito', $idUsuario, $idProducto)); ?>'});

                                                    $("#btnCarte_<?php echo $idProducto; ?>").animate({
                                                        //opacity: 0.5,
                                                        height: "toggle",
                                                        //opacity: "toggle"
                                                    }, {
                                                        duration: "slow"
                                                    })
                                                });
                                            </script>
                                                                                        
                                        <?php else: ?>
        <!--                                            <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-retweet fa-fw"></i> </button>
                                            <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-heart fa-fw"></i> </button>
                                            <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-shopping-cart fa-fw"></i> </button>-->
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="meta-back"></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                    <!-- end: item --> 

                </div>
            </div>
            <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc2"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc2"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
            <div class="nav-bg"></div>
        </div>
    </div>
</div>