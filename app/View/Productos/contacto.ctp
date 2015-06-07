<!-- Google Maps --> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script> 
<script type="text/javascript" src="<?php echo $this->webroot; ?>js/tienda/gmap3.js"></script> 

<div class="row clearfix"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="breadcrumb"> <a href="index.html"> <i class="fa fa-home fa-fw"></i> Home </a> <i class="fa fa-angle-right fa-fw"></i> <a href="Contact-2.html"> Contact </a></div>
      
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
<!-- Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>Get in touch</h2>
      </div>
    </div>
  </div>
</div>
<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block">
      <div id="map" class="map"></div>
      <div class="clearfix f-space30"></div>
      <div class="contactform">
        <h2 class="title">Contact Form</h2>
        <p>Vestibulum congue sollicitudin neque, placerat lobortis enim facilisis sed. Etiam interdum dignissim sem id luctus. Sed nunc lectus, 
          ornare quis interdum eu, auctor sit amet lorem. Quisque condimentum orci.</p>
        <form>
          <div class="row">
            <div class="col-md-5">
              <input class="input4" id="name" value="" placeholder="Name*" data-validation="required">
              <input class="input4" id="email" value="" placeholder="Email*" data-validation="email">
              <input class="input4" id="subject" value="" placeholder="Subject">
            </div>
            <div class="col-md-7">
              <textarea class="input4" name="message" id="message" rows="8" cols="60" placeholder="Message" data-validation="required"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button class="btn large color2 pull-right" type="submit">Send now</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- side bar -->
    <div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
      <div class="box-heading"><span>Contact Details</span></div>
      <!-- Contact Details -->
      <div class="box-content contactdetails-box-wr">
        <div class="contactdetails-box"> <span class="icon"><i class="fa fa-map-marker fa-fw"></i></span>
          <div class="details">
            <h1>Logoby.us</h1>
            1234 Street,<br/>
            Collage Road, Islamabad, <br/>
            PK 46000</div>
        </div>
        <div class="contactdetails-box"> <span class="icon"><i class="fa fa-phone fa-fw"></i></span> <span class="details">Phone: 92 300 9712255 <br/>
          Fax:  92 300 9716116</span> </div>
        <div class="contactdetails-box"> <span class="icon"><i class="fa fa-envelope fa-fw"></i></span> <span class="details">Email: themes@logoby.us <br/>
          Website: www.logoby.us</span> </div>
      </div>
      
      <!-- end: Contact Details -->
      
      <div class="clearfix f-space30"></div>
      <div class="box-heading"><span>Best Sellers</span></div>
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
                  <a class="img" href="product.html"><img alt="product info" src="images/products/product1.jpg" title="product title"></a> </div>
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
                <div class="image"> <a class="img" href="product.html"><img alt="product info" src="images/products/product2.jpg" title="product title"></a> </div>
                <div class="product-meta">
                  <div class="name"><a href="product.html">Ladies Stylish Handbag</a></div>
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
                <div class="image"> <a class="img" href="product.html"><img alt="product info" src="images/products/product3.jpg" title="product title"></a> </div>
                <div class="product-meta">
                  <div class="name"><a href="product.html">Ladies Stylish Handbag</a></div>
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
      
    </div>
    <!-- end:sidebar --> 
  </div>
  <!-- end:row --> 
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>
<script>

(function($) {
  "use strict";
 $('#menuMega').menu3d();
 //Google Maps Configuration
			var lat="33.71815";
			var lon="73.06055";
			$('#map').gmap3({
			map:{
			options:{
			 center: [lat, lon],
			 zoom: 14
			}
			},
			marker:{
			latLng: [lat, lon]
			}
			});
			
			 //Help/Contact Number/Quick Message
			$('.quickbox').carousel({
				interval: 10000
			});
			
			//Best Sellers
			$('#productc4').carousel({
				interval: 4000
			});           
				
})(jQuery);


          
        </script>