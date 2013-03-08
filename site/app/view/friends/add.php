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
	
	function okrequest()
	{
		resultat = alert('A request was sent');
		if(resultat =="1")
		{ 
			//window.history.go(); 
		}
	} 
</script>

<?php global $tab;
$tab = farah_register_function();
?>

<div id="addfriend">
	<div id="searchbar">
			<form method="POST" action="add" name="monform">
			<input type="text" name="search" id="searching"/>
			<button>Search</button>
	</div>
	<div id="searchfriend">
		<table border=1>
			<?php 
				foreach($tab as $joueur)
				{?> 
				<tr> 
					<td class="farahavatar"> A </td>
					<td> <div id ="joueur" class ="findPseudo" ><?php echo $joueur["pseudo_Joueur"]; ?></div></td>
					<td><div class="addbutton" onclick="okrequest(); javascript:visibilite('joueur'); return true;"><button>Add Friend</button></div></td>
				</tr>
				<?php
				}
				?>
		</table>
	</div>
</div>