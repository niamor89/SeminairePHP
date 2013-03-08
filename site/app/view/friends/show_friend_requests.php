<?php global $displaytab;
$displaytab = farah_register_function();
?>

<div id="displayfriend">
	<table border=1>
		<?php 
			foreach($displaytab as $valeur)
			{
			 ?> <tr> 
					<td class="farahavatar"> A </td>
					<td> <div class ="displaypseudo"> <?phpecho $valeur; $i++; ?> </div></td>
					<td><div class="removebutton"><?php $acceptbutton = "Accept";?>
						<script language="Javascript">
							function ok()
							{
								resultat=window.confirm('Accept demand?');
								if(resultat =="1")
								{
									window.history.go()
								}
							}
						</script>
						<button href="display.php" onclick="ok()"> 	
						<?php echo $acceptbutton;?></button></div></td>
				</tr>		
		<?php } ?>
	</table>
</div>