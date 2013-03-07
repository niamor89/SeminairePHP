<?php //ici on va afficher tout les membres de toutes les equipes qui font partie du meme tournois
?>
<div class="tour_list_participants">
		<table border="1px" width="100%">
			
					<?
						$i=1;
						While ($info = mysql_fetch_array($check))
						{	echo"<tr><td width=\"50px\">Team ".$i.":</td>";
							for($k=0; $k<5; $k++)
							{
								echo "<td> Member ".$info['j'.($k+1).'']." </td>";
							}
							echo"</tr>";
							$i++;
						}?>
			
		</table>
</div>