<?php if ($display_shop_get = 1) { ?>

	<?php if ($is_admin == 1) { ?>
		<a href="/shop/add">Ajouter</a>
	<?php } ?>
	
	<table id="shop_bufftab">
		<?php foreach ($shop_get_bufflist as $row) { ?>
			<tr>
				<td><?php echo $row["nom_Produit"] ?></td>
				<td><?php echo $row["prix_Produit"] ?></td>
				<td><a href="/shop/buy&shop_buy_item_id=<?php echo$row["id_Produit"] ?>">Acheter</a></td>
				<?php if ($is_admin == 1) { ?>
					<td><a href="/shop/delete&shop_delete_item_id=<?php echo$row["id_Produit"] ?>">Supprimer</a></td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>
	
<?php } ?>
