<div class="container">
<div class="templatemo-content1">
          <h1>Product Detail</h1>
		  
            <div class="row">
                <div class="col-md-12">
              
			  <?php 
			//pr($this->request->data);exit;
			//if(isset($this->request->data) && $this->request->data != ""){
					$product = $this->request->data['Product']; 		
					$category = $this->request->data['Category'];
					$galleries = $this->request->data['Gallery'];
			
					//pr($product);exit;
				//echo $this->Html->script('jquery.min');
				//echo $this->Html->script('thumbnailviewer2');
				
			    ?>
				
				<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product" id="loadarea" >
							
								<?php echo $this->Html->image('/files/images/' .$galleries[0]['images'],array('style'=>'max-width:428px; max-height:357px;'))?></div>								
							
										 <?php 
					                      foreach($galleries as $gallery )
										    {
					
					                         if($gallery['images']!= ''){
					                           ?>
                                               <a href="/Brill-Creation/files/images/<?php echo $gallery['images'];?>" rel="enlargeimage" rev="targetdiv:loadarea">
					                           <?php echo $this->Html->image('/files/thumbs100x100/' .$gallery['images']);?></a>
											 <?php }
										    }
										    ?>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?php echo $product['product_name']; ?></h2>
								<p>Product Number: <?php echo $product['product_number'];?> </p>
								
							<!--	<span>
									<label>Quantity:</label>
									<input type="text" value="1" />
									<a href='<?php// echo Router::url(array('controller' => 'Products','action' => 'add_to_cart',$product['id'])); ?>' class="hovermanuecolor">
									<button type="button" class="btn btn-primary cart">
										<i class="fa fa-shopping-cart"></i> Add to cart
									</button>
									</a>
								</span> -->
								
							<?php if(($this->Session->check('Message.flash'))): ?>			
								<div role="alert" class="alert alert-success alert-dismissible">
									<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
									<strong><?php echo $this->Session->flash(); ?></strong> 
								</div>
							<?php endif;?>	
								
							<div class="row" style="margin-left: 0px;">
							    <?php echo $this->Form->create('Cart_detail',['url' => ['controller' => 'products', 'action' => 'add_to_cart']]);?> 
								<label >Quantity:</label>
								<?php echo $this->form->input('Cart_detail.quantity',array('label' => false,'div'=>''));
								      echo $this->Form->input('Cart_detail.product_id', array('type' => 'hidden','value' => $product['id'])); 
								     // echo $this->Form->submit('Add to cart', array('class' => 'btn btn-primary btn-sm'));?>
										
							   
								     
							</div>
							    <?Php echo $this->Session->flash();?>
								<p><b>Availability:</b><?php echo $product['unitsinstock'];?> </p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> Brill-Creation</p>
								<button class="btn btn-primary" type="submit">Get Quote</button>
								<button class="btn btn-primary" type="submit">Add to cart</button>
								 <?php echo $this->Form->end(); ?>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
                <div class="row templatemo-form-buttons">
                    <div class="col-md-12">
				 
				     <?php //pr($product);exit;
					 echo $this->Html->link(
									"Back",
									array('action' => 'product_list', $product['category_id']),
									array('class'=>'btn btn-default')
								); 
				     ?>   
                    </div>
                </div>
          
                </div>
            </div>
        </div>
	</div>
	  
	   <script type="text/javascript">
         function swap(image) {
             document.getElementById("main").src = image.href;
         }
     </script>