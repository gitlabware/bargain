<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Listado de Marcas
            </header>
            <table class="table table-striped border-top" id="sample_1">
                <thead>
                    <tr>                        
                        <th>Nombre</th>
                        <th class="hidden-phone">Descripcion</th>                       
                        <th class="hidden-phone">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    <?php foreach($marcas as $mar): ?>
                    <tr class="odd gradeX">                        
                        <td><?php echo $mar['Marca']['nombre']; ?></td>
                        <td class="center hidden-phone"><?php echo $mar['Marca']['descripcion']; ?></td> 
                                                                  
                        <td class="hidden-phone"> 
                             <a href="<?php echo $this->Html->url(array('controller'=>'Marcas','action' => 'edit', $mar['Marca']['id']));?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a>
                             <a href="<?php echo $this->Html->url(array('controller'=>'Marcas','action' => 'delete', $mar['Marca']['id']));?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>
                             
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