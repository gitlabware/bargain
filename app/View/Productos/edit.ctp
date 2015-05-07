<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Formulario para Editar el Producto
            </header>
            <div class="panel-body">
                <div class=" form">
                    <!--<form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#">-->
                    <?php echo $this->Form->create('Producto', array('class' => 'cmxform form-horizontal tasi-form', 'id' => 'commentForm')); ?>
                    <div class="form-group ">
                        <label for="data[Producto][nombre]" class="control-label col-lg-2">Nombre (*)</label>
                        <div class="col-lg-10">
                            <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'minlength' => 2, 'required')); ?>                                
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="categoria" class="control-label col-lg-2"> SKU</label>                            
                        <div class="col-lg-3">
                            <?php echo $this->Form->text('sku', array('class' => 'form-control', 'minlength' => 2)); ?>                                
                        </div>                        
                    </div>
                    
                    <div class="form-group ">
                        <label for="cemail" class="control-label col-lg-2">Resumen</label>
                        <div class="col-lg-10">
                            <?php echo $this->Form->textarea('resumen', array('class' => 'form-control', 'rows' => 2, 'required')); ?>                                              
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="control-label col-lg-2">Descripcion Larga</label>
                        <div class="col-lg-10">
                            <?php echo $this->Form->textarea('descripcion', array('class' => 'form-control ckeditor', 'rows' => 2)); ?>                                              
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="curl" class="control-label col-lg-2">Precio</label>
                        <div class="col-lg-2">
                            <input type="number" class="form-control" id="curl" name="data[Producto][precio]" value="<?php echo $this->request->data['Producto']['precio']; ?>" required step="any" />
                        </div>      

                        <label for="curl" class="control-label col-lg-2"> Estado</label>
                        <div class="checkboxes">
                            <!--<label class="label_check" for="checkbox-01"></label>-->
                            <?php
                                $estado = $this->request->data['Producto']['estado'];
                                //debug($estado);
                                if($estado == 2):
                            ?>
                            <input name="data[Producto][especial]" id="checkbox-01" value="1" type="checkbox" checked="checked" /> Especial.
                            <?php else: ?>
                            <input name="data[Producto][especial]" id="checkbox-01" value="1" type="checkbox" /> Especial.
                            <?php endif; ?>
                        </div>  
                    </div>  

                    <div class="form-group ">

                        <label for="categoria" class="control-label col-lg-2"> Categoria</label>                            

                        <div class="col-lg-3">
                            <?php echo $this->Form->select('categoria_id', $dcc, array('class' => 'form-control m-bot15', 'required')) ?>                               
                        </div>

                        <label for="marca" class="control-label col-lg-2">Marca</label>                            

                        <div class="col-lg-3">
                            <?php echo $this->Form->select('marca_id', $dcm, array('class' => 'form-control m-bot15')) ?>                               
                        </div>
                    </div>                                        

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-danger" type="submit">Editar Producto</button>                           
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/ckeditor/ckeditor.js"></script>

<!--custom checkbox & radio-->
<script type="text/javascript" src="<?php echo $this->webroot; ?>js/ga.js"></script>
<!--script for this page-->
<script src="<?php echo $this->webroot; ?>js/form-component.js"></script>