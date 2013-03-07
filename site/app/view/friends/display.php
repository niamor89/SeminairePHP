<?php if ( empty($friendtab) )
		{
			echo '<div><label> Your friend list is empty </label></div>';
		}
else
{?>
<div id="displayfriend">
	<div id="friendlist"><label> Friends list </label></div>
	<table border=1>
		<?php 
			foreach($friendtab as $valeur)
			{
			 ?> <tr> 
					<td class="farahavatar"> A </td>
					<td> <div class ="displaypseudo"> <?php echo $valeur; $i++; ?> </div></td>
					<td><div class="removebutton"><?php $removebutton = "Remove friend";?>
						<script language="Javascript">
							function ok()
							{
								resultat=window.confirm('Are you sure to delete this friend ?');
								if(resultat =="1")
								{
									window.history.go()
								}
							}
						</script>
						<button href="display.php" onclick="ok()"> 	
						<?php echo $removebutton;?></button></div></td>
				</tr>		
		<?php } ?>
	</table>
</div>
<?php } ?>
