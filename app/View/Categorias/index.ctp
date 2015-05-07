<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Listado de Categorias
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
                    <?php foreach($categorias as $cate): ?>
                    <tr class="odd gradeX">                        
                        <td><?php echo $cate['Categoria']['nombre']; ?></td>
                        <td class="center hidden-phone"><?php echo $cate['Categoria']['descripcion']; ?></td> 
                                                                  
                        <td class="hidden-phone"> 
                             <a href="<?php echo $this->Html->url(array('controller'=>'Categorias','action' => 'edit', $cate['Categoria']['id']));?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a>
                             <a href="<?php echo $this->Html->url(array('controller'=>'Categorias','action' => 'delete', $cate['Categoria']['id']));?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>
                             
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