<p>
Date : <?php echo date('l dS F Y - H:ia');?>
</p>

<div class="tour_show_team">
	<table border="1px" width="100%" height="100px">
		<tr>
			<?php
				for($i=0; $i<5; $i++)
				{
					echo"
						<td>
							Pseudo : ".($i+1)."
						</td>
						
						";
				}
				echo"</tr><tr>";
				for($i=0; $i<5; $i++)
				{
					echo"
						<td>
							<img src=\"/assets/img/pic.jpg\" width=\"\"> 
						</td>	
						";
				}
			?>
		</tr>
	</table>
</div>	
<br>
</br>

		</br>Creation Tournois :
		
		<form method="post" action="/tournament/creating">
			<table width="800px" cellspacing="10">
				<tr>
					<td align="right">Nom du tournois :</td> <td width="20px"></td> <td align="left"> <input type="text" name="tour_name" size="15"> </td>
				</tr>
			 	<tr>
					<td align="right">Date et heure :</td> <td width="20px"></td> <td align="left">  <input type="date" name="tour_date" id="tour_date" /> </td>
				</tr>
				<tr>
					<td align="right">Somme mise en jeu :</td> <td width="20px"></td> <td align="left"> <input type="text" name="tour_sum" size="2"> € </td>
				</tr>
				<tr>
					<td></td> <td width="20px"></td> <td align="right"> <input type ="submit" name ="tour_validate_info" class="button_wooden" value="Validate"></td>
				</tr>
			</table>
		
	</form>	