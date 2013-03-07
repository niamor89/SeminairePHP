<div id="addfriend">
	<div id="searchbar">
			<form method="POST" action="add" name="monform">
			<input type="submit" name="search" id="searching"/>
			<button>Search</button>
	</div>
	<div id="searchfriend">
		<table border=1>
			<?php 
				foreach($searchtab as $valeur)
				{
				 ?> <tr> 
					<td class="farahavatar"> A </td>
					<td> <div class ="findPseudo"><?php echo $valeur; ?></div></td>
					<td><div class="addbutton" onclick="alert('A request was sent');"><button>Add Friend</button></div></td>
					</tr>
				<?php
				}
				?>
		</table>
	</div>
</div>