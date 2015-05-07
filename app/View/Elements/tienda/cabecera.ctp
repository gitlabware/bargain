<style>
    /*    popup*/
    #element_to_pop_up {
        background-color:#fff;
        box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.298);
        /*border-radius:5px;*/
        color:#000;
        display:none;
        padding:2px;
        min-width:100px;
        min-height: 180px;
    }
    .b-close{
        cursor:pointer;
        position:absolute;
        right:10px;
        top:5px;

        box-shadow: none;
        font: bold 131% sans-serif;     
        position: absolute;
        right: 2px;
        top: 2px;

        background-color: #494A83;     
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.3);
        color: #FFFFFF;        
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
    }
    #titulo{
        font-size: 20px; 
        padding-top: 10px;
        padding-left: 5px;
        text-align: left;        
        height: 44px;
        color: #fff;
        background-color: #007788; 
    }

    #contenido{        
        padding-top: 10px;
        padding-left: 5px;
        padding-right: 5px;
        text-align: left;                            
    }
</style>
<?php $rol = $this->Session->read('Auth.User.role'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="topheadrow">
                <ul class="nav nav-pills pull-left">
                    <li> <a href="#a"> <i class="fa fa-hand-o-right fa-fw"></i> <span class="hidden-xs"> <?php echo $this->Session->flash(); ?></span></a> </li>
                </ul>
                <ul class="nav nav-pills pull-right">
<!--                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a">ENG <i class="fa fa-angle-down fa-fw"></i> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#a">ENG</a></li>
                            <li><a href="#a">JPN</a></li>
                            <li><a href="#a">CHI</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a">USD <i class="fa fa-angle-down fa-fw"></i> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#a">USD</a></li>
                            <li><a href="#a">PKR</a></li>
                            <li><a href="#a">JPY</a></li>
                        </ul>
                    </li>-->
                    <?php if ($rol == 'visitante'): ?>
                    <li> <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'carrito')); ?>"> <i class="fa fa-shopping-cart fa-fw"></i> <span class="hidden-xs">My Cart</span></a> </li>
                    <li> <a href="<?php echo $this->Html->url(array('controller'=>'Pedidos', 'action'=>'misordenes')); ?>"> <i class="fa fa-list-alt fa-fw"></i> <span class="hidden-xs">My Orders</span></a> </li>                                        
                        <li class="dropdown"> <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs"> Welcome: <?php echo $this->Session->read('Auth.User.nombre'); ?></span></a>                                                                                   
                        </li>
                        <li> <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'salir')); ?>"> <i class="fa fa-arrow-right fa-fw"></i> <span class="hidden-xs">Exit</span></a> </li>
                    <?php else: ?>
                        <li class="dropdown"> <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <i class="fa fa-user fa-fw"></i> <span class="hidden-xs"> Login</span></a>
                            <div class="loginbox dropdown-menu"> <span class="form-header">Login</span>
                                <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'ingresa'))); ?>
                                <div class="form-group"> <i class="fa fa-user fa-fw"></i>
                                    <input name="data[User][username]" class="form-control" id="InputUserName" placeholder="Email" type="text" data-validation="required">
                                </div>
                                <div class="form-group"> <i class="fa fa-lock fa-fw"></i>
                                    <input name="data[User][password]" class="form-control" id="InputPassword" placeholder="Password" type="password" data-validation="required">
                                </div>
                                <button class="btn medium color1 pull-left" type="submit">Login</button>
                                <button class="btn medium color2 pull-right" type="button" id="btRegistro">Register</button>
                                </form>
                            </div>
                        </li>                        
                    <?php endif; ?>                         
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="element_to_pop_up">
    <span class="button b-close">
        <span>X</span>
    </span>
    <div id="titulo">FORM NEW ACOUNT</div>
    <div id="contenido">   

        <div id="carga">

            <?php //echo $this->Form->create('User', array('url'=>array('controller'=>'users', 'action'=>'registro'))); ?>           
            <?php
            echo $this->Ajax->form(array('type' => 'post',
                'options' => array(
                    'model' => 'User',
                    'update' => 'carga',
                    'before' => $this->Js->get('#sending')->effect('fadeIn'),
                    'success' => $this->Js->get('#sending')->effect('fadeOut'),
                    'url' => array(
                        'controller' => 'users',
                        'action' => 'registro'
                    ),
                )
            ));
            ?>        
            <div class="row">
                <div class="col-md-12">              
                    <?php echo $this->Form->text('nombre', array('class' => 'input4', 'placeholder' => 'Name(*)', 'required')); ?>              
                    <input type="text" name="data[User][telefono]" placeholder='Cellphone(*)' required class="input4">  
                    <input type="text" name="data[User][direccion]" placeholder='Adreess' required class="input4">  
                    <?php //echo $this->Form->text('correo', array('class'=>'input4', 'placeholder'=>'Correo', 'required'));  ?>              
                    <input type="email" name="data[User][email]" placeholder='Email(*)' required class="input4">  
                    <input type="password" name="data[User][password]" placeholder='Password(*)' required class="input4">
                    <?php //echo $this->Form->password('pass', array('class' => 'input4', 'placeholder' => 'Password', 'required')); ?>              
                </div>            
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    /* echo $this->Js->submit('Save', array(
                      'url'=>array('controller'=>'users', 'action'=>'registro'),
                      //'confirm'=>'esta confirmado',
                      //'before'=>$this->Js->get('#sending')->effect('fadeIn'),
                      'success'=>$this->Js->get('#sending')->effect('fadeOut'),
                      'update' => '#carga',
                      'div' => false,
                      'type' => 'json',
                      'async' => false
                      )); */
                    ?>  
                    <div id="sending" style="display: none; background-color: lightgreen;">Send...</div>
                    <button class="btn large color2 pull-right" type="submit">Register</button>
                    <?php //echo $this->Form->end('registrar');  ?>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#btRegistro').click(function() {
        //console.log('click');
        $('#element_to_pop_up').bPopup();
    });
</script>
<?php
//echo $this->Js->writeBuffer(); ?>