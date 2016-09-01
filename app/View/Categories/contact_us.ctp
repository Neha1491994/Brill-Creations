 <head>
<script>
var myCenter=new google.maps.LatLng(28.626641,77.384803);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:"<b> E-155, Sector-63, Noida-201301</b>"
  });

infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<div class="container">
    <div class="templatemo-content1">
		<div class="row">
		
			<div class="col-md-6">
				<p>Address: E-155, Sector-63, Noida-201301 </p></br>
				<p>Tel: +91 8588 887 484</p>
			<div id="googleMap" class="mapbox"></div>
			</div>
			
			<div class="col-md-6">
		<!--	<form name="contactform" id="loginform" class="form-horizontal" action="/categories/contact_us" method="post">
			    <form class="form-horizontal" method="post" action="/Categories/contact_us"> -->
				<?php echo $this->Form->create('Contact',array('label' => false,'div'=>'','class'=>'form-horizontal templatemo-signin-form')); ?>
                        <legend class="text-center header">Contact us</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                               <!-- <input id="fname" name="name" type="text" placeholder="First Name" class="form-control"> -->
								<?php echo $this->form->input('Contact.firstname',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'First Name')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                              <!--  <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control"> -->
								<?php echo $this->form->input('Contact.lastname',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'Last Name')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                               <!-- <input id="email" name="email" type="text" placeholder="Email Address" class="form-control"> -->
								<?php echo $this->form->input('Contact.email',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'Email Address')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                               <!-- <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control"> -->
								<?php echo $this->form->input('Contact.phone',array('label' => false,'div'=>'','class'=>'form-control','placeholder'=>'Phone')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <!-- <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here." rows="7"></textarea> -->
								<?php echo $this->form->input('Contact.message',array('type' => 'textarea','label' => false,'div'=>'','class'=>'form-control','placeholder'=>'Enter your massage for us here')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                               <!-- <button type="submit" class="btn btn-primary btn-lg">Submit</button> -->
								<?php //echo $this->form->submit('Submit',array('label' => false,'class'=>'bg372D21 b333333 cfff','div'=>'')); 
								echo $this->Form->submit('Submit', array('class' => "btn btn-primary btn-md",  'title' => 'Click here to submit') );?>
                            </div>
                        </div>
                </form>
			
			</div>
		</div>
		
	</div>
</div>
</body>