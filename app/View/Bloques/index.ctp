<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Listado de Bloques
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                    <tr>                        
                        <th>Nombre</th>
                        <th class="hidden-phone">Contenido</th>
                        <th class="hidden-phone">Posicion</th>  
                        <th class="hidden-phone">Imagen</th>                        
                        <th class="hidden-phone">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    <?php foreach($bloques as $blo): ?>
                    <tr class="odd gradeX">                        
                        <td><?php echo $blo['Bloque']['nombre']; ?></td>
                        <td class="center hidden-phone"><?php echo $blo['Bloque']['contenido']; ?></td> 
                        <td class="center hidden-phone"><?php echo $blo['Bloque']['posicion']; ?></td> 
                        <td class="center hidden-phone"><?php echo $blo['Bloque']['imagen_lugar']; ?></td> 
                                                                  
                        <td class="hidden-phone"> 
                             <a href="<?php echo $this->Html->url(array('controller'=>'Bloques','action' => 'edit', $blo['Bloque']['id']));?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a>
                             <a href="<?php echo $this->Html->url(array('action' => 'delete', $blo['Bloque']['id']),array('escape' => false), ("Desea eliminar realmente??")); ?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>
                             
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

<!-- Sidebar/drop-down menu -->
<aside>
<?php //echo $this->element('sidebar'); ?>
</aside>
<!-- End sidebar/drop-down menu --> 