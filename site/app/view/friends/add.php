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

<?php global $tab;
$tab = farah_register_function();
?>

<div id="addfriend">
	<div id="searchbar">
			<form method="POST" action="/friends/add">
			<input type="text" value="<?php $bar="Friend pseudo"?>" name="search" id="searching"/>
			<button>Search</button>
			
	</div>
	<div id="searchfriend">
			<?php
				global $tmpplayer;

				if (isset($_POST["search"]))
				{
					$searchplayer = $_POST["search"];

					foreach($tab as $joueur)
					{
						foreach($joueur as $k=>$v)
						
						if ($searchplayer == $v)
						{ 
						 
							if ( $tmpplayer != $searchplayer )
							{ 
								$tmpplayer = $searchplayer; ?>				
								<table border=1>
								<tr> 
									<td class="farahavatar"> A </td>
									<td> <div id ="joueur" class ="findPseudo" ><?php echo $searchplayer; ?></div></td>
									<td><div class="addbutton" onclick="okrequest();"><button>Add Friend</button></div></td>
								</tr>
								</table>
							<?php
							}
						}
							
					}
				}
				?>
	</div>
</div>