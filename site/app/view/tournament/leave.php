<div class="tour_leave">
<?php
	if(isset($left))
	{
	echo"You have succesffuly left the tournament.";
	}
	if(!(isset($_POST['leave'])))
	{
	?>
			<table border="1px" width="100%" height="100%">
				<tr>
					<td width="200px" height="75px">
						YOUR TEAM
					</td>
					<td align="Center">
						<table border="1px" width="100%" height="100%">
							<tr>
								<td><img src="/assets/img/pic.jpg" width="50" height="75"></td>
								<td><img src="/assets/img/pic.jpg" width="50" height="75"></td>
								<td><img src="/assets/img/pic.jpg" width="50" height="75"></td>
								<td><img src="/assets/img/pic.jpg" width="50" height="75"></td>
								<td><img src="/assets/img/pic.jpg" width="50" height="75"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="100px">
					Note!
					</td>
					<td align="right">
						<form action="/tournament/leave" method="post"> 
							<input type="submit" class="button_wooden" name="leave" value="Leave" /> 
						</form>
					</td>
				</tr>
			</table>
		<?php } ?>
</div>