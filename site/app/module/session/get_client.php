<?php
	if(!isset($_GET['sess'])) {
		header("Status: 303 See Other", false, 303);
		header('Location : /session/start');
		exit();
	}
	$context['pub'] = '<div id="pub">
						<img src="/assets/img/pub.png" style="height:60px; width:150px;position:relative; top:5px;" />
					</div>';