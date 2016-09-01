      

	<div class="container">
		<div class="templatemo-content1">
			
				<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 text-left">
					<?php if(($this->Session->check('Message.flash'))): ?>			
								<div role="alert" class="alert alert-success alert-dismissible">
									<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
									<strong><?php echo $this->Session->flash(); ?></strong> 
								</div>
							<?php endif;?>
							<div class="breadcrumbs">
								<ol class="breadcrumb">
								  <li><a href="#">Home</a></li>
								  <li class="active">Shopping Cart</li>
								</ol>
							</div>
					<section id="cart_items">
						<div class="container">
							
						<?php if($this->Session->read('usertype') == 'User'):?>	
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
												<h4><a href=""><?php echo $item['Product']['product_name'];?></a></h4>
												<p>Web ID: 1089772</p>
											</td>
											
											<td class="cart_quantity">
													<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $item['Cart_detail']['quantity'];?>" autocomplete="off" size="2">
											</td>
											<td class="cart_total">
												<p class="cart_total_price"><a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'cart_remove', $item['Cart_detail']['id']));?>"><span class="glyphicon glyphicon-remove"></span></a></p>
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
					</section>
				</div> 
        </div>
	</div>
	  
	 