<?php //ici on va afficher tous les tournois
?>
<div class="tour_list">
		<table border="1px" width="100%">		
					<?php
						for ($i=0; $i<$list.count() ;$i++) {
							echo"<tr><td width=\"50px\">Tournament ".$i.":</td>";
								echo "<td> Nom : ".$list[1]." </td> ";
								echo "<td> Date : ".$list[2]." </td>";
								echo "<td> Createur : ".$list[3]." </td>";
								echo "<td> Montant : ".$list[4]." </td>";
								echo "<td> <form method=\"get\" action=\"/tournament/validate_team&idT=".$list[0]."\"> <input type=\"submit\" name=\"tour_choose\" value=\"paypal\"> </form> </td>";	
							echo"</tr>";
						}
					?>			
		</table>
</div>