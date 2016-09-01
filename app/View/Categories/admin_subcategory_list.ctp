<div>
<?php
echo $this->element('common/left_menu');
?>
</div>
<div class="templatemo-content">
 <div class="row margin-bottom-30">
            <div class="col-md-12">
<div class="contant-name"><b>Subcategories :<?php echo $this->Session->read('categ');?></b></div>

<table class="table table-striped table-hover table-bordered">
    <thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id', 'Id');?></th>
			<th><?php echo $this->Paginator->sort('category_name', 'Category Name');?>  </th>
			<th><?php echo $this->Paginator->sort('description', 'Description');?></th>
			<th><?php echo $this->Paginator->sort('status', 'status');?></th>
			
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>						
		<?php $count=0; ?>
		<?php //pr($categorys);exit;
		 foreach($categorys as $Category): ?>				
		<?php $count ++;?>
		<?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
		<?php endif; ?>
			<td style="text-align: center;"><?php echo $Category['Category']['id']; ?></td>
			<td><?php echo $this->Html->link( $Category['Category']['category_name']  , array('controller' => 'Products', 'action'=>'product_list', $Category['Category']['id']),array('escape' => false) );?></td>
			<td style="text-align: center;"><?php echo $Category['Category']['description']; ?></td>
			<td style="text-align: center;"><?php echo $Category['Category']['status']; ?></td>
			
			<td >
			 
		<div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><?php echo $this->Html->link("Edit",array('action' => 'edit', $Category['Category']['id']));?></li>
                            <!--<li><?php echo $this->Html->link("Delete",array('action' => 'category_delete', $Category['Category']['id']),null,'Are you sure you want to delete this Subcategory ?');?></li>-->
							<li><?php if( $Category['Category']['status'] != 0){
							echo $this->Html->link("Delete",array('action'=>'delete', $Category['Category']['id']),null,'Are you sure you want to delete this category ?');}
						else{
					    echo $this->Html->link("Re-Activate", array('action'=>'activate', $Category['Category']['id']));
					    }?>
                          </ul>
                        </div>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php unset($Category); ?>
	</tbody>
</table>

<ul class="pagination pull-right">
			  <?php echo $this->Paginator->prev('«',array('tag' => 'li'),null,array('tag' => 'li','class' => 'disabled'));
					echo $this->Paginator->numbers();
					echo $this->Paginator->next('»',array('tag' => 'li'),null,array('class' => 'disabled'));
					?>			
              </ul>

</div>

</div>
</div>
