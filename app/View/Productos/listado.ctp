<div class="row">
    <div class="col-lg-12">

        <!--modal start-->                    
                                  
                <!--<a data-toggle="modal" href="remote.html" data-target="#modal">Click me</a>-->
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Datos del Producto</h4>
                            </div>
                            <div class="modal-body">                             
                                contenido aqui...
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-danger" type="button">Cerrar</button>
                                <!--<button class="btn btn-success" type="button">Save changes</button>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->               
                  
        <!-- fin modal -->

        <!-- modal -->
        <section class="panel">
            <header class="panel-heading">
                Listado de Productos
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                    <tr> 
                        <th>No.</th>
                        <th>Nombre</th>
                        <th class="hidden-phone">Categoria</th>                        
                        <th class="hidden-phone">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($productos as $p): ?>
                    <?php $idProducto = $p['Producto']['id']; ?>
                        <tr class="odd gradeX">      
                            <td><?php echo $p['Producto']['numero']; ?></td>
                            <td><?php echo $p['Producto']['nombre']; ?></td>
                            <td class="center hidden-phone"><?php echo $p['Categoria']['nombre']; ?></td>                                           
                            <td class="hidden-phone"> 
                                <!--<button class="btn btn-success btn-xs"><i class="icon-eye-open"></i></button>-->
                                <a href="#" id="openBtn_<?php echo $idProducto; ?>" data-toggle="modal" class="btn btn-success btn-xs" title="Ver detalle"><i class="icon-folder-open"></i></a>
                                <script>
                                    //$('#modal').modal(options)
                                    $('#openBtn_<?php echo $idProducto; ?>').click(function() {
                                        $('.modal-body').load("<?php echo $this->Html->url(array('action' => 'ajaxver', $idProducto)); ?>", function(result) {
                                            $('#myModal').modal({show: true});
                                        });
                                    });
                                </script>
                                <a href="<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'edit', $p['Producto']['id'])); ?>" class="btn btn-primary btn-xs" title="Editar"><i class="icon-pencil"></i></a>
                                <a href="<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'imagenes', $p['Producto']['id'])); ?>" class="btn btn-info btn-xs" title="Cambiar Imagenes"><i class="icon-picture"></i></a>  
                                <?php $nombre = $p['Producto']['nombre']; ?>                                                                                  
                                <a href="<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'delete', $p['Producto']['id'])); ?>" onclick="return confirm('Estas Seguro de eliminar el producto <?php echo $nombre; ?>?'); " class="btn btn-danger btn-xs" title="Eliminar"><i class="icon-trash"></i></a>                                                    
                               
                                <?php if($p['Producto']['estado']==1): ?>                                    
                                    <a href="<?php echo $this->Html->url(array('action'=>'visible',$idProducto)); ?>" class="btn btn-success btn-xs" title="Visible"><i class="icon-eye-open"></i></a>
                                <?php else: ?>    
                                    <a href="<?php echo $this->Html->url(array('action'=>'novisible',$idProducto)); ?>" class="btn btn-danger btn-xs" title="Hacer Invisible"><i class="icon-eye-close"></i></a>                                                    
                                <?php endif; ?>                                
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>                    
                </tbody>
            </table>
        </section>
    </div>         
</div>
<script src="<?php echo $this->webroot; ?>assets/data-tables/jquery.dataTables.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/data-tables/DT_bootstrap.js"></script>

<!--script for this page only-->
<script src="<?php echo $this->webroot; ?>js/dynamic-table.js"></script>