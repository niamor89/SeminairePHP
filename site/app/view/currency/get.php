<?php if ($display_currency_get = 1) { ?>

	<p><b>View currency/get</b></p>
	<?php if ($is_admin == 1) { ?>
		<a href="/currency/add">Ajouter</a>
	<?php } ?>
	<a href="/currency/revert">Convertir vos SC</a>
	<table border="1">
		<?php foreach ($currency_get_contentlist as $row) { ?>
			<tr>
				<?php foreach ($row as $value) { ?>
					<td><?php echo $value ?></td>
				<?php } ?>
				<td><a href="/currency/buy&id=<?php echo rand(1,100) ?>">Acheter</a></td>
				<?php if ($is_admin == 1) { ?>
					<td><a href="/currency/edit&id=<?php echo rand(1,100) ?>">Modifier</a></td>
					<td><a href="/currency/delete&id=<?php echo rand(1,100) ?>">Supprimer</a></td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>
<?php } ?>
