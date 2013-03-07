	
	<p><b>View currency/edit</b></p>
	
	<?php if ($display_currency_edit_form == 1) { ?>
		<form method="post" action "/currency/edit" >
			<div id="currency_edit_pack">
				<input type="hidden" name="f_currency_edit_pack_id" value=<?php echo $currency_edit_id ?>/>
				<div id="currency_edit_pack_image">Image: <?php echo $currency_edit_image ?> <input type="file" name="f_currency_edit_pack_image"/></div>
				<div id="currency_edit_pack_name">Nom: <?php echo $currency_edit_name ?> <input type="text" name="f_currency_edit_pack_name"/></div>
				<div id="currency_edit_pack_price">Prix: <?php echo $currency_edit_price ?> <input type="text" name="f_currency_edit_price"/></div>
				<input type="submit" name="f_currency_edit_pack_submit" value="Modifier"/>
			</div>
		</form>
	<?php } ?>

	<?php if ($display_currency_edit_success == 1) { ?>
		<p>Modification reussie</p>
	<?php } ?>
	
	<?php if ($display_currency_edit_fail == 1) { ?>
		<p>Modification echouee</p>
	<?php } ?>
		
		
		