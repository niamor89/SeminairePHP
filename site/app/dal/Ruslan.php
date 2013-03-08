<?php
	function isAdmin() {
		$u=GetRow('SELECT is_Admin FROM t_joueur WHERE id_joueur='.$_SESSION["id_user"].';');
		if($u['is_Admin']) return true;
		else return false;
	}
	