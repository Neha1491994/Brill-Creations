
<style>
.label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
      }
 #address {
        border: 1px solid #cccccc;
        background-color: #a1b2c3;
        width: 470px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 100%;
      }
      .slimField {
        width: 100px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        /*height: 20px;*/
        margin-bottom: 2px;
      }
	  a:hover {
 cursor:pointer;
}
</style>
<?php
     //pr($users);exit;
     $edit = false;
	//pr($users['']['']);exit;
	if(isset($this->request->data['Address']['id'])){
		//pr($this->request->data['Address']['id']);exit;
		$edit = true;
	}
?>
<div class="container">
    <div class="templatemo-content1">
	<?php// pr($users);exit;?>
	<div class="row">
     <div class="col-md-12">
<div class="row">			
	<div class="col-md-5 margin-bottom-9">	
	
	  <!--  <div class="jumbotron"></div> -->
		<h4><Span style= "color:Blue"><?php echo $users['User']['username']?></span></h4>
		<?php  echo $this->Html->image('user.png'); ?>
		</br></br>
		<h5><i class="fa fa-pencil"></i> <?php echo $this->Html->link( 'Edit Profile' ,array('action'=>'edit_profile'));?></h5>
		</br>
	<!--	<h5><i class="fa fa-plus"></i> <?php //echo $this->Html->link( 'Add Address' ,array('action'=>''),array('id' => 'info','onclick'=>'show();'));?></h5> -->
	    
		
		<input id="info" type="button" value="Add New Address" onclick=show();>
		</br>
		<!---------------------------------ADDRESS FORM---------------------------->
<div id="myDiv">
   
    <?php echo $this->Form->create('Address', array('url' => array('controller'=>'users','action'=>'add_address')));?>
		
					<table id="address">
					   <tr>
						<td class="wideField" colspan="3">
						<?php echo $this->Form->input('Address.id',array('class'=>'field', 'type'=>'hidden',));?></td>
					  </tr>
					  <tr>
						<td class="label">Full Name</td>
						<td class="wideField" colspan="3">
						<?php echo $this->Form->input('Address.fullname',array('class'=>'field', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required'));?></td>
					  </tr>
					  <tr>
						<td class="label">Address</td>
						<td class="wideField" colspan="3">
						<?php echo $this->Form->input('Address.address',array('class'=>'field', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required'));?></td>
					  </tr>
					  <tr>
						<td class="label">city</td>
						<td class="wideField" colspan="3">
						<?php echo $this->Form->input('Address.city',array('class'=>'field', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required'));?></td>
					  </tr>
					  <tr>
						<td class="label">State</td>
						<td class="slimField">
						<?php echo $this->Form->input('Address.state',array('class'=>'field', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required'));?></td>
						<td class="label">Zip code</td>
						<td class="wideField">
						<?php echo $this->Form->input('Address.zipcode',array('class'=>'field', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required'));?></td>
					  </tr>
					  <tr>
						<td class="label">Landmark</td>
						<td class="wideField" colspan="3">
						<?php echo $this->Form->input('Address.landmark',array('class'=>'field', 'type'=>'text', 'div' => '', 'label' => ''));?></td>
					  </tr>
					   <tr>
						<td class="label">Contact Number</td>
						<td class="slimField">
						<?php echo $this->Form->input('Address.contactnumber',array('class'=>'field', 'type'=>'text', 'div' => '', 'label' => '','required'=>'required'));?></td>
						<td class="label">Alternate Number</td>
						<td class="wideField">
						<?php echo $this->Form->input('Address.alternatenumber',array('class'=>'field', 'type'=>'text', 'div' => '', 'label' => ''));?></td>
					  </tr>
					</table>
						<div class="col-md-9">
						<?php echo $this->Form->submit('Submit', array('name'=>'Cp','class' => 'btn btn-warning btn-md',  'title' => 'Click here to add address','id'=>'submit',) );?>
						<?php echo $this->Form->end(); ?>
						</div>
						<div class="col-md-3">
						<input id="hide" type="button" value="cancel" onclick=hide();>
                       </div>
</div>

        
		
	</div>
	<?php //if($this->Session->read('usertype') == 'User'):?>
	<div class="col-md-7 margin-bottom-9">
		
		<label class="control-label" for="ProductName">Registered Username</label></br>
		<?php echo $users['User']['username']?>
		</br></br>
		<label class="control-label" for="ProductName">Registered Firstname</label></br>		
		<?php echo $users['User']['firstname']?>
		</br></br>
		<label class="control-label" for="ProductName">Registered Lastname</label></br>		
		<?php echo $users['User']['lastname']?>
		</br></br>
		 <label class="control-label" for="ProductName">Registered email</label></br>		
		<?php echo $users['User']['email']?>
		</br><br>
		<label class="control-label" for="ProductName">Registered mobile</label></br>		
		<?php echo $users['User']['mobile']?>
		</br><br>
		
		<!--<Span style= "color:green"><?php echo $this->Session->flash(); ?></span> -->
		<label class="control-label" for="ProductName">Registered Address</label></br>
		<?php if(isset($users['address']) && $users['address']!=""){
			foreach($users['address'] as $address){
			    //  pr($address);
				 		echo "</br>" .$address['Address']['address']." ".$address['Address']['city']." ".$address['Address']['state']." ".$address['Address']['zipcode'].", mobile: ".$address['Address']['contactnumber']
						."   <a href='javascript:void(0)' id='editAddress' onclick='showbox(\"".$address['Address']['id']."\");'>".$this->Html->image('b_edit.png')."</a>"
				        ."<a href='".Router::url(array('controller' => 'Users', 'action' => 'delete' , $address['Address']['id']))."' onclick='return myfun();'>".$this->Html->image('b_drop.png')."</i></a>"; 
				        /*  .$this->Html->link('×',
                                         ['controller' => 'Users', 'action' => 'delete', $address['Address']['id']],
                                         ['confirm' => 'Are you sure you wish to delete this address?']
)                                       ;*/
				
				
				//$this->requestAction(array('controller' => 'Users', 'action' => 'profile'))
		    }
		}else{
				  echo"no any address available";
			}?>
		
		<?php //echo $this->Form->submit('Update Details', array('class' => 'btn btn-warning btn-md',  'title' => 'Click here to update') );?>
		<?php echo $this->Form->end(); ?>	
	
	   
	</div>
</div>


	</div>
</div>

</div>
</div>

<script type="text/javascript" >
function myfun(){
	return confirm("Are you sure you wish to delete this address?");
}

var button1 = document.getElementById("info");
var button2 = document.getElementById("submit");
var button3 = document.getElementById("hide");
var myDiv = document.getElementById("myDiv");

function show() {
    myDiv.style.visibility = "visible";
	
}

function hide() {
    myDiv.style.visibility = "hidden";
}

function toggle() {
    if (myDiv.style.visibility === "hidden") {
       hide();
    } else {
       show();
    }
}

hide();
button1.addEventListener("click", toggle, false);
button2.addEventListener("click", toggle, false);
if(button3){
button3.addEventListener("click", toggle, false);
}


</script>	
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
	function showbox(id) {
		if (id) {
			var dataString = 'ajax=true&id='+ id;
			jQuery.ajax({
				type: "POST",
				url: '<?php echo Router::url(array("controller" => "Users", "action" => "profile")); ?>' ,
				data: dataString,
				cache: false,
				success: function(response) {
					data = JSON.parse(response);
					//alert(data.Address.id);
					show();
					jQuery('#AddressId').val(data.Address.id);
					jQuery('#AddressFullname').val(data.Address.fullname);
					jQuery('#AddressAddress').val(data.Address.address);
					jQuery('#AddressCity').val(data.Address.city);
					jQuery('#AddressState').val(data.Address.state);
					jQuery('#AddressZipcode').val(data.Address.zipcode);
					jQuery('#AddressLandmark').val(data.Address.landmark);
					jQuery('#AddressContactnumber').val(data.Address.contactnumber);
					jQuery('#AddressAlternatenumber').val(data.Address.alternatenumber);
					//html(data);
				} 
			});
		}
	}
	
</script>
