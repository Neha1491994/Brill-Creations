<div class="container">
    <div class="templatemo-content1">
	
	<div class="row">
		<div class="col-md-12">
		
		<div class="row">			
			<div class="col-md-6 margin-bottom-9">	
	
			<!--  <div class="jumbotron"></div> -->
		
			</br>
			<h4><Span style= "color:Blue"> Add Your address </span></h4>
			<?php //echo $this->Form->create('Product', array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data',));
			echo $this->Form->create('Address', array('url' => array('controller'=>'users','action'=>'add_address')));?>
		
			<label class="control-label" for="ProductName">Fullname</label>	
			<?php echo $this->Form->input('Address.fullname',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required'));?>
			</br>
			<label class="control-label" for="ProductName">Address</label>		
			<?php echo $this->Form->input('Address.address',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required'));?>
			</br>
			<label class="control-label" for="ProductName">City</label>		
			<?php echo $this->Form->input('Address.city',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required','autocomplete'=>true));?>
			</br>
			<label class="control-label" for="ProductName">State</label>		
			<?php echo $this->Form->input('Address.state',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required','autocomplete'=>true));?>
		    </br>
			<label class="control-label" for="ProductName">zipcode</label>		
			<?php echo $this->Form->input('Address.zipcode',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required','autocomplete'=>true));?>
			</br>
			
			
			</div>
			<div class="col-md-6 margin-bottom-9">
			<label class="control-label" for="ProductName">CotactNumber</label>		
			<?php echo $this->Form->input('Address.contactnumber',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required'));?>
			</br>
			<label class="control-label" for="ProductName">Alternate Number</label>		
			<?php echo $this->Form->input('Address.alternatenumber',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => ''));?>
			</br>
			<label class="control-label" for="ProductName">Landmark</label>		
			<?php echo $this->Form->input('Address.landmark',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => ''));?>
			</br>
			<?php echo $this->Form->submit('Add Address', array('name'=>'Cp','class' => 'btn btn-warning btn-md',  'title' => 'Click here to add address') );?>
		    <?php echo $this->Form->end(); ?>
			<Span style= "color:green"><?php echo $this->Session->flash(); ?></span>
			</div>
		</div>
		
		</div>
	</div>
	
	</div>
</div>	