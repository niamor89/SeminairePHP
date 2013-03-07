<?php if ($display_shop_get = 1) { ?>

	<p><b>View shop/get</b></p>
	
	<?php if ($is_admin == 1) { ?>
		<a href="/shop/add">Ajouter</a>
	<?php } ?>
	
	<button id="shop_but_itemtab">Objets</button>
	<button id="shop_but_bufftab">Buffs</button>
	
	<table id="shop_itemtab">
		<?php foreach ($shop_get_itemlist as $row) { ?>
			<tr>
				<?php foreach ($row as $value) { ?>
					<td><?php echo $value ?></td>
				<?php } ?>
				<td><a href="/shop/buy&id=<?php echo rand(1,100) ?>">Acheter</a></td>
				<?php if ($is_admin == 1) { ?>
					<td><a href="/shop/edit&id=<?php echo rand(1,100) ?>">Modifier</a></td>
					<td><a href="/shop/delete&id=<?php echo rand(1,100) ?>">Supprimer</a></td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>
	
	<table id="shop_bufftab">
		<?php foreach ($shop_get_bufflist as $row) { ?>
			<tr>
				<?php foreach ($row as $value) { ?>
					<td><?php echo $value ?></td>
				<?php } ?>
				<td><a href="/shop/buy&id=<?php echo rand(1,100) ?>">Acheter</a></td>
				<?php if ($is_admin == 1) { ?>
					<td><a href="/shop/edit&id=<?php echo rand(1,100) ?>">Modifier</a></td>
					<td><a href="/shop/delete&id=<?php echo rand(1,100) ?>">Supprimer</a></td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>
	
	<script language="javascript">
		
		var item_tab = document.getElementById("shop_itemtab");
		var buff_tab = document.getElementById("shop_bufftab");
		
		function show_item_tab(){
			buff_tab.style.display = "none";
			item_tab.style.display = "inline";
		}
		
		function show_buff_tab(){
			buff_tab.style.display = "inline";
			item_tab.style.display = "none";
		}
	
		document.getElementById("shop_but_itemtab").addEventListener("click",show_item_tab,false);
		document.getElementById("shop_but_bufftab").addEventListener("click",show_buff_tab,false);
	
	</script>
	
	
	
<?php } ?>
