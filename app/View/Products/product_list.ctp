<script>
function goBack() {
    window.history.back();
}
</script>
    <div class="container">
        <div class="templatemo-content1">
							<?php if(($this->Session->check('Message.flash'))): ?>			
								<div role="alert" class="alert alert-success alert-dismissible">
									<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
									<strong><?php echo $this->Session->flash(); ?></strong> 
								</div>
							<?php endif;?>
	        <div class="row">
			
				<div class="breadcrumbs">
									<ol class="breadcrumb">
									  <li><a href="<?php echo Router::url(array('controller' => 'Categories', 'action' => 'subcategory_list', $products[0]['Category']['parent_id']));?>">Subcategories</a></li>
									  <li class="active"><?php echo $this->Session->read('categ');?></li>
									</ol>
				</div>
                <div class="col-md-12">
	 
	
						
		             <?php 
						//pr($products);exit;

		            foreach($products as $product):
						
						
						//pr($category);exit;
						?> 
						
                       <div class="container col-lg-3 col-md-3 col-sm-6  col-xs-12">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">		
						    <div  class="carousel-inner"  role="listbox" >
							    
								<?php 
								$num =1;
								foreach($product['Gallery'] as $gallery):
								$cls = ($num == 1) ? 'active' : '';
								?>
									<div class="img1 item <?=$cls?>">
								    <a href='<?php echo Router::url(array( 'controller' => 'Products','action' => 'product_detail',  $product['Product']['id'])); ?>'>
								     <?php echo $this->Html->image('/files/large/'.$gallery['images'],array('alt'=>'Image not available' ,'width'=>'150', 'height'=>'125'));?>
								    </a>									
								   
									 </div>									 
									<?php $num++; endforeach;?>
									
							   
						    </div><div class="desc"><?php echo $product['Product']['product_name'];?></div>
						</div>
						</div>
					 <?php
					
                      //pr($category);exit;					 
		               endforeach;  
      	              ?>
		                
	            </div>
	        </div>
           
           

        </div>

    </div>
	<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
     
	  max-height:165px;
      max-width:245px;	  
      margin: auto;
  }
  </style>