<?php
$context["title"] = "Validate team";

if(isset($_POST['tour_payment']))
{
	$tour_payment_type=$_POST['tour_payment_type'];
}
if(isset($_POST['tour_validate_payment']))
{
header('Location: /tournament/start');
}
else
{
}


?>