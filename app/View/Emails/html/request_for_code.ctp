<!DOCTYPE html>
<html>
<body>
<p>Dear User,</p>
<p>Your request for 
			<span style="color:black"><b><?php
$length = count($products);
for($i = 0; $i<$length; $i++){
echo "</br> ".$products[$i]['quantity']." item of ".$products[$i]['name'].",  </br>";
}
?></b></span>
			is considered successfully.</p>
<p>Please note this information for further process</p>
<p>Your order number is <b><?php echo $ordernumber; ?>
</b></p>
<p>Regards,</p>
<p><b>Brill Creations Administrator</b></p>
</body>
</html>
