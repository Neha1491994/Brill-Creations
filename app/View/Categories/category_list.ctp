
    <div class="container">
        <div class="templatemo-content1">
	
	        <div class="row">
                <div class="col-md-12">
	 
	
						
		             <?php 
					 //pr($featuredcategory);exit;
		             foreach($featuredcategory as $category):
					 if($category['Category']['Featured'] == '1'){
						//pr($category);exit;
					 ?>						
						<div  align="center" class="col-md-4 col-sm-6  col-xs-12" >
							    <div class="img">
								    <a  href='<?php echo Router::url(array( 'controller' => 'Categories','action' => 'subcategory_list', $category['Category']['id'])); ?>'>
								     <?php echo $this->Html->image('/files/category200x200/' .$category['Category']['logo_file'],array('alt'=>'Image not available' ,'max-width'=>'300' ,'max-height'=>'200'));?>
								    </a>
								    <div class="desc"><?php echo $category['Category']['category_name'];?></div>
							    </div>
						</div>
					 <?php
					}
                      //pr($category);exit;					 
		               endforeach;  
      	              ?>
		                
	            </div>
	        </div>
           
           

        </div>

    </div>