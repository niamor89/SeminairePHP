<div>
	<label> Please wait during your friends coming </label>
</div>

<div id="createteam">
	<table border=1>
		<?php 
			foreach($createteamtab as $valeur)
			{
			 ?> <tr> 
				<td class="farahavatar"> A </td>
				<td> <div class ="createteampseudo"> <?php echo $valeur; ?> </div></td>
				<td><div class="farahstatut">Statut</div></td>
				</tr>
			<?php
			}
			?>
	</table>
</div>