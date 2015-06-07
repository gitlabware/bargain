<?php
    App::import('Model', 'Categoria');
    $modeloCategoria = new Categoria();
    $categorias = $modeloCategoria->find('all', array(
        'recursive'=>-1,
        'order'=>'Categoria.orden ASC'
    ));
    //debug($categorias);
?>
<?php $urlBase = $this->request->here; ?>
<?php //debug($urlBase);die; ?>
<?php if($urlBase == '/' || $urlBase == '/productos/tienda'): ?>
    <div class="menu3dmega vertical" id="menuMega">
<?php else: ?>
    <div class="menu3dmega vertical menuMegasub" id="menuMega">
<?php endif; ?>    
    <ul>
        <!-- Menu Item Links for Mobiles Only -->
        <li class="visible-xs"> <a href="index.html"> <i class="fa fa-home"></i> <span>Home</span> <i class="fa fa-angle-right"></i> </a>
            <div class="dropdown-menu flyout-menu"> 
                <!-- Sub Menu -->
                <ul>
                    <li><a href="about.html">About us</a></li>
                    <!--<li><a href="blog.html">Blog</a></li>-->
                    <li> <a href="#a"><span>Account</span> <i class="fa fa-caret-right"></i> </a>
                        <ul class="dropdown-menu sub flyout-menu">
                            <li><a href="#a">Login/Register</a></li>
                            <li><a href="#a">My Orders</a></li>
                            <li><a href="#a">Wish list</a></li>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </li>
                    <li> <a href="#a"><span>Product</span> <i class="fa fa-caret-right"></i> </a>
                        <ul class="dropdown-menu sub flyout-menu">
                            <li><a href="category-grid.html">Category Grid</a></li>
                            <li><a href="category-list.html">Category List</a></li>
                            <li><a href="product.html">Product Page</a> </li>
                        </ul>
                    </li>
                    <li><a href="cart.html">Shoping Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="blog-single.html">Blog Post</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                </ul>
                <!-- end: Sub Menu --> 
            </div>
        </li>
        <!-- end: Menu Item --> 
        <?php foreach($categorias as $c): ?>
        <!-- Menu Item -->
        <li> <a href="<?php echo $this->Html->url(array('controller'=>'productos', 'action'=>'categorias', $c['Categoria']['id'])); ?>"> <i class="fa fa-arrow-circle-o-right"></i> <span><?php echo $c['Categoria']['nombre']; ?></span></a> </li>
        <!-- end: Menu Item -->         
        <?php endforeach; ?>
    </ul>
</div>  