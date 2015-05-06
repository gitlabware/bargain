<?php
App::import('Model', 'Imagene');
$modeloImagenes = new Imagene();
?>
<?php $rol = $this->Session->read('Auth.User.role'); ?>
<?php $idUsuario = $this->Session->read('Auth.User.id'); ?>
<!-- Products -->
<div class="row clearfix f-space30"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span>FEATURED PRODUCTS</span></div>
            <div class="box-content">
                <div class="box-products slide" id="productc1">
                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc1"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc1"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    <div class="carousel-inner"> 
                        <!-- Items Row 1 fila -->
                        <div class="item active">
                            <div class="row box-product"> 
                                <!-- Product -->
                                <?php for ($i = 0; $i <= 2; $i++): ?>    
                                    <?php
                                    $idProducto = $productosFilaUno[$i]['Producto']['id'];
                                    ?>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="product-block">
                                            <div class="image">
                                                <div class="product-label product-sale"><span>SALE</span></div>
                                                <?php
                                                //$idProducto = $datosProducto['Producto']['id'];
                                                $imagenesProducto = $modeloImagenes->find('all', array(
                                                    'recursive' => -1,
                                                    'conditions' => array('Imagene.producto_id' => $idProducto)
                                                ));
                                                //debug($imagenesProducto);
                                                ?>
                                                <?php foreach ($imagenesProducto as $ip): ?>
                                                    <?php if ($ip['Imagene']['numero'] == 1): ?>
                                                        <a class="img" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><img alt="product info" src="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" title="product title"></a> </div>
                                                    <?php //else: ?>
                                                        <!--<a class="img" href="<?php //echo $this->Html->url(array('action' => 'detalle', $idProducto));          ?>"><img alt="product info" src="<?php //echo $this->webroot;          ?>img/tienda/products/product1.jpg" title="product title"></a> </div>-->
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                            <div class="product-meta">
                                                <div class="name"><a href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><?php echo $productosFilaUno[$i]['Producto']['nombre']; ?></a></div>
                                                <div class="big-price">
                                                    <?php if ($rol == 'visitante'): ?>
                                                        <span class="price-new">
                                                            <span class="sym">$</span><?php echo $productosFilaUno[$i]['Producto']['precio']; ?>
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
                                                        <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" id="btnCart1_<?php echo $idProducto; ?>">Add to Cart</a>
                                                    <?php else: ?>
                                                        <a class="btn btn-large btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> 
                                                        <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" href="#">Register</a>
                                                    <?php endif; ?>                                                    
                                                </div>
                                                <div class="small-price"> 
                                                    <?php if ($rol == 'visitante'): ?>
                                                        <span class="price-new">
                                                            <span class="sym">$</span><?php echo $productosFilaUno[$i]['Producto']['precio']; ?>
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
                                                        <button class="btn btn-default btn-compare pull-left" id="btnFav_<?php echo $idProducto; ?>" data-toggle="tooltip" title="Coming Soon"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Coming Soon"> <i class="fa fa-heart fa-fw"></i> </button>                                                                                                           
                                                        <button class="btn btn-default btn-addtocart pull-left" id="btnCart2_<?php echo $idProducto; ?>" data-toggle="tooltip" title="Add to Cart"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                                                        <script type="text/javascript">
                                                            $("#btnCart1_<?php echo $idProducto; ?>").bind('click', function() {
                                                                $.ajax({
                                                                    async: true,
                                                                    type: 'post',
                                                                    complete: function(request, json) {
                                                                        $('#carrito').html(request.responseText);
                                                                    }, url: '<?php echo $this->Html->url(array('action' => 'ajaxadcarrito', $idUsuario, $idProducto)); ?>'});

                                                                $("#btnCart1_<?php echo $idProducto; ?>").animate({
                                                                    //opacity: 0.5,                                                                    
                                                                    height: "toggle",
                                                                    //opacity: "toggle"
                                                                }, {
                                                                    duration: "slow"
                                                                })
                                                            });

                                                            $("#btnCart2_<?php echo $idProducto; ?>").bind('click', function() {
                                                                $.ajax({
                                                                    async: true,
                                                                    type: 'post',
                                                                    complete: function(request, json) {
                                                                        $('#carrito').html(request.responseText);
                                                                    }, url: '<?php echo $this->Html->url(array('action' => 'ajaxadcarrito', $idUsuario, $idProducto)); ?>'});

                                                                $("#btnCart2_<?php echo $idProducto; ?>").animate({
                                                                    //opacity: 0.5,
                                                                    height: "toggle",
                                                                    //opacity: "toggle"
                                                                }, {
                                                                    duration: "slow"
                                                                })
                                                            });
                                                        </script>
                                                    <?php else: ?>
                                                        <!--<button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Register"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Register"> <i class="fa fa-heart fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Register"> <i class="fa fa-shopping-cart fa-fw"></i> </button>-->
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="meta-back"></div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                                <!-- end: Product primera fila -->                                                                
                            </div>
                        </div>
                        <!-- end: Items Row --> 
                        <!-- Items Row 2 fila -->
                        <div class="item">
                            <div class="row box-product"> 
                                <!-- Product -->
                                <?php for ($i = 3; $i <= 5; $i++): ?>    
                                    <?php
                                    $idProducto = $productosFilaUno[$i]['Producto']['id'];
                                    ?>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="product-block">
                                            <div class="image">
                                                <div class="product-label product-sale"><span>SALE</span></div>
                                                <?php
                                                //$idProducto = $datosProducto['Producto']['id'];
                                                $imagenesProducto = $modeloImagenes->find('all', array(
                                                    'recursive' => -1,
                                                    'conditions' => array('Imagene.producto_id' => $idProducto)
                                                ));
                                                //debug($imagenesProducto);
                                                ?>
                                                <?php foreach ($imagenesProducto as $ip): ?>
                                                    <?php if ($ip['Imagene']['numero'] == 1): ?>
                                                        <a class="img" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><img alt="product info" src="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" title="product title"></a> </div>
                                                    <?php //else: ?>
                                                        <!--<a class="img" href="<?php //echo $this->Html->url(array('action' => 'detalle', $idProducto));          ?>"><img alt="product info" src="<?php //echo $this->webroot;          ?>img/tienda/products/product1.jpg" title="product title"></a> </div>-->
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                            <div class="product-meta">
                                                <div class="name"><a href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><?php echo $productosFilaUno[$i]['Producto']['nombre']; ?></a></div>
                                                <div class="big-price">
                                                    <?php if ($rol == 'visitante'): ?>
                                                        <span class="price-new">
                                                            <span class="sym">$</span><?php echo $productosFilaUno[$i]['Producto']['precio']; ?>
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
                                                        <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" id="btnCart1_<?php echo $idProducto; ?>">Add to Cart</a>
                                                    <?php else: ?>
                                                        <a class="btn btn-large btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> 
                                                        <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" href="#">Register</a>
                                                    <?php endif; ?> 
                                                </div>                                                    
                                                <div class="small-price">                                                     
                                                    <?php if ($rol == 'visitante'): ?>
                                                        <span class="price-new">
                                                            <span class="sym">$</span><?php echo $productosFilaUno[$i]['Producto']['precio']; ?>
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
                                                        <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>                                                                                                            
                                                        <button class="btn btn-default btn-addtocart pull-left" id="btnCart2_<?php echo $idProducto; ?>" data-toggle="tooltip" title="Add to Cart"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                                                        <script type="text/javascript">
                                                            $("#btnCart1_<?php echo $idProducto; ?>").bind('click', function() {
                                                                $.ajax({
                                                                    async: true,
                                                                    type: 'post',
                                                                    complete: function(request, json) {
                                                                        $('#carrito').html(request.responseText);
                                                                    }, url: '<?php echo $this->Html->url(array('action' => 'ajaxadcarrito', $idUsuario, $idProducto)); ?>'});

                                                                $("#btnCart1_<?php echo $idProducto; ?>").animate({
                                                                    //opacity: 0.5,
                                                                    height: "toggle",
                                                                    //opacity: "toggle"
                                                                }, {
                                                                    duration: "slow"
                                                                })
                                                            });
                                                            
                                                            $("#btnCart2_<?php echo $idProducto; ?>").bind('click', function() {
                                                                $.ajax({
                                                                    async: true,
                                                                    type: 'post',
                                                                    complete: function(request, json) {
                                                                        $('#carrito').html(request.responseText);
                                                                    }, url: '<?php echo $this->Html->url(array('action' => 'ajaxadcarrito', $idUsuario, $idProducto)); ?>'});

                                                                $("#btnCart2_<?php echo $idProducto; ?>").animate({
                                                                    //opacity: 0.5,
                                                                    height: "toggle",
                                                                    //opacity: "toggle"
                                                                }, {
                                                                    duration: "slow"
                                                                })
                                                            });                                                            
                                                        </script>
                                                    <?php else: ?>
                                                        <!--<button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-heart fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-shopping-cart fa-fw"></i> </button>-->
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="meta-back"></div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                                <!-- end: Product primer fila -->                                                                
                            </div>
                        </div>
                        <!-- end: Items Row 2 fila --> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Productos Especiales -->
        <?php echo $this->element('tienda/especiales'); ?>
        <!-- fin especiales -->
    </div>
</div>
<div class="row clearfix f-space30"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span>RECENT PRODUCTS</span></div>
            <div class="box-content">
                <div class="box-products slide" id="productc3">
                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc3"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc3"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    <div class="carousel-inner"> 
                        <!-- Items Row 1 fila de 4 -->
                        <div class="item active">
                            <div class="row box-product"> 
                                <!-- Product -->
                                <?php for ($i = 6; $i <= 9; $i++): ?>    
                                    <?php
                                    $idProducto = $productosFilaUno[$i]['Producto']['id'];
                                    ?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="product-block">
                                            <div class="image">
                                                <div class="product-label product-sale"><span>SALE</span></div>
                                                <?php
                                                //$idProducto = $datosProducto['Producto']['id'];
                                                $imagenesProducto = $modeloImagenes->find('all', array(
                                                    'recursive' => -1,
                                                    'conditions' => array('Imagene.producto_id' => $idProducto)
                                                ));
                                                //debug($imagenesProducto);
                                                ?>
                                                <?php foreach ($imagenesProducto as $ip): ?>
                                                    <?php if ($ip['Imagene']['numero'] == 1): ?>
                                                        <a class="img" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><img alt="product info" src="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" title="product title"></a> </div>
                                                    <?php //else: ?>
                                                        <!--<a class="img" href="<?php //echo $this->Html->url(array('action' => 'detalle', $idProducto));          ?>"><img alt="product info" src="<?php //echo $this->webroot;          ?>img/tienda/products/product1.jpg" title="product title"></a> </div>-->
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                            <div class="product-meta">
                                                <div class="name"><a href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><?php echo $productosFilaUno[$i]['Producto']['nombre']; ?></a></div>
                                                <div class="big-price">
                                                    <?php if ($rol == 'visitante'): ?>
                                                        <span class="price-new">
                                                            <span class="sym">$</span><?php echo $productosFilaUno[$i]['Producto']['precio']; ?>
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
                                                        <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" id="btnCart1_<?php echo $idProducto; ?>">Add to Cart</a>
                                                    <?php else: ?>
                                                        <a class="btn btn-large btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> 
                                                        <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" href="#">Register</a>
                                                    <?php endif; ?>                                                     
                                                </div>
                                                <div class="small-price"> 
                                                    <?php if ($rol == 'visitante'): ?>
                                                        <span class="price-new">
                                                            <span class="sym">$</span><?php echo $productosFilaUno[$i]['Producto']['precio']; ?>
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
                                                        <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>                                                                                                            
                                                        <button class="btn btn-default btn-addtocart pull-left" id="btnCart_<?php echo $idProducto; ?>" data-toggle="tooltip" title="Add to Cart"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                                                        <script type="text/javascript">
                                                            $("#btnCart_<?php echo $idProducto; ?>").bind('click', function() {
                                                                $.ajax({
                                                                    async: true,
                                                                    type: 'post',
                                                                    complete: function(request, json) {
                                                                        $('#carrito').html(request.responseText);
                                                                    }, url: '<?php echo $this->Html->url(array('action' => 'ajaxadcarrito', $idUsuario, $idProducto)); ?>'});

                                                                $("#btnCart_<?php echo $idProducto; ?>").animate({
                                                                    opacity: 0.5,
                                                                    //height: "toggle",
                                                                    //opacity: "toggle"
                                                                }, {
                                                                    duration: "slow"
                                                                })
                                                            });
                                                        </script>
                                                    <?php else: ?>
        <!--                                                        <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-heart fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-shopping-cart fa-fw"></i> </button>-->
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="meta-back"></div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                                <!-- end: Product primer fila -->                                                                
                            </div>
                        </div>
                        <!-- end: Items Row 1 fila de 4 --> 
                        <!-- Items Row 2 fila de 4 -->
                        <div class="item">
                            <div class="row box-product"> 
                                <!-- Product -->
                                <?php for ($i = 10; $i <= 13; $i++): ?>    
                                    <?php
                                    $idProducto = $productosFilaUno[$i]['Producto']['id'];
                                    ?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="product-block">
                                            <div class="image">
                                                <div class="product-label product-sale"><span>SALE</span></div>
                                                <?php
                                                //$idProducto = $datosProducto['Producto']['id'];
                                                $imagenesProducto = $modeloImagenes->find('all', array(
                                                    'recursive' => -1,
                                                    'conditions' => array('Imagene.producto_id' => $idProducto)
                                                ));
                                                //debug($imagenesProducto);
                                                ?>
                                                <?php foreach ($imagenesProducto as $ip): ?>
                                                    <?php if ($ip['Imagene']['numero'] == 1): ?>
                                                        <a class="img" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><img alt="product info" src="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" title="product title"></a> </div>
                                                    <?php //else: ?>
                                                        <!--<a class="img" href="<?php //echo $this->Html->url(array('action' => 'detalle', $idProducto));          ?>"><img alt="product info" src="<?php //echo $this->webroot;          ?>img/tienda/products/product1.jpg" title="product title"></a> </div>-->
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                            <div class="product-meta">
                                                <div class="name"><a href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><?php echo $productosFilaUno[$i]['Producto']['nombre']; ?></a></div>
                                                <div class="big-price">
                                                    <?php if ($rol == 'visitante'): ?>
                                                        <span class="price-new">
                                                            <span class="sym">$</span><?php echo $productosFilaUno[$i]['Producto']['precio']; ?>
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
                                                        <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" id="btnCart1_<?php echo $idProducto; ?>">Add to Cart</a>
                                                    <?php else: ?>
                                                        <a class="btn btn-large btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> 
                                                        <a class="btn btn-default btn-addtocart pull-right" btn="btnCart" href="#">Register</a>
                                                    <?php endif; ?>                                                     
                                                </div>
                                                <div class="small-price"> 
                                                    <?php if ($rol == 'visitante'): ?>
                                                        <span class="price-new">
                                                            <span class="sym">$</span><?php echo $productosFilaUno[$i]['Producto']['precio']; ?>
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
                                                                            <!--<button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                                            <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>-->                                                                                                            
                                                        <button class="btn btn-default btn-addtocart pull-left" id="btnCart_<?php echo $idProducto; ?>" data-toggle="tooltip" title="Add to Cart"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                                                        <script type="text/javascript">
                                                            $("#btnCart_<?php echo $idProducto; ?>").bind('click', function() {
                                                                $.ajax({
                                                                    async: true,
                                                                    type: 'post',
                                                                    complete: function(request, json) {
                                                                        $('#carrito').html(request.responseText);
                                                                    }, url: '<?php echo $this->Html->url(array('action' => 'ajaxadcarrito', $idUsuario, $idProducto)); ?>'});

                                                                $("#btnCart_<?php echo $idProducto; ?>").animate({
                                                                    opacity: 0.5,
                                                                    //height: "toggle",
                                                                    //opacity: "toggle"
                                                                }, {
                                                                    duration: "slow"
                                                                })
                                                            });
                                                        </script>
                                                    <?php else: ?>
        <!--                                                        <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-heart fa-fw"></i> </button>
                                                        <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-shopping-cart fa-fw"></i> </button>-->
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="meta-back"></div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                                <!-- end: Product primer fila -->                                                                
                            </div>
                        </div>
                        <!-- end: Items Row 2 fila de 4 --> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: Products --> 

<?php //banners rectangulares ?>
<?php echo $this->element('tienda/bannersrectangulares'); ?>
<?php //fin banners rectangulares ?>

<!-- Widgets -->
<div class="row clearfix f-space30"></div>
<div class="container">
    <div class="row"> 
        <!-- Sidebar -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-block sidebar">
            <div class="box-heading"><span>Best Seller</span></div>
            <!-- Best Sellers Products -->
            <div class="box-content">
                <div class="box-products slide carousel-fade" id="productc4">
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#productc4"></li>
                        <li class="" data-slide-to="1" data-target="#productc4"></li>
                        <li class="" data-slide-to="2" data-target="#productc4"></li>
                    </ol>
                    <div class="carousel-inner"> 
                        <!-- item -->
                        <div class="item active">
                            <div class="product-block">
                                <div class="image">
                                    <div class="product-label product-hot"><span>HOT</span></div>
                                    <a class="img" href="product.html"><img alt="product info" src="<?php echo $this->webroot; ?>img/tienda/products/product1.jpg" title="product title"></a> </div>
                                <div class="product-meta">
                                    <div class="name"><a href="product.html">Ladies Stylish Handbag</a></div>
                                    <div class="big-price"> <span class="price-new"><span class="sym">$</span>96</span> </div>
                                    <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="#">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to
                                            Cart</a> </div>
                                </div>
                                <div class="meta-back"></div>
                            </div>
                        </div>
                        <!-- end: item --> 
                        <!-- item -->
                        <div class="item">
                            <div class="product-block">
                                <div class="image"> <a class="img" href="product.html"><img alt="product info" src="<?php echo $this->webroot; ?>img/tienda/products/product2.jpg" title="product title"></a> </div>
                                <div class="product-meta">
                                    <div class="name"><a href="product.html">Strips Stylish Handbag</a></div>
                                    <div class="big-price"> <span class="price-new"><span class="sym">$</span>654.87</span> </div>
                                    <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="#">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to
                                            Cart</a> </div>
                                </div>
                                <div class="meta-back"></div>
                            </div>
                        </div>
                        <!-- end: item --> 
                        <!-- item -->
                        <div class="item">
                            <div class="product-block">
                                <div class="image"> <a class="img" href="product.html"> <img alt="product info" src="<?php echo $this->webroot; ?>img/tienda/products/product3.jpg" title="product title"></a> </div>
                                <div class="product-meta">
                                    <div class="name"><a href="product.html">Females Stylish Handbag</a></div>
                                    <div class="big-price"> <span class="price-new"><span class="sym">$</span>1600</span> </div>
                                    <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="#">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to
                                            Cart</a> </div>
                                </div>
                                <div class="meta-back"></div>
                            </div>
                        </div>
                        <!-- end: item --> 
                    </div>
                </div>
                <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc4"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc4"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                <div class="nav-bg"></div>
            </div>
            <!-- end: Best Sellers Products -->
            <div class="row clearfix f-space10"></div>
            <!-- Get Updates Box -->
            <div class="box-content">
                <div class="subscribe">
                    <div class="heading">
                        <h3>Get updates</h3>
                    </div>
                    <div class="formbox">
                        <form>
                            <i class="fa fa-envelope fa-fw"></i>
                            <input class="form-control" id="InputUserEmail" placeholder="Your e-mail..." type="text">
                            <button class="btn color1 normal pull-right" type="submit">Sign
                                up</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end: Get Updates Box --> 
        </div>
        <!-- end: Sidebar -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-8 blog-block"> 
                    <!-- Blog widget Box -->
                    <div class="box-content slide carousel-fade" id="blogslide">
                        <div class="carousel-inner"> 
                            <!-- Post -->
                            <div class="blog-entry item">
                                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                                        Blog entry</span> <img class="ani-image" src="<?php echo $this->webroot; ?>img/tienda/blog-4.jpg" alt="image info"> </div>
                                <div class="entry-row">
                                    <div class="date col-xs-12"><span>12</span><span>Aug 2013</span></div>
                                    <div class="blog-text"> <span>A decent blog title goes here...</span> <span>Appropriately supply high-quality intellectual capital after
                                            client-centered quality vectors. Collaboratively orchestrate end-to-end
                                            strategic theme areas after...</span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i>John Doe</a> <a href="#a"> <i class="fa fa-comments fa-fw"></i>4 Comments</a> </span> </div>
                                </div>
                            </div>
                            <!--END Post --> 
                            <!-- Post -->
                            <div class="blog-entry item">
                                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                                        Blog entry</span> <img class="ani-image" src="<?php echo $this->webroot; ?>img/tienda/blog-1.jpg" alt=""> </div>
                                <div class="entry-row">
                                    <div class="date col-xs-12"><span>27</span><span>Oct 2013</span></div>
                                    <div class="blog-text"> <span>Nulla quis lorem ut libero malesuada...</span> <span>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec
                                            rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada
                                            feugiat. Curabitur arcu erat, accumsan id imperdiet....</span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i>John Doe</a> <a href="#a"> <i class="fa fa-comments fa-fw"></i>2 Comments</a> </span> </div>
                                </div>
                            </div>
                            <!--END Post --> 
                            <!-- Post -->
                            <div class="blog-entry item active">
                                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                                        Blog entry</span> <img class="ani-image" src="<?php echo $this->webroot; ?>img/tienda/blog-2.jpg" alt=""> </div>
                                <div class="entry-row">
                                    <div class="date col-xs-12"><span>05</span><span>Feb 2013</span></div>
                                    <div class="blog-text"> <span>Convallis a pellentesque nec, egestas...</span> <span>Praesent sapien massa, convallis a pellentesque nec, egestas non
                                            nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at
                                            tellus. Sed porttitor lectus nibh....</span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i>John Doe</a> <a href="#a"> <i class="fa fa-comments fa-fw"></i>14 Comments</a> </span> </div>
                                </div>
                            </div>
                            <!--END Post --> 
                            <!-- Post -->
                            <div class="blog-entry item">
                                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                                        Blog entry</span> <img class="ani-image" src="<?php echo $this->webroot; ?>img/tienda/blog-3.jpg" alt=""> </div>
                                <div class="entry-row">
                                    <div class="date col-xs-12"><span>11</span><span>Jan 2013</span></div>
                                    <div class="blog-text"><span>Dynamically empower equity...</span> <span>Completely cultivate standardized internal or "organic" sources
                                            with unique total linkage. Dynamically empower equity invested e-markets
                                            without premier schemas....</span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i>John Doe</a> <a href="#a"> <i class="fa fa-comments fa-fw"></i>19 Comments</a> </span> </div>
                                </div>
                            </div>
                            <!--END Post --> 
                        </div>
                        <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#blogslide"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#blogslide"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    </div>
                    <!-- end: Blog widget Box -->
                    <div class="f-space10"></div>
                </div>
                <div class="col-md-4 twitter-block"> 
                    <!-- twitter widget box -->
                    <div class="box-content">
                        <div class="twitter-box"> <i class="fa fa-twitter fa-fw"></i>
                            <div class="title">Latest Tweets</div>
                            <div class="carousel-fade slide" id="tweets">
                                <div class="carousel-inner"> 
                                    <!-- tweet -->
                                    <div class="tweet item active"><span>RT: <em>@Interactively</em> implement unique e-business with dynamic benefits. Authoritatively target
                                            sustainable paradigms before strategic architectures. <b> http://goo.gl/4N8JN </b>- <em>@flatro</em> <br>
                                            <br>
                                            about 8 hours ago</span></div>
                                    <!-- end: tweet --> 
                                    <!-- tweet -->
                                    <div class="tweet item"><span>RT: <em>@Architectures</em> paradigms before strategic architectures implement unique e-business with
                                            dynamic benefits. Authoritatively target sustainable. <b> http://goo.gl/4N8JN </b>- <em>@flatro</em> <br>
                                            <br>
                                            about 2 hours ago</span></div>
                                    <!-- end: tweet --> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: twitter widget box -->
                    <div class="f-space10"></div>
                </div>
            </div>
            <div class="row"> 
                <!-- Brands -->
                <div class="col-md-12 main-column box-block brands-block">
                    <div class="box-heading"><span>Populer Brands</span></div>
                    <div class="box-content">
                        <div class="box-products box-brands slide" id="brands">
                            <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#brands"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#brands"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                            <div class="carousel-inner">
                                <div class="brands-row item active">
                                    <div class="brand-logo"><a href="#a"><img src="<?php echo $this->webroot; ?>images/brands/logo1.png" alt=""></a></div>
                                    <div class="brand-logo"><a href="#a"><img src="images/brands/logo2.png" alt=""></a></div>
                                    <div class="brand-logo"><a href="#a"><img src="images/brands/logo3.png" alt=""></a></div>
                                    <div class="brand-logo"><a href="#a"><img src="images/brands/logo1.png" alt=""></a></div>
                                </div>
                                <div class="brands-row item">
                                    <div class="brand-logo"><a href="#a"><img src="images/brands/logo3.png" alt=""></a></div>
                                    <div class="brand-logo"><a href="#a"><img src="images/brands/logo2.png" alt=""></a></div>
                                    <div class="brand-logo"><a href="#a"><img src="images/brands/logo1.png" alt=""></a></div>
                                    <div class="brand-logo"><a href="#a"><img src="images/brands/logo3.png" alt=""></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: Brands --> 
        </div>
    </div>
</div>
<!-- end: Widgets -->
<div class="row clearfix f-space30"></div>