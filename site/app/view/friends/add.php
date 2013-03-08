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
		window.stop();  
	}
	
	
	function reloadpage()
	{	
		window.location.reload();
	}
</script>


<div id="addfriend">
	<div id="searchbar">
			<form method="POST" action="/friends/add">
				<input type="text" name="search" id="searching"/>
				<input type ="submit" name ="friends_research" class="button_wooden" value="Search">
			</form>			
	</div>
	
	<div id="searchfriend">
			<?php
				if (isset($friend)) {
					if ($friend != -1) {
					?>
								<table border=1>
								<tr> 
									<td class="farahavatar"> A </td>
									<td> <div id ="joueur" class ="findPseudo" > <?php echo $friend->pseudo_Joueur ?> </div></td>
									<td><div class="addbutton" onclick="okrequest();"><button>Add Friend</button></div></td>
								</tr>
								</table>
					<?php 
						} else {
						echo ('Joueur non trouvé');
					}
				}
			?>				
	</div>
</div>