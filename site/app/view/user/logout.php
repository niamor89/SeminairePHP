<?php if ($display_logout_infos == 1) { ?>
	<p>Connected en tant que <b><?php echo $_SESSION['pseudo'] ?></b></p>
	<ul>
		<li><a href="/user/profil">Profil</a></li>
		<li><a href="/user/logout&logoutconfirm=1">Logout</a></li>
		<?php if(isAdmin()) echo '<li><a href="/admin/index">Administration</a></li>'; ?>
	</ul>
<?php } ?>

<?php if ($display_logout_confirm == 1) { ?>
	<p>Vous avez ete deconnecte</p>
<?php } ?>