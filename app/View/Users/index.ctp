<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Listado de Usuarios
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th class="hidden-phone">Usuario</th>   
                        <th class="hidden-phone">Email/Username</th>   
                        <th class="hidden-phone">Telefono</th>
                        <th class="hidden-phone">Tipo</th>                                              
                        <th class="hidden-phone">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($users as $us): ?>
                        <tr class="odd gradeX">                        
                            <td><?php echo $us['User']['numero']; ?></td>
                            <td><?php echo $us['User']['nombre']; ?></td>
                            <td><?php echo $us['User']['username']; ?></td>
                            <td><?php echo $us['User']['email']; ?></td>
                            <td><?php echo $us['User']['telefono']; ?></td>
                            <td>
                                <?php $rol = $us['User']['role']; ?>
                                <?php if ($rol == 'visitante'): ?>
                                    <span class="label label-warning label-mini">Visitante</span>
                                <?php else: ?>
                                    <span class="label label-danger label-mini">Administrador</span>
                                <?php endif; ?>                                                        
                            </td>                        
                            <td class="hidden-phone"> 
                                <?php $estado = $us['User']['estado']; ?>
                                <?php $nombre = $us['User']['nombre']; ?>
                                <?php if ($estado == 3): ?>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'deshabilitar', $us['User']['id'])); ?>" class="btn btn-success btn-xs" title='Habilitado'><i class="icon-ok"></i></a>
                                <?php else: ?>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'habilitar', $us['User']['id'])); ?>" class="btn btn-danger btn-xs" title='Deshabilitado'><i class="icon-remove"></i></a>
                                <?php endif; ?>
                                <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'edit', $us['User']['id'])); ?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a>
                                <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'cambiopass', $us['User']['id'])); ?>" class="btn btn-primary btn-xs"><i class="icon-lock"></i></a>
                                <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'delete', $us['User']['id'])); ?>" onclick="return confirm('Estas seguro de eliminar a <?php echo $nombre; ?>?');" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>                                
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