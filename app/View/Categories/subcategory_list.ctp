<script>
function goBack() {
    window.history.back();
}
</script>
    <div class="container">
        <div class="templatemo-content1">
	
	        <div class="row">
                
	   			<div class="breadcrumbs">
									<ol class="breadcrumb">
									  <li><a href="<?php echo Router::url(array('controller' => 'Categories', 'action' => 'category_list'));?>">Categories</a></li>
									  <li class="active"><?php echo $this->Session->read('categ');?></li>
									</ol>
				</div>
				<div class="col-md-12">	
						
		             <?php 
					//pr($categorys);exit;
		             foreach($categorys as $category):
					//pr($category);exit;
					 ?>						
						<div  align="center"  class="col-md-3 col-sm-6  col-xs-12" >
							    <div class="img">
								    <a  href='<?php echo Router::url(array( 'controller' => 'Products','action' => 'product_list', $category['Category']['id'])); ?>'>
								     <?php echo $this->Html->image('/files/large/' .$category['Category']['logo'],array('alt'=>'Image not available'));?>
								    </a>
								    <div class="desc"><?php echo $category['Category']['category_name'];?></div>
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