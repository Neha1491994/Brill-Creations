
<div>
<?php
echo $this->element('common/left_menu');
?>
</div>
<div class="templatemo-content">
<div class="contant-name"><b>Orders:<?php if($this->Session->check('username')){ echo $this->Session->read('username'); }?></b></div>
            <div class="row margin-bottom-30">
            <div class="col-md-12">
<table class="table table-striped table-hover table-bordered">
    <thead>
		<tr><th><?php echo $this->Paginator->sort('id', 'Id');?>  </th>
			<th><?php echo $this->Paginator->sort('ordernumber', 'Order Number');?>  </th>
			<th><?php echo $this->Paginator->sort('orderdate', 'Order Date');?></th>
			<th><?php echo $this->Paginator->sort('products','Number of Items');?></th>
			<th><?php echo $this->Paginator->sort('status','Status');?></th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>						
			<?php foreach($orders as $order): 				
		//pr($order);exit;?>
		    <td style="text-align: center;"><?php echo $order['Order']['id']; ?></td>
			<td style="text-align: center;"><?php echo $order['Order']['ordernumber']; ?></td>
			<td style="text-align: center;"><?php echo $this->Time->niceShort($order['Order']['orderdate']); ?></td>
			<td style="text-align: center;"><?php echo $order['Order']['products']; ?></td>
			<td style="text-align: center;"><?php echo $order['Order']['status']; ?></td>
			<td >
			<div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
						     <li><?php echo $this->Html->link(    "Edit",  array('action'=>'edit', $order['User']['id']) ); ?></li>
							
							<li><?php if( $order['Order']['status'] != "Pending"){
										echo $this->Html->link("Pending",array('action'=>'Order_Pending', $order['Order']['id']),null,'Are you sure you want to change the status ?');}
								else{
										echo $this->Html->link("Delievered", array('action'=>'Order_delievered', $order['Order']['id']));
								}?>
							</li>
						<li><?php echo $this->Html->link("Detail",   array('controller'=>'Products','action'=>'order_detail', $order['Order']['id']) ); ?></li>
						</li>
                        </ul>
                        </div>
			
			 
			</td>
		</tr>
		<?php endforeach; ?>
		<?php unset($order); ?>
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


