      

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
								  <li><a href="<?php //echo Router::url(array('controller' => 'Categories', 'action' => 'category_list'));?>">Home</a></li>
								  <li class="active">Shopping Cart</li>
								</ol>
							</div> -->
					
						<div class="container">
							
							<?php if($this->Session->read('usertype') == 'User'):?>	
							<div class="table-responsive cart_info">
								<table class="table table-condensed">
									<thead>
										<tr class="cart_menu">
											<td class="image">Item</td>
											<td class="description">Description</td>
											<td class="quantity">Quantity</td>
											<td class="total">Status</td>
											<td></td>
										</tr>
									</thead>
									<tbody>
									 <?php
									// pr($order_detail);exit;
									 foreach($order_detail as $item):
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
													<?php echo $item['Orderdetail']['quantity'];?>
											</td>
											<td class="order_status">
												<?php echo $item['Order']['status'];?>
												
											</td>
											
										</tr>
										<?php					 
										endforeach;  
										?>
									</tbody>
								</table>
							</div>
							<?php endif;?>
						</div>
					
				</div> 
        </div>
	</div>
	  
	 