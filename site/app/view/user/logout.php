<?php if ($display_logout_infos == 1) { ?>
	<p>Connected as <b><?php echo $_SESSION['pseudo'] ?></b></p>
	<ul>
		<li><a href="#">Profil</a></li>
		<li><a href="/user/logout&logoutconfirm=1">Logout</a></li>
	</ul>
<?php } ?>

<?php if ($display_logout_confirm == 1) { ?>
	<p>Vous avez ete deconnecte</p>
<?php } ?>