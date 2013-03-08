<script language="Javascript">	
function visibilite(thingId)
	{
		var targetElement;
		targetElement = document.getElementById(thingId) ;
		if (targetElement.style.display == "none")
		{
			targetElement.style.display = "" ;
		} 
		else 
		{
			targetElement.style.display = "none" ;
		}
	}
		
	function okremove() 
	{
		resultat=window.confirm('Are you sure to delete this friend ?');
		if(resultat =="1")
		{
			window.history.go()
		}
	} 
</script>

<div id="friendlist"><label> Friends list </label></div>

<?php 

	global $tab;
	$tab = farah_register_function();
	
	if ( empty($tab) )
			{
				echo '<div><label> Your friend list is empty </label></div>';
			}
	else
	{
?>
			
<div id="displayfriend">
	<table border=1>
		<?php
			foreach($tab as $joueur)
			{?>
			<tr> 
				<td class="farahavatar"> A </td>
				<td> <div class ="displaypseudo"></div><?php echo $joueur["pseudo_Joueur"]; ?> </td>
				<td><div class="removebutton"><?php $removebutton = "Remove friend";?>
				<button href="display.php" onclick="okremove()"> <?php echo $removebutton;?></button></div></td>
			</tr>
		<?php } ?>			
	</table>
</div>
<?php }?>