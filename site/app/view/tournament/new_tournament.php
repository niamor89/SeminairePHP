<?php 
global $newtab;

$newtab = farah_register_function();
?>

<script type="text/javascript">
nb_check = 0;
function testcheck(el) 
{

	if( el.checked ) 
	{
		if( nb_check >= 4)
		{
			alert("Only 4 players");
			return false;			
		}
		
		nb_check++;
		return true;
	}
	else 
	{
		nb_check--;
		return true;
	}	
}

function submitplayers()
{	
	window.location.replace("../tournament/validate_team");
}
</script>

<div id="createqueue">
	<table border=1>
		<?php
			foreach($newtab as $valeur)
			{
			 ?> <tr> 
				<td class="farahavatar"> A </td>
				<td> <div class ="queuepseudo"> <?php echo $valeur["pseudo_Joueur"]; ?> </div></td>
				<td><div class="farahcheckbox">
				<input type="checkbox"  onClick="return testcheck(this);"></div></td>
				</tr>
			<?php
			}
			?>
			<input type="submit" value="Submit" onClick="submitplayers();">
	</table>
</div>