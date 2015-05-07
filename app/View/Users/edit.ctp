<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Nuevo Usuario
            </header>
            <div class="panel-body">
                <div class=" form">
                    <!--<form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="#">-->
                    <?php echo $this->Form->create('User', array('class' => 'cmxform form-horizontal tasi-form', 'id' => 'commentForm')); ?>
                    <div class="form-group ">
                        <label for="data[User][username]" class="control-label col-lg-2">Usuario (*)</label>
                        <div class="col-lg-10">
                            <?php echo $this->Form->text('username', array('class' => 'form-control', 'minlength' => 2, 'required')); ?>                                
                        </div>
                    </div>
                    <?php $idUsuario = $this->request->data['User']['id']; ?>
                    <?php echo $this->Form->hidden('id', array('value'=>$idUsuario)); ?>
                    
                    <div class="form-group ">
                        <label for="data[User][nombre]" class="control-label col-lg-2">Nombre Completo (*)</label>
                        <div class="col-lg-10">
                            <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'minlength' => 2, 'required')); ?>                                
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="data[User][email]" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <?php echo $this->Form->text('email', array('class' => 'form-control')); ?>                                
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <label for="data[User][telefono]" class="control-label col-lg-2">Telefono</label>
                        <div class="col-lg-10">
                            <?php echo $this->Form->text('telefono', array('class' => 'form-control')); ?>                                
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-danger" type="submit">Guardar Usuario</button>                    
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