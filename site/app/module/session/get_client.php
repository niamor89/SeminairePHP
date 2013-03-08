<?php
	if(!isset($_GET['sess'])) {
		header("Status: 303 See Other", false, 303);
		header('Location : /session/start');
		exit();
	}
