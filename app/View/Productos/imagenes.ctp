<?php //debug($imagenesProducto);     ?>
<style>
    img.pekes{        
        max-height: 15%;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Imagenes del Producto: <b><?php echo $datosProducto['Producto']['nombre']; ?></b>
            </header>
            <?php echo $this->Form->create('Imagen', array('class' => 'cmxform form-horizontal tasi-form', 'id' => 'commentForm', 'enctype' => 'multipart/form-data')); ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Cambiar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php for ($i = 0; $i <= 2; $i++): ?>
                        <?php $j = $i; ?>
                        <?php
                        $idImagen = $imagenesProducto[$i]['Imagene']['id'];
                        $imagen = $imagenesProducto[$i]['Imagene']['imagen'];
                        ?>
                        <tr>
                            <td><?php echo++$j; ?></td>
                            <td>
                                <?php if (!empty($imagenesProducto[$i]['Imagene'])): ?>
                                    <img src="<?php echo $this->webroot; ?>files/img/<?php echo $imagenesProducto[$i]['Imagene']['imagen']; ?>" class="pekes">
                                    <?php echo $this->Form->hidden('imagen', array('value' => $imagen)); ?>
                                <?php else: ?>
                                    <h3>Sin imagen</h3>
                                <?php endif; ?>
                            </td>                        
                            <td>
                                <?php if (empty($imagenesProducto[$i]['Imagene'])): ?>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <input type="file" id="exampleInputFile" name="data[Imagen][<?php echo $i; ?>][imagen]" accept="image/*|video/*">
                                            <p class="help-block">Imagenes formato *.jpg, *.png, *.gif. (alto 962, ancho 955)</p>
                                            <?php echo $this->Form->hidden("Imagen.$i.numero", array('value'=>$j)); ?>
                                        </div>
                                    </div>
                                <?php else: ?>

                                <?php endif; ?>

                            </td> 
                            <td>
                                <?php if (!empty($imagenesProducto[$i]['Imagene'])): ?>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'eliminaimagen', $idImagen)); ?>" class="btn btn-danger btn-xs" title="Eliminar" onclick="return confirm('Desea eliminar realmente??');"><i class="icon-trash"></i></a>                                                    
                                <?php else: ?>                                 
                                <?php endif; ?>                                                                    
                            </td>
                        </tr>                      
                    <?php endfor; ?>

                </tbody>
            </table>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-danger" type="submit">Cambiar Imagenes</button>
                    <button class="btn btn-default" type="reset">Limpiar Formulario</button>
                </div>
            </div>
            </form>
        </section>
    </div>
</div>