<?php
App::import('Model', 'Imagene');
$modeloImagenes = new Imagene();
?>
<?php $rol = $this->Session->read('Auth.User.role'); ?>
<?php $idUsuario = $this->Session->read('Auth.User.id'); ?>
<!-- end: Shop Page title -->
<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 box-block">
      <div class="box-heading category-heading"><span>Showing products </span>
      </div>
      <div class="row clearfix f-space20"></div>
      <div class="box-content">
        <div class="box-products"> 
          <!-- Products Row -->

          <!-- Product -->
          <?php //debug($data); ?>
          <?php $c = 1; ?>

          <?php foreach ($data as $d): ?>            
            <?php //echo $d['Producto']['numero']; ?>
            <?php if (fmod($c, 3) == 0): ?>
              <div class="row box-product"> 
                <!-- Product -->           
                <?php $idProducto = $d['Producto']['id'] ?>
                <?php if (!empty($idProducto)): ?>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                        <div class="name"><a href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><?php echo $d['Producto']['nombre']; ?></a></div>
                        <div class="big-price">
                          <?php if ($rol == 'visitante'): ?>
                            <span class="price-new">
                              <span class="sym">$</span><?php echo $d['Producto']['precio']; ?>
                            </span> 
                          <?php else: ?>
                            <span class="price-new">
                              <span class="sym">$</span>
                            </span> 
                          <?php endif; ?>
                        </div>
                        <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to Cart</a> </div>
                        <div class="small-price"> 
                          <?php if ($rol == 'visitante'): ?>
                            <span class="price-new">
                              <span class="sym">$</span><?php echo $d['Producto']['precio']; ?>
                            </span> 
                          <?php else: ?>
                            <span class="price-new">
                              <span class="sym">$</span>
                            </span>
                          <?php endif; ?>
                        </div>
                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
                        <div class="small-btns">                                                    
                          <?php if ($rol == 'visitante'): ?>
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

              </div>
              <div class="clearfix f-space30"></div>
            <?php else: ?>

              <!-- Product -->           
              <?php $idProducto = $d['Producto']['id'] ?>
              <?php if (!empty($idProducto)): ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                      <div class="name"><a href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>"><?php echo $d['Producto']['nombre']; ?></a></div>
                      <div class="big-price">
                        <?php if ($rol == 'visitante'): ?>
                          <span class="price-new">
                            <span class="sym">$</span><?php echo $d['Producto']['precio']; ?>
                          </span> 
                        <?php else: ?>
                          <span class="price-new">
                            <span class="sym">$</span>
                          </span> 
                        <?php endif; ?>
                      </div>
                      <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="<?php echo $this->Html->url(array('action' => 'detalle', $idProducto)); ?>">View</a> <a class="btn btn-default btn-addtocart pull-right" href="#">Add to Cart</a> </div>
                      <div class="small-price"> 
                        <?php if ($rol == 'visitante'): ?>
                          <span class="price-new">
                            <span class="sym">$</span><?php echo $d['Producto']['precio']; ?>
                          </span> 
                        <?php else: ?>
                          <span class="price-new">
                            <span class="sym">$</span>
                          </span>
                        <?php endif; ?>
                      </div>
                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
                      <div class="small-btns">                                                    
                        <?php if ($rol == 'visitante'): ?>
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

            <?php endif; ?>
            <?php $c++; ?>
          <?php endforeach; ?>                             
          <!-- end: Products Row -->
              
        </div>
      </div>
      <div class="box-heading category-heading" align="center">
        <span>
        <?php //echo $this->Paginator->numbers(); ?>
        <?php 
          echo $this->Paginator->prev(
            ' << ' . __('previous'),
            array(),
            null,
            array('class' => 'prev disabled')
          );
          echo $this->Paginator->next(
            ' >> ' . __('next'),
            array(),
            null,
            array('class' => 'prev disabled')
          );
        ?>  
        </span>
      </div>
      
      <div class="clearfix f-space30"></div>

    </div>

    <!-- side bar -->
    <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
      <!-- Filter by -->

      <!-- end: Filter by -->

    </div>
    <!-- Productos Especiales -->
    <?php echo $this->element('tienda/especiales'); ?>
    <!-- fin especiales -->


  </div>
  <!-- end:sidebar --> 
</div>
<!-- end:row --> 
</div>
<!-- end: container-->