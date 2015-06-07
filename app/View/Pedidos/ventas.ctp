<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Listado de Ventas
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Usuario</th>
                        <th class="hidden-phone">Fecha/Hora</th>                           
                        <th class="hidden-phone">Acciones</th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php foreach ($pedidos as $p): ?>
                        <tr class="odd gradeX">                        
                            <td><?php echo $p['Pedido']['numero']; ?></td>
                            <td><?php echo $p['User']['nombre']; ?></td>
                            <td><?php echo $p['Pedido']['created']; ?></td>                                                                     
                            <td class="hidden-phone">                                 
                                <a href="<?php echo $this->Html->url(array('controller' => 'Pedidos', 'action' => 'detalle', $p['Pedido']['id'])); ?>" class="btn btn-success btn-xs"><i class="icon-list"></i></a>
                                <!--<a href="<?php //echo $this->Html->url(array('controller' => 'Pedidos', 'action' => 'edit', $p['Pedido']['id'])); ?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a>
                                <a href="<?php //echo $this->Html->url(array('controller' => 'Pedidos', 'action' => 'delete', $p['Pedido']['id'])); ?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>-->
                            </td>
                        </tr>                    
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