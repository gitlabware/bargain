<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Imagenes del Producto
                <?php 
                    //debug($datosProducto); 
                    $idProducto = $datosProducto['Producto']['id'];
                    $nombreProducto = $datosProducto['Producto']['nombre'];                    
                ?>
                <b><?php echo $nombreProducto; ?></b>
            </header>
            <div class="panel-body">
                <div class=" form">
                    <!--<form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#">-->
                    <?php echo $this->Form->create('Imagen', array('class' => 'cmxform form-horizontal tasi-form', 'id' => 'commentForm', 'enctype' => 'multipart/form-data')); ?>                   
                    
                    <?php for($i=0; $i<=2; $i++): ?>
                    <?php $j = $i; ?>
                    <?php echo $this->Form->hidden("Imagen.$i.producto_id", array('value'=>$idProducto));?>
                    <?php echo $this->Form->hidden("Imagen.$i.numero", array('value'=>++$j));?>
                    <div class="form-group">
                        <label for="data[Imagen][<?php echo $i; ?>][imagen]" class="control-label col-lg-2">Imagen <?php echo $j; ?></label>
                        <div class="col-lg-10">
                            <input type="file" id="exampleInputFile" name="data[Imagen][<?php echo $i; ?>][imagen]" accept="image/*|video/*">
                            <p class="help-block">Imagenes formato *.jpg, *.png, *.gif. (alto 962, ancho 955)</p>
                        </div>
                    </div>
                    <?php endfor; ?>                   

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-danger" type="submit">Guardar Imagenes</button>
                            <button class="btn btn-default" type="reset">Limpiar Formulario</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/ckeditor/ckeditor.js"></script>
<!--script for this page-->
<script src="<?php echo $this->webroot; ?>js/form-component.js"></script>