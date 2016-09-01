  <div class="navbar-collapse collapse templatemo-sidebar">
  <?php 
		$currentController = $this->params['controller'];
		$currentAction = $this->params['action'];
		$loginType = $this->Session->read('type');
		?>
        <ul class="templatemo-sidebar-menu">
          <li>
            <form class="navbar-form">
              <input type="text" class="form-control" id="templatemo_search_box" placeholder="Search...">
              <span class="btn btn-default">Go</span>
            </form>
          </li>
		  
          <li class="sub">
		  <?php echo $this->Html->link("Home",array('action' => 'index'));?><br/>
		  </li>
		 
		  <?php //echo $this->Html->link( "Add A New User",   array('controller'=>'users','action'=>'add'),array('escape' => false) ); ?>
         
		  
		  <li class="sub">
           <?php echo $this->Html->link( "Company Objectives",   array('action'=>'company_objectives'),array('escape' => false) ); ?>
           <br/>
          </li>
		  
		  
		  <li class="sub">
           <?php echo $this->Html->link( "Team",   array('action'=>'team'),array('escape' => false) ); ?>
          <br/>
          </li>
		        
		 <li class="sub">
           <?php echo $this->Html->link( "About Us",   array('action'=>'ablut_us'),array('escape' => false) ); ?>
          <br/>
          </li>
		  
          <li>
		  <i class="fa fa-sign-out"></i><?php echo $this->Html->link( "Contact Us",   array('action'=>'contact_us') );?></a></li>
        </ul>
     </div>