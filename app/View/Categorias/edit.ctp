<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Formulario para Editar la Categoria
            </header>
            <div class="panel-body">
                <div class=" form">
                    <!--<form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#">-->
                    <?php echo $this->Form->create('Categoria', array('class' => 'cmxform form-horizontal tasi-form', 'id' => 'commentForm')); ?>
                    <div class="form-group ">
                        <label for="data[Categoria][nombre]" class="control-label col-lg-2">Nombre (*)</label>
                        <div class="col-lg-10">
                            <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'minlength' => 2, 'required')); ?>                                
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="data[Categoria][descripcion]" class="control-label col-lg-2">Contenido (*)</label>
                        <div class="col-lg-10">
                            <?php echo $this->Form->text('descripcion', array('class' => 'form-control', 'minlength' => 2)); ?>                                              
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-danger" type="submit">Editar Categoria</button>
                            <button class="btn btn-default" type="button">Cancelar</button>
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