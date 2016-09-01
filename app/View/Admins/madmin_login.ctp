<div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1><?php echo SITE_NAME;?> - SuperAdmin Login</h1></div>
      </div>   
    </div>
    <div class="template-page-wrapper">
	<form name="loginform" id="loginform" class='form-horizontal templatemo-signin-form' action="<?php echo COMMON_URL?>/admin/superAdmins/login" method="post">
		<div class="form-group">
          <div class="col-md-12">
			<?php
			echo $this->Session->flash();
			echo $this->Session->flash('auth');
			?>
		 </div>
		</div> 
        <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
				<?php echo $this->form->input('SuperAdmin.username',array('label' => false,'div'=>'','class'=>'form-control')); ?>
            </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
				<?php echo $this->form->input('SuperAdmin.password',array('label' => false,'div'=>'','class'=>'form-control')); ?>
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
              <?php echo $this->form->submit('Login',array('label' => false,'class'=>'bg372D21 b333333 cfff','div'=>'')); ?>
            </div>
          </div>
        </div>
      </form>
    </div>