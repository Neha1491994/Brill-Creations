<!DOCTYPE html>
<?php
//pr($categories);

$cakeDescription = __d('cake_dev', 'Brill Creations');
?>
<head>
  <meta charset="utf-8">
  <title><?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?></title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">  
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <?php //echo $this->Html->css('custom') ?>
  <?php echo $this->Html->css('main') ?>
 <?php echo $this->Html->css('bootstrap.min') ?> 

 <!--link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script-->
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAbjK_AiPIiuAoYVdvdbfN0EEsm_OwyBeM&callback=initmap" async defer></script>
   <!--script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAbjK_AiPIiuAoYVdvdbfN0EEsm_OwyBeM" async defer></script-->
 <?php echo $this->Html->script('jquery.min') ?> 
   	<?php echo $this->Html->script('bootstrap.min') ?>
	<?php echo $this->Html->script('thumbnailviewer2') ?> 
	<?php echo $this->Html->script('main') ?> 
	
 </head>
<body>
  
 
	<header id="header" ><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<!--div class="col-md-4"-->
					<div class="col-md-12">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +91 8588 887 484</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@brillcreation.com</a></li>
							</ul>
						</div>
					</div>
					<!--div class="col-xs-8"
					<div class="col-md-6 margin-bottom-15">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>-->
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<!--div class="col-md-4"-->
					<div class="col-md-6 margin-bottom-15">
						<div class="logo pull-left">
							<a href="#"><img class="MyClass123" /></a>
						</div>
						
					</div>
					<!--div class="col-xs-8"-->
					<div class="col-md-6 margin-bottom-10">
					   <!--div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div-->
						<div class="shop-menu pull-right">			
							<ul class="nav navbar-nav ">
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								
									<center><i class="fa fa-user fa-fw"></i></center>Account&nbsp<i class="fa fa-caret-down"></i>
								</a>
						
								<ul class="dropdown-menu dropdown-user">
								
									<li><a href="<?php if($this->Session->read('usertype') == 'User'){ 
															echo Router::url(array('controller' => 'Users', 'action' => 'profile'));
														}else{
														    echo Router::url(array('controller' => 'Users', 'action' => 'login'));
												 }?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
									</li>
									<li class="divider"></li>
									<li><a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'your_orders'));?>"><i class="fa fa-truck fa-fw"></i>Order</a>
									</li>
								
								</ul>
								
								<!-- /.dropdown-user -->
							</li>
								<li><a href="#"><center><i class="fa fa-star"></i></center> Wishlist</a></li>
								<?php if($this->Session->read('usertype') == 'User'){ 
								$total_products = $this->requestAction('/Users/cart_count');}?>
								<li><a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'cart_detail',));?>"><center><i class="fa fa-shopping-cart"></i></center><b style="vertical-align: text-top; color:red;"><?php if($this->Session->read('usertype') == 'User'){ echo $total_products;}?> </b>Cart</a></li>
								<li><a href="#"><center><i class="fa fa-question"></i></center> Help</a></li>
								<?php
								//pr($this->Session->read('type'));exit;
								if($this->Session->read('usertype') == 'User'){
								echo "<li><a href=".Router::url(array('controller' => 'Users', 'action' => 'logout'))."><center><i class='fa fa-sign-out'></i></center> Logout</a></li>";
								}else{
								echo"<li><a href=".Router::url(array('controller' => 'Users', 'action' => 'login'))."><center><i class='fa fa-lock'></i></center> Login</a></li>";
								}?>
							    </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		   
		<div class="header-bottom"><!--header-bottom-->
			<div class="container"
			style="background-color: #a966bc;">
				<div class="row">
					
					<div  class="col-sx-6 col-md-8">
					<!--div class="col-sx-9"-->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="col-md-8 mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href='<?php echo Router::url(array('controller' => 'Categories', "action" => "category_list")); ?>' class="hovermanuecolor">Home</a></li>
								<li class="dropdown"><a class="hovermanuecolor dropbtn">Categories</a>
									
									<div class="dropdown-content">
									
									<?php //pr($this->request->nonfeaturedcat_list['data']);exit;
									 $categories = $this->requestAction('/Categories/nonfeaturedcat_list');
									 //pr($categories);exit;
									foreach($categories as $category):?>
									  <a href='<?php echo Router::url(array( 'controller' => 'Categories','action' => 'subcategory_list', $category['Category']['id'])); ?>'> <?php echo $category['Category']['category_name']?></a>
									  <?php endforeach;?>
									</div>
								 
								</li>
								
								<li><a href='<?php echo Router::url(array('controller' => 'Categories','action' => 'ablut_us')); ?>' class="hovermanuecolor">About us</a></li>
								<li><a href='<?php echo Router::url(array('controller' => 'Categories','action' => 'contact_us')); ?>'  class="hovermanuecolor">Contact us</a></li>
							</ul>
						</div>
					</div>
					<!--div class="col-md-3"-->
					<div class="col-md-4">
					<div class="row"> 
					<div class="search_box pull-right">
						<!--	<form class="navbar-form">
                              <input type="text" class="form-control" id="templatemo_search_box" placeholder="Search...">
                              <span class="btn btn-default">Go</span>
                           </form> -->
					      <div class="col-md-2"></div>
						  <?php echo $this->Form->create('Search',array('url' => array('controller'=>'users','action'=>'search'),array('label' => false,'div'=>'','class'=>'navbar-form'))); ?>
					   	  <div class="col-md-7">
						  <?php echo $this->form->input('Search.keyword',array('label' =>false,'div'=>'','class'=>'form-control','id'=>'templatemo_search_box' ,'placeholder'=>'Search...')); ?></div>
						  <div class="col-md-3">
						  <?php	echo $this->form->submit('Go',array('label' => false,'div'=>'','class'=>'btn btn-default'));?>
						  <?php	echo $this->Form->end(); ?></div>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    <div class="template-page-wrapper">
				
		<?php echo $content_for_layout ?>
		<footer class="templatemo-footer">
			<div class="templatemo-copyright">
			  <p>Copyright &copy; <?php echo date('Y').' '.$cakeDescription;  ?></p>
			</div>
		</footer>
    </div>
	
    <script type="text/javascript">
    
	/*jQuery(document).ready(function($) {
		$('#myTab a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		});

		$('#loading-example-btn').click(function () {
		  var btn = $(this);
		  btn.button('loading');
		  // $.ajax(...).always(function () {
		  //   btn.button('reset');
		  // });
		});
	});*/
	
	
jQuery.noConflict()

jQuery.thumbnailviewer2={
		loadmsg: '<img src="spinningred.gif" /><br />Loading Large Image...', //HTML for loading message. Make sure image paths are correct

	/////NO NEED TO EDIT BEYOND HERE////////////////

	dsetting: {trigger:'mouseover', preload:'yes', fx:'fade', fxduration:500, enabletitle:'yes'}, //default settings
	buildimage:function($, $anchor, setting){
		var imghtml='<img src="'+$anchor.attr('href')+'" style="border-width:0; max-width:428px; max-height:357px;" id="zoom_01" data-zoom-image="'+$anchor.attr('href')+'"/>'
		if (setting.link)
			imghtml='<a href="'+setting.link+'">'+imghtml+'</a>'
		imghtml='<div>'+imghtml+((setting.enabletitle!='no' && $anchor.attr('title')!='')? '<br />'+$anchor.attr('title') : '')+'</div>'
		return $(imghtml)
	},

	showimage:function($image, setting){
		$image.stop()[setting.fxfunc](setting.fxduration, function(){
			if (this.style && this.style.removeAttribute)
				this.style.removeAttribute('filter') //fix IE clearType problem when animation is fade-in
		})
	}
	
}


jQuery.fn.addthumbnailviewer2=function(options){
	var $=jQuery

	return this.each(function(){ //return jQuery obj
		if (this.tagName!="A")
			return true //skip to next matched element

		var $anchor=$(this)
		var s=$.extend({}, $.thumbnailviewer2.dsetting, options) //merge user options with defaults
		s.fxfunc=(s.fx=="fade")? "fadeIn" : "show"
		s.fxduration=(s.fx=="none")? 0 : parseInt(s.fxduration)
		if (s.preload=="yes"){
			var hiddenimage=new Image()
			hiddenimage.src=this.href
		}
		var $loadarea=$('#'+s.targetdiv)
		var $hiddenimagediv=$('<div />').css({position:'absolute',visibility:'hidden',left:-10000,top:-10000}).appendTo(document.body) //hidden div to load enlarged image in
		var triggerevt=s.trigger+'.thumbevt' //"click" or "mouseover"
		$anchor.unbind(triggerevt).bind(triggerevt, function(){
			if ($loadarea.data('$curanchor')==$anchor) //if mouse moves over same element again
				return false
			$loadarea.data('$curanchor', $anchor)
			if ($loadarea.data('$queueimage')){ //if a large image is in the queue to be shown
				$loadarea.data('$queueimage').unbind('load') //stop it first before showing current image
			}
			$loadarea.html($.thumbnailviewer2.loadmsg)
			var $hiddenimage=$hiddenimagediv.find('img')
			if ($hiddenimage.length==0){ //if this is the first time moving over or clicking on the anchor link
				var $hiddenimage=$('<img src="'+this.href+'" />').appendTo($hiddenimagediv) //populate hidden div with enlarged image
				$hiddenimage.bind('loadevt', function(e){ //when enlarged image has fully loaded
					var $targetimage=$.thumbnailviewer2.buildimage($, $anchor, s).hide() //create/reference actual enlarged image
					$loadarea.empty().append($targetimage) //show enlarged image
					$.thumbnailviewer2.showimage($targetimage, s)
				})
			$loadarea.data('$queueimage', $hiddenimage) //remember currently loading image as image being queued to load
			}

			if ($hiddenimage.get(0).complete)
				$hiddenimage.trigger('loadevt')
			else
				$hiddenimage.bind('load', function(){$hiddenimage.trigger('loadevt')})
			return false
		})
	})
}

jQuery(document).ready(function($){
	var $anchors=$('a[rel="enlargeimage"]') //look for links with rel="enlargeimage"
	$anchors.each(function(i){
		var options={}
		var rawopts=this.getAttribute('rev').split(',') //transform rev="x:value1,y:value2,etc" into a real object
		for (var i=0; i<rawopts.length; i++){
			var namevalpair=rawopts[i].split(/:(?!\/\/)/) //avoid spitting ":" inside "http://blabla"
			options[jQuery.trim(namevalpair[0])]=jQuery.trim(namevalpair[1])
		}
		$(this).addthumbnailviewer2(options)
	})
})
		
		
    
  </script>
</body>
</html>