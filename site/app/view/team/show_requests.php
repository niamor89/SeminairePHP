<div id="showrequests">
	<table border=1>
		<?php 
			foreach($creatortab as $valeur)
			{
			 ?> <tr> 
				<td class="farahavatar"> A </td>
				<td> <div class ="creatorpseudo"> <?php echo $valeur; ?> </div></td>
				<td><div class="jointeambutton" value="create_team" onclick="self.location.href='create_team'"><button>Join Team</button></div>
					<div class="leavequeuebutton" href="leave_queue.php"><button>Leave Queue</button></div></td>
				</tr>
			<?php
			}
			?>
	</table>
</div>
