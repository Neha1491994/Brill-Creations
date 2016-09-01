      

	<div class="container">
		<div class="templatemo-content2">
			
				<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 text-left">
					<?php if(($this->Session->check('Message.flash'))): ?>			
								<div role="alert" class="alert alert-success alert-dismissible">
									<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
									<strong><?php echo $this->Session->flash(); ?></strong> 
								</div>
							<?php endif;?>
						<!--	<div class="breadcrumbs">
								<ol class="breadcrumb">
								  <li><a href="<?php echo Router::url(array('controller' => 'Categories', 'action' => 'category_list'));?>">Home</a></li>
								  <li class="active">Shopping Cart</li>
								</ol>
							</div> -->
					
						<div class="container">
							
							<?php 
							if($this->Session->read('usertype') == 'User'):
							$total=0;
							?>	
							<div class="table-responsive cart_info">
								<table class="table table-condensed">
									<thead>
										<tr class="cart_menu">
											<td class="image">Item</td>
											<td class="description">Description</td>
											<td class="quantity">Quantity</td>
											<td class="total">Action</td>
											<td></td>
										</tr>
									</thead>
									<tbody>
									 <?php
									 //pr($items);exit;
									 
									 foreach($items as $item):
									 $total=$total+$item['Cart_detail']['quantity'];
									 ?>
										<tr>
											<td class="cart_product">
											<a href="">
												<?php if($item['Product']['Gallery']!= ''){
												echo $this->Html->image('/files/thumbs100x100/'.$item['Product']['Gallery'][0]['images']); 
												}?>
											</a>
											</td>
											<td class="cart_description">
												<h4><a href="<?php echo Router::url(array('controller' => 'Products', 'action' => 'product_detail', $item['Product']['id']));?>"><?php echo $item['Product']['product_name'];?></a></h4>
												<p>Product ID:<?php echo $item['Product']['product_number'];?> </p>
											</td>
											
											<td class="cart_quantity">
													<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $item['Cart_detail']['quantity'];?>" autocomplete="off" size="2">
											</td>
											<td class="cart_action">
												<button class="btn btn-primary" type="submit"  onclick="location.href='<?php echo Router::url(array('controller' => 'Users', 'action' => 'cart_remove', $item['Cart_detail']['id']));?>'">Remove</button>
												<button class="btn btn-primary" type="submit" onclick="location.href='<?php echo Router::url(array('controller' => 'Users', 'action' => 'request_for_code', $item['Product']['id']));?>'">Get Quote</button>
												
											</td>
											
										</tr>
										<?php					 
										endforeach;  
										?>
										<tr>
										<ul class="pagination right">
										  <?php echo $this->Paginator->prev('«',array('tag' => 'li'),null,array('tag' => 'li','class' => 'disabled'));
												echo $this->Paginator->numbers();
												echo $this->Paginator->next('»',array('tag' => 'li'),null,array('class' => 'disabled'));
												?>			
										  </ul>
										</tr>
										<tr class="cart_menu">
										<td></td>
										<td class="description">Total</td>
										<td class="cart_quantity">
													<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $total;?>" autocomplete="off" size="2" readonly>
											</td>
										<td class="cart_action">
										<button class="btn btn-primary" type="submit" onclick="location.href='<?php echo Router::url(array('controller' => 'Users', 'action' => 'request_for_code'));?>'">Get Quote for all</button>
										</td>
										</tr>
									</tbody>
								</table>
							</div>
							<?php endif;?>
						</div>
					
				</div> 
        </div>
	</div>
	  
	 