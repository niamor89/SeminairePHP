<?php //ici on va afficher tous les tournois
?>
<div class="tour_list">
		<table border="1px" width="100%">
			
					<?php
						$i=1;
						/*foreach ($listT as $tournament)
						{	echo"<tr><td width=\"50px\">Tournament ".$i.":</td>";
							echo "<td> Nom : ".$tournament->nom_tournois." </td>";
							echo "<td> Date : ".$tournament->date_Lancement." </td>";
							echo "<td> Createur : ".$tournament->id_Createur." </td>";
							echo "<td> Montant : ".$tournament->prix_Tournois." </td>";
							echo"</tr>";
							$i++;
						}*/
						for ($i=0; $i<$list.count() ;$i++) {
							echo"<tr><td width=\"50px\">Tournament ".$i.":</td>";
								echo "<td> Nom : ".$list[1]." </td>";
								echo "<td> Date : ".$list[2]." </td>";
								echo "<td> Createur : ".$list[3]." </td>";
								echo "<td> Montant : ".$list[4]." </td>";
							echo"</tr>";
						}
					?>
			
		</table>
</div>