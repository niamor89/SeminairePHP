<?php 
if ($nb == 1)
			{
			?>
				<center>
				<h1>Votre compte a bien été créé</h1>
				<br />
				<p><strong>BIENVENUE SUR SURVIVAL CAMP</strong></p>   
				</center>
			
			<?php
			}
else // Sinon, on affiche un message d'erreur
			{
				echo '<p>Erreur</p>';
				PDO_Err();
				PDO_Qry();
			}

 /*
 	<center>
		<h1>Votre compte a bien été créé</h1>
		<br />
		<p><strong>BIENVENUE SUR SURVIVAL CAMP</strong></p>   
	</center>
	*/
?>