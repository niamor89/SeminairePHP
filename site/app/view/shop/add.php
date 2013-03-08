		
	<?php if ($display_shop_add_form == 1) { ?>
		<form method="post" action "/shop/add" >
			<div id="shop_add_form">
				<div id="shop_add_name">Nom:  <input type="text" name="f_shop_add_name"/></div>
				<div id="shop_add_price">Prix:  <input type="text" name="f_shop_add_price"/></div>
				<input type="submit" name="f_shop_add_submit" value="Ajouter"/>
			</div>
		</form>
	<?php } ?>

	<?php if ($display_shop_add_success == 1) { ?>
		<p>Ajout reussi</p>
	<?php } ?>
	
	<?php if ($display_shop_add_fail == 1) { ?>
		<p>Ajout echoue</p>
	<?php } ?>		