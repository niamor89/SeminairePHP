<?php
$row = get_info();
?>

<img src= "<?php echo $row['file_Path'] ?>"/>
<form method="post" action="upload" enctype="multipart/form-data">   
	<div>
		<label>Changer d'avatar: </label>
		<input type="file" name="file" id=profil_avatar_name>
	</div>
	<input type="submit" value="Envoyer" class=button_wooden>  
</form>

<form method="post" action="maj_profil">  
<div>
	<br />
	<label for="mail">Mail :</label>
	<input type="email" name="mail" id="mail" value="<?php echo $row['mail_Joueur'] ?>" />
	
	<br />
	<label for="pass">Mot de passe :</label>
	<input type="password" name="pass" id="pass" class="signup" required/>
	<input type="submit" value="Envoyer" class=button_wooden> 
</div>
</form>

<div>
 montant de SC : <?php echo $row['survivalCoin'] ?>
</div>