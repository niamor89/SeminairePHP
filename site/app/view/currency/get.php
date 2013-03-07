<?php $i = 1; if ($display_currency_get = 1) { ?>

	<p><b>View currency/get</b></p>
	<?php if ($is_admin == 1) { ?>
		<a href="/currency/add">Ajouter</a>
	<?php } ?>
	<table border="1">
		<?php foreach ($currency_get_contentlist as $row) { ?>
			<tr>
				<?php foreach ($row as $value) { ?>
					<td><?php echo $value ?></td>
				<?php } ?>
				<?php if ($is_admin == 1) { ?>
					<td><a href="/currency/edit&id=<?php echo $i++; ?>">Modifier</a></td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>
<?php } ?>
