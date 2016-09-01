<?php
//echo $this->element('common/myProfile_menu');

?>
<div class="container">
    <div class="templatemo-content1">
	<?php  //pr($users);?>
	<div class="row">
     <div class="col-md-12">
<div class="row">			
	<div class="col-md-5 margin-bottom-9">	
	
	  <!--  <div class="jumbotron"></div> -->
		   <?php  echo $this->Html->image('user.png'); ?>
		
		</br>
		<h4><Span style= "color:Blue"> Update Your Profile </span></h4>
		<?php 
		//echo $this->Form->create('Product', array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data',));
		
        echo $this->Form->create('User', array('url' => array('controller'=>'users','action'=>'edit_profile')));?>
		
        <label class="control-label" for="ProductName">Registered Username</label>		
		<?php echo $this->Form->input('User.username',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '','readonly'=>'readonly'));?>
		</br>
		<label class="control-label" for="ProductName">Registered Firstname</label>		
		<?php echo $this->Form->input('User.firstname',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => ''));?>
		</br>
		<label class="control-label" for="ProductName">Registered Lastname</label>		
		<?php echo $this->Form->input('User.lastname',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => ''));?>
		</br>
		
	</div>
	
	<div class="col-md-7 margin-bottom-9">
		
		<!--	<div class="jumbotron">
				<Span style= "color:Blue"><h3>User Bio.</h3></span>
			</div> 
		
		<div class="row">
			<div class="col-md-12 ">
			  <button type="submit" class="btn btn-info btn-md">Facebook</button>
			  <button type="submit" class="btn btn-danger btn-md">Google</button>
			  <button type="submit" class="btn btn-primary btn-md">Twitter</button>
			  <button type="submit" class="btn btn-info btn-md">Linkedin</button>
			</div>
		</div> -->
		 <label class="control-label" for="ProductName">Registered email</label>		
		<?php echo $this->Form->input('User.email',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => false,'readonly'=>'readonly'));?>
		</br>
		<label class="control-label" for="ProductName">Registered mobile</label>		
		<?php echo $this->Form->input('User.mobile',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => false));?>
		</br>
		<?php echo $this->Form->submit('Update Details', array('class' => 'btn btn-success btn-md',  'title' => 'Click here to update') );?>
		<?php echo $this->Form->end(); ?>	
	
	    <?php echo $this->Form->create('Password', array('url' => array('controller'=>'users','action'=>'edit_profile')));?>
		<h4><Span style= "color:Blue">Change Your Password </span></h4>
		<Span style= "color:red"><?php echo $this->Session->flash(); ?></span>
		<label class="control-label" for="ProductNumber">Enter old Password</label>
		<?php echo $this->Form->input('Password.oldPassword',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '',)); ?>
		</br>
		<label class="control-label" for="ProductNumber">Enter new Password</label>
		<?php echo $this->Form->input('Password.password',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '',)); ?>
		</br>
		<label class="control-label" for="ProductNumber">confirm Password</label>
		<?php echo $this->Form->input('Password.confirm_password',array('class'=>'form-control', 'type'=>'text', 'div' => '', 'label' => '',)); ?>
		</br>
		<?php echo $this->Form->submit('Change Password', array('name'=>'Cp','class' => 'btn btn-warning btn-md',  'title' => 'Click here to change pass') );?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>


	</div>
</div>
</div>
</div>