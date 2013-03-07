	
	<p><b>View currency/add</b></p>
	
	<?php if ($display_currency_add_form == 1) { ?>
		<form method="post" action "/currency/add" >
			<div id="currency_add_pack">
				<div id="currency_add_pack_image">Image: <input type="file" name="f_currency_edit_pack_image"/></div>
				<div id="currency_add_pack_name">Nom:  <input type="text" name="f_currency_edit_pack_name"/></div>
				<div id="currency_add_pack_price">Prix:  <input type="text" name="f_currency_edit_price"/></div>
				<input type="submit" name="f_currency_add_pack_submit" value="Ajouter"/>
			</div>
		</form>
	<?php } ?>

	<?php if ($display_currency_add_success == 1) { ?>
		<p>Ajout reussi</p>
	<?php } ?>
	
	<?php if ($display_currency_add_fail == 1) { ?>
		<p>Ajout echoue</p>
	<?php } ?>		