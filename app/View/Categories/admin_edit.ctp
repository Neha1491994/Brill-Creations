<?php echo $this->Html->script('ckeditor/ckeditor.js');
	$edit = false;
	//pr($this->request->data);exit;
	if(isset($this->request->data['Product']['id'])){
		$edit = true;
	}
?>
<?php
echo $this->element('common/left_menu');
?>
<div class="templatemo-content">
        
					
			
<div class="contant-name"><b>Edit Category: <?php if($this->Session->check('categ')){
	$categ = $this->Session->read('categ');
}
 if($this->Session->check('type')){echo $this->Session->read('categ');}?></b></div>	
	

 <div class="row">
     <div class="col-md-12">
<?php echo $this->Form->create('Category',array('controller'=>'category','action'=>'edit','novalidate'=>true));?>
    
       <div class="row">
       <div class="col-md-6 margin-bottom-15">
				  <label class="control-label" for="AdminType">Category Name</label>
				  <?php echo $this->Form->input('Category.category_name',array('class'=>'form-control', 'div' => '', 'label' => '',));?>
		</div>
	    </div>	
		
		<div class="row">
            <div class="col-md-6 margin-bottom-15">
                    <label for="AdminPassword">Description</label>
                    <?php //$this->Ck->input('Admin.description', array('div' => '','label' => ''));
					echo $this->Form->textarea('Category.description',array('class'=>'form-control', 'div' => '', 'label' => '',)); ?>  
            </div>
         </div>		
		
		<div class="row">
            <div class="col-md-6 margin-bottom-15">	   
		              <?php echo $this->Form->input('Featured', array(
                                  'type'=>'checkbox', 
                                  'format' => array('before', 'input', 'between', 'label', 'after', 'error' ),                                   
								   'div' => '',								  
                       ) ); ?>
		    </div>
			<?php if($this->Session->read('type')=="Category"){ ?>
			<div class="col-md-6 margin-bottom-15">
                  <label for="exampleInputFile">Logo :</label>(must be 334x334)
			<?php echo $this->Form->input('Category.logo_file', array('type' => 'file','div' => '', 'label' => ''));
			          if(isset($this->request->data['Category']['logo_file']) && $this->request->data['Category']['logo_file']!= ''):
						echo $this->Html->image('/files/category200x200/'.$this->request->data['Category']['logo_file']); 
					  else:
						echo '<p class="help-block">Upload logo.</p>';
					  endif;
			} ?>
			
            </div>
	    </div>
  
 <div class="row templatemo-form-buttons">
                <div class="col-md-12">
				<?php echo $this->Form->input('Category.id', array('type' => 'hidden')); ?>
                  <button class="btn btn-primary" type="submit" >Edit Category</button>
                  <button class="btn btn-default" onClick="history.back(0);">Cancel</button>    
                </div>
              </div>  
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>


