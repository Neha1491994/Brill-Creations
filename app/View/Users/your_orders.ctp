<div class="container">
		<div class="templatemo-content2">
		
		<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 text-left">
		
		<?php if(($this->Session->check('Message.flash'))): ?>			
				<div role="alert" class="alert alert-success alert-dismissible">
						<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<strong><?php echo $this->Session->flash(); ?></strong> 
				</div>
	    <?php endif;?>
							
			<div class="container">		 		
							<?php if($this->Session->read('usertype') == 'User'):
							if($this->request->data):?>	
							<div class="table-responsive cart_info">
								<table class="table table-condensed">
									<thead>
										<tr class="cart_menu">
											<td class="Ordernumber">Ordernumber</td>
											<td class="Orderdate">Orderdate</td>
											<td class="quantity">Status</td>
											<td class="Action">Action</td>
											<td></td>
										</tr>
									</thead>
									<tbody>
									 <?php
									 //pr($this->request);exit;
									 
									 foreach($this->request->data as $order):
									 //pr($order);exit;
									 ?>
										<tr>
											<td class="cart_product">
												<?php echo $order['Order']['ordernumber'];?>
											</td>
											<td class="Orderdate">
										    <?php echo $order['Order']['orderdate'];?>
											</td>
											<td class="cart_product">
												<?php echo $order['Order']['status'];?>
											</td>
											<td class="cart_action">
												
												<button class="btn btn-primary" type="submit" onclick="location.href='<?php echo Router::url(array('controller' => 'Users', 'action' => 'order_detail', $order['Order']['id']));?>'">Detail</button>
												
											</td>
											
										</tr>
										<?php					 
										endforeach; 
                                        endif	;									
										?>
										<tr>
										<ul class="pagination right">
										  <?php echo $this->Paginator->prev('«',array('tag' => 'li'),null,array('tag' => 'li','class' => 'disabled'));
												echo $this->Paginator->numbers();
												echo $this->Paginator->next('»',array('tag' => 'li'),null,array('class' => 'disabled'));
												?>			
										  </ul>
										</tr>
									</tbody>
								</table>
							</div>
							<?php endif;?>
						</div>
		</div>
	</div>
</div>