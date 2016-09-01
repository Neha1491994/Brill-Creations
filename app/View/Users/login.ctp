<head>
<script type="text/javascript">
/* This goes in the head section */
window.onload = function() { document.getElementById('first_div'); }

function toggle(link, div1id, div2id) {
var div1 = document.getElementById(div1id);
var div2 = document.getElementById(div2id);
if (div1.style.display == 'none') {
div1.style.display = 'block';
div2.style.display = 'none';
link.innerHTML = 'Sign In';
} else {
div1.style.display = 'none';
div2.style.display = 'block';
link.innerHTML = 'Sign Up Here';
}
}

</script>
</head>
<div class="container">    
	<div class="templatemo-content1">
						<?php if(($this->Session->check('Message.flash'))): ?>			
								<div role="alert" class="alert alert-success alert-dismissible">
									<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
									<strong><?php echo $this->Session->flash(); ?></strong> 
								</div>
							<?php endif;?>
        <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

							<?php echo $this->Form->create('User',array('label' => false,'controller'=>'Users','action'=>'login','div'=>'','class'=>'form-horizontal templatemo-signin-form')); ?>
							
								<fieldset>
									<legend><?php echo __('Please enter your username and password'); ?></legend>
									
									<div class="form-group">
									  <div class="col-md-12">
										<label for="email" class="col-sm-2 control-label" style="margin-left: 1px;">E-Mail:</label>
										<div class="col-sm-10">
											<?php echo $this->form->input('User.email',array('label' => false,'div'=>'','class'=>'form-control')); ?>
										</div>
									  </div>              
									</div>
									
									<div class="form-group">
									  <div class="col-md-12">
										<label for="password" class="col-sm-2 control-label" style="margin-left: 2px;">&nbsp;&nbspPassword:</label>
										<div class="col-sm-10">
											<?php echo $this->form->input('User.password',array('label' => false,'div'=>'','class'=>'form-control')); ?>
										</div>
									  </div>
									</div>
									<div class="form-group">
									  <div class="col-md-12">
										<div class="col-sm-offset-2 col-sm-10">
										  <div class="checkbox">
											<label>
											  <input type="checkbox"> Remember me
											</label>
										  </div>
										</div>
									  </div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="col-sm-offset-2 col-sm-10">
											  <?php echo $this->form->submit('login',array('label' => false,'div'=>'','class'=>'btn btn-info'));?>
											</div>
											  <!--or
											<div class="col-sm-offset-1 col-sm-12">
											  <?php //echo $this->form->button('Login with Facebook',array('label' => false,'class'=>'btn btn-primary')); ?> 
											</div-->
										</div>
									</div>
								</fieldset>
								<?php echo $this->Form->end(); ?>

                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#loginbox" onclick="toggle(this, 'loginbox', 'signupbox'); return false;">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>  
            </div>                     
        </div>  
    
        <div id="signupbox" style="display:none;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a href="#loginbox" onclick="toggle(this, 'loginbox', 'signupbox'); return false;">Sign In</a></div>
                        </div>  
                <div class="panel-body" >
				    <?php echo $this->Form->create('User',array('label' => false,'div'=>'','action'=>'signup','class'=>'form-horizontal templatemo-signup-form')); ?>
								<fieldset>
									<legend><?php echo __('Please enter user detail'); ?></legend>
									<div class="form-group">
									  <div class="col-md-12">
											<?php echo $this->form->input('User.firstname',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'Frist Name')); ?>
									  </div>              
									</div>
									<div class="form-group">
									  <div class="col-md-12">
											<?php echo $this->form->input('User.lastname',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'Last Name')); ?>
									  </div>              
									</div>
									<div class="form-group">
									  <div class="col-md-12">
											<?php echo $this->form->input('User.email',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'E-Mail')); ?>
									  </div>              
									</div>
									<div class="form-group">
									  <div class="col-md-12">
											<?php echo $this->form->input('User.mobile',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'Mobile Number')); ?>
									  </div>              
									</div>
									<div class="form-group">
									  <div class="col-md-12">
											<?php echo $this->form->input('User.password',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'Password')); ?>
									  </div>
									</div>
									<div class="form-group">
									  <div class="col-md-12">
											<?php echo $this->form->input('User.password',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'Confirm Password')); ?>
									  </div>
									</div>
									
									<div class="form-group">
										<div style="margin-top:20px" class="col-md-12">
											<div class="col-sm-offset-4 col-sm-10">
											  <?php echo $this->form->submit('Signup',array('label' => false,'class'=>'bg372D21 b333333 cfff','div'=>''));?>
											</div>
											  <!--or
											<div class="col-sm-offset-1 col-sm-12">
											  <?php //echo $this->form->button('Login with Facebook',array('label' => false,'class'=>'btn btn-primary')); ?> 
											</div-->
										</div>
									</div>
								</fieldset>	
								<?php echo $this->Form->end(); ?>	
				</div>
            </div> 
        </div> 
    </div>
</div>
    