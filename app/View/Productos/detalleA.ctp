<?php
App::import('Model', 'Imagene');
$modeloImagenes = new Imagene();
?>
<?php $rol = $this->Session->read('Auth.User.role'); ?>
<?php $idUsuario = $this->Session->read('Auth.User.id'); ?>
<div class="row clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb"> <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'tienda')); ?>"> <i class="fa fa-home fa-fw"></i> Inicio </a> <i class="fa fa-angle-right fa-fw"></i> <a href="product.html"> <?php echo $datosProducto['Categoria']['nombre']; ?> </a> </div>

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
    <!-- row -->
    <div class="row">
        <div class="col-md-12 box-block"> 

            <!--  box content -->

            <div class="box-content"> 
                <!-- single product -->
                <div class="single-product"> 
                    <!-- Images -->
                    <div class="images col-md-6 col-sm-12 col-xs-12">
                        <div class="row"> 
                            <?php
                            $idProducto = $datosProducto['Producto']['id'];
                            $imagenesProducto = $modeloImagenes->find('all', array(
                                'recursive' => -1,
                                'conditions' => array('Imagene.producto_id' => $idProducto)
                            ));
                            //debug($imagenesProducto);
                            ?>
                            <!-- Small Images -->
                            <div class="thumbs col-md-3 col-sm-3 col-xs-3"  id="thumbs">
                                <ul>
                                    <?php foreach ($imagenesProducto as $ip): ?>                                        
                                        <li class=""> <a href="#a" data-image="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" data-zoom-image="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>"  class="elevatezoom-gallery" > <img src="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" alt="small image" /></a></li>                                                                                    
                                    <?php endforeach; ?>                                    
                                </ul>
                            </div>
                            <!-- end: Small Images --> 
                            <!-- Big Image and Zoom -->
                            <?php foreach ($imagenesProducto as $ip): ?>
                                <?php if ($ip['Imagene']['numero'] == 1): ?>
                                    <div class="big-image col-md-9 col-sm-9 col-xs-9"> <img id="product-image" src="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" data-zoom-image="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" alt="big image" /> </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <!-- end: Big Image and Zoom --> 
                        </div>
                    </div>

                    <!-- end: Images --> 

                    <!-- product details -->

                    <div class="product-details col-md-6 col-sm-12 col-xs-12"> 

                        <!-- Title and rating info -->
                        <div class="title">
                            <h1><?php echo $datosProducto['Producto']['nombre']; ?></h1>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> <span>Este producto ha tenido 30 comentario(s) <a href="#a">Comentar</a></span> </div>
                        </div>
                        <!-- end: Title and rating info -->

                        <div class="row"> 
                            <!-- Availability, Product Code, Brand and short info -->
                            <div class="short-info-wr col-md-12 col-sm-12 col-xs-12">
                                <div class="short-info">
                                    <div class="product-attr-text">Disponibilidad: <span class="available">En Stock</span></div>
                                    <div class="product-attr-text">Codigo Producto: <span>8368596003</span></div>
                                    <div class="product-attr-text">Marca: <span>Polo</span></div>
                                    <p class="short-info-p"> <?php echo $datosProducto['Producto']['resumen']; ?> </p>
                                </div>
                            </div>
                            <!-- end: Availability, Product Code, Brand and short info --> 

                        </div>

                        <div class="row">
                            <div class="price-wr col-md-4 col-sm-4 col-xs-12">
                                <div class="big-price">
                                    <?php if ($rol == 'visitante'): ?> 
                                        <span class="price-new">
                                            <span class="sym">$</span><?php echo $datosProducto['Producto']['precio']; ?></span> 
                                    <?php else: ?>
                                        <span class="price-new">
                                            <span class="sym"></span>
                                        </span> 
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="product-btns-wr col-md-8 col-sm-8 col-xs-12">
                                <div class="product-btns">
                                    <div class="product-big-btns">
                                        <?php if ($rol == 'visitante'): ?>
                                            <button class="btn btn-addtocart" id="btnCart2_<?php echo $idProducto; ?>"> <i class="fa fa-shopping-cart fa-fw"></i> Add to Cart </button>
                                            <button class="btn btn-compare" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                                            <button class="btn btn-wishlist" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>
                                            <button class="btn btn-sendtofriend" data-toggle="tooltip" title="Send to Friend"> <i class="fa fa-envelope fa-fw"></i> </button>
                                            <script type="text/javascript">

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
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end: product details --> 

                </div>

                <!-- end: single product --> 

            </div>

            <!-- end: box content --> 

        </div>
    </div>
    <!-- end:row --> 
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>

<!-- container -->
<div class="container"> 
    <!-- row -->
    <div class="row"> 
        <!-- tabs -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-column box-block product-details-tabs"> 

            <!-- Details Info/Reviews/Tags --> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs blog-tabs nav-justified">
                <li class="active"><a href="#details-info" data-toggle="tab"><i class="fa  fa-th-list fa-fw"></i> Detalles</a></li>
                <li><a href="#reviews" data-toggle="tab"><i class="fa fa-comments fa-fw"></i> Comentarios</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="details-info">
                    <?php echo $datosProducto['Producto']['descripcion']; ?>
                </div>
                <div class="tab-pane" id="reviews">
                    <div class="heading"> <span><strong>"Ladies Stylish Handbag"</strong> has 30 review(s)</span>
                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
                        <a href="#wr" class="btn color1 normal">Add Review</a> </div>
                    <div class="review">
                        <div class="review-info">
                            <div class="name"><i class="fa fa-comment-o fa-flip-horizontal fa-fw"></i> Fida Khattak</div>
                            <div class="date"> on <em>Aug 15, 2013</em></div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
                        </div>
                        <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</div>
                    </div>
                    <div class="review">
                        <div class="review-info">
                            <div class="name"><i class="fa fa-comment-o fa-flip-horizontal fa-fw"></i> Fida Khattak</div>
                            <div class="date"> on <em>Aug 15, 2013</em></div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
                        </div>
                        <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</div>
                    </div>
                    <span class="pull-left">Showing 1 to 2 of 123 (4 Pages)</span>
                    <div class="pull-right">
                        <ul class="pagination pagination-xs">
                            <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li  class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="write-reivew" id="#write-review">
                        <h3>Write a reivew</h3>
                        <div class="fr-border"></div>

                        <!-- Form -->
                        <form action="#self" id="review_form" method="post">
                            <div class="row">
                                <div class="col-md-4 col-xs-12"> <a name="wr"> </a>
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rating" value="5" />
                                        <label for="star5" title="Rocks!" class="fa fa-star">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label for="star4" title="Pretty good" class="fa fa-star">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label for="star3" title="Cool" class="fa fa-star">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label for="star2" title="Kinda bad" class="fa fa-star">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label for="star1" title="Oops!" class="fa fa-star">1 star</label>
                                    </fieldset>
                                    <input type="text" id="name" placeholder="Name">
                                    <input type="text" id="email" placeholder="E-mail">
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <textarea name="" id="review" placeholder="Review" rows="8"></textarea>
                                </div>
                            </div>
                            <button class="btn normal color1 pull-right">Submit</button>
                        </form>
                        <!-- end: Form --> 
                    </div>
                </div>
            </div>
            <!-- end: Tab panes --> 
            <!-- end: Details Info/Reviews/Tags -->
            <div class="clearfix f-space30"></div>
        </div>
        <!-- end: tabs --> 

        <!-- Productos Especiales -->
        <?php echo $this->element('tienda/especiales'); ?>
        <!-- fin especiales -->
        <!-- end: sidebar --> 
    </div>
    <!-- row --> 
</div>
<!-- end: container --> 
</p>
<!-- Relate Products -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column box-block">
            <div class="box-heading"><span>Related Products</span></div>
            <div class="box-content">
                <div class="box-products slide" id="productc3">
                    <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc3"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc3"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                    <div class="carousel-inner"> 
                        <!-- Items Row -->
                        <div class="item active">
                            <div class="row box-product"> 
                                <!-- Product -->
                                <?php for ($i = 0; $i <= 3; $i++): ?>
                                    <?php $idProducto = $productosCategoria[$i]['Producto']['id'] ?>
                                    <?php if (!empty($idProducto)): ?>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="product-block">
                                                <div class="image">
                                                    <div class="product-label product-sale"><span>SALE</span></div>
                                                    <?php
                                                    $imagenesProducto = $modeloImagenes->find('all', array(
                                                        'recursive' => -1,
                                                        'conditions' => array('Imagene.producto_id' => $idProducto)
                                                    ));
                                                    ?>
                                                    <?php foreach ($imagenesProducto as $ip): ?>
                                                        <?php if ($ip['Imagene']['numero'] == 1): ?>
                                                            <a class="img" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><img alt="product info" src="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" title="product title"></a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <div class="product-meta">
                                                    <div class="name"><?php echo $productosCategoria[$i]['Producto']['nombre']; ?></div>
                                                    <div class="big-price">
                                                        <?php if ($rol == 'visitante'): ?>
                                                            <span class="price-new">
                                                                <span class="sym">$</span><?php echo $productosCategoria[$i]['Producto']['precio']; ?>
                                                            </span> 
                                                        <?php else: ?>
                                                            <span class="price-new">
                                                                <span class="sym">$</span>
                                                            </span> 
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to Cart</a>
                                                    </div>
                                                    <div class="small-price"> 
                                                        <?php if ($rol == 'visitante'): ?>
                                                            <span class="price-new">
                                                                <span class="sym">$</span><?php echo $productosCategoria[$i]['Producto']['precio']; ?>
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
                                                                        //opacity: 0.5,
                                                                        height: "toggle",
                                                                        //opacity: "toggle"
                                                                    }, {
                                                                        duration: "slow"
                                                                    })
                                                                });
                                                            </script>
                                                        <?php else: ?>
                                                            <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                            <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-heart fa-fw"></i> </button>
                                                            <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="meta-back"></div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <!-- end: Product --> 
                            </div>
                        </div>
                        <!-- end: Items Row --> 
                        <!-- Items Row -->
                        <div class="item">
                            <div class="row box-product"> 
                                <!-- Product -->
                                <?php for ($i = 4; $i <= 6; $i++): ?>
                                    <?php $idProducto = $productosCategoria[$i]['Producto']['id'] ?>
                                    <?php if (!empty($idProducto)): ?>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="product-block">
                                                <div class="image">
                                                    <div class="product-label product-sale"><span>SALE</span></div>
                                                    <?php
                                                    $imagenesProducto = $modeloImagenes->find('all', array(
                                                        'recursive' => -1,
                                                        'conditions' => array('Imagene.producto_id' => $idProducto)
                                                    ));
                                                    ?>
                                                    <?php foreach ($imagenesProducto as $ip): ?>
                                                        <?php if ($ip['Imagene']['numero'] == 1): ?>
                                                            <a class="img" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><img alt="product info" src="<?php echo $this->webroot; ?>files/img/<?php echo $ip['Imagene']['imagen']; ?>" title="product title"></a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <div class="product-meta">
                                                    <div class="name"><?php echo $productosCategoria[$i]['Producto']['nombre']; ?></div>
                                                    <div class="big-price">
                                                        <?php if ($rol == 'visitante'): ?>
                                                            <span class="price-new">
                                                                <span class="sym">$</span><?php echo $productosCategoria[$i]['Producto']['precio']; ?>
                                                            </span> 
                                                        <?php else: ?>
                                                            <span class="price-new">
                                                                <span class="sym"></span>
                                                            </span> 
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="big-btns"> 
                                                        <a class="btn btn-default btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> 
                                                        <a class="btn btn-default btn-addtocart pull-right" href="#">Add to Cart</a>
                                                    </div>
                                                    <div class="small-price"> 
                                                        <?php if ($rol == 'visitante'): ?>
                                                            <span class="price-new">
                                                                <span class="sym">$</span><?php echo $productosCategoria[$i]['Producto']['precio']; ?>
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
                                                            <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-retweet fa-fw"></i> </button>
                                                            <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-heart fa-fw"></i> </button>
                                                            <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Registrate para estas opciones"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="meta-back"></div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <!-- end: Product --> 
                            </div>
                        </div>
                        <!-- end: Items Row --> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end: Related products -->

<div class="row clearfix f-space30"></div>

<!-- Rectangle Banners -->

<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner blue">
                <div class="banner"> <i class="fa fa-thumbs-up"></i>
                    <h3>Guarantee</h3>
                    <p>100% Money Back Guarantee*</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner red">
                <div class="banner"> <i class="fa fa-tags"></i>
                    <h3>Affordable</h3>
                    <p>Convenient & affordable prices for you</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner orange">
                <div class="banner"> <i class="fa fa-headphones"></i>
                    <h3>24/7 Support</h3>
                    <p>We support everything we sell</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner lightblue">
                <div class="banner"> <i class="fa fa-female"></i>
                    <h3>Summer Sale</h3>
                    <p>Upto 50% off on all women wear</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner darkblue">
                <div class="banner"> <i class="fa fa-gift"></i>
                    <h3>Surprise Gift</h3>
                    <p>Value $50 on orders over $700</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
            <div class="rec-banner black">
                <div class="banner"> <i class="fa fa-truck"></i>
                    <h3>Free Shipping</h3>
                    <p>All over in world over $100</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: Rectangle Banners -->

<div class="row clearfix f-space30"></div>

<script src="<?php echo $this->webroot; ?>js/tienda/jquery.elevatezoom.js" type="text/javascript"></script> 
<script>

                                                                (function($) {
                                                                    "use strict";
                                                                    //Mega Menu
                                                                    $('#menuMega').menu3d();

                                                                    //Help/Contact Number/Quick Message
                                                                    $('.quickbox').carousel({
                                                                        interval: 10000
                                                                    });

                                                                    //SPECIALS
                                                                    $('#productc2').carousel({
                                                                        interval: 4000
                                                                    });
                                                                    //RELATED PRODUCTS
                                                                    $('#productc3').carousel({
                                                                        interval: 4000
                                                                    });

                                                                    //Zoom Product
                                                                    $("#product-image").elevateZoom({
                                                                        zoomType: "inner",
                                                                        cursor: "crosshair",
                                                                        easing: true,
                                                                        gallery: "thumbs",
                                                                        galleryActiveClass: "active",
                                                                        loadingIcon: true
                                                                    });
                                                                    $("#product-image").bind("click", function(e) {
                                                                        var ez = $('#product-image').data('elevateZoom');
                                                                        ez.closeAll(); //NEW: This function force hides the lens, tint and window	
                                                                        //$.fancybox(ez.getGalleryList());     
                                                                        return false;
                                                                    });
                                                                })(jQuery);

</script>