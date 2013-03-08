<div id="admin">
	<h1>Actions</h1><br/>
	<div id="liste_j" class="button_wooden">Liste de joueurs</div>
	<div id="liste_c" class="button_wooden">Liste de cartes</div>
	<div id="liste_s" class="button_wooden">Liste de serveurs</div><br/>
	<div id="liste_p" class="button_wooden">Liste de produits</div>
	<div id="liste_sc" class="button_wooden">Liste de achats SC</div>
	<div id="liste_com" class="button_wooden">Liste de commandes</div>
	<br/><br/>
	<div id="admin_out">
		
	</div>
	<script>
		$("#liste_j").click(function(){
			$.getJSON('/admin/index&liste_j',function(data){
				var out = '<table class="admin_table"><tr><td>Pseudo</td><td>Mail</td><td>Admin</td></tr>';
				for(var u in data) out += '<tr><td>'+data[u]['pseudo_Joueur']+'</td><td>'+data[u]['mail_Joueur']+'</td><td>'+(data[u]['is_Admin']==1?'yes':'no')+'</td></tr>';
				out +='</table>';
				$("#admin_out").html(out);
			});
		});
		
		$("#liste_c").click(function(){
			$.getJSON('/admin/index&liste_c',function(data){
				var out = '<table class="admin_table"><tr><td>Id</td><td>Nom</td><td>Url</td></tr>';
				for(var u in data) out += '<tr><td>'+data[u]['id_Carte']+'</td><td>'+data[u]['nom_Carte']+'</td><td>'+data[u]['url_Carte']+'</td></tr>';
				out +='</table>';
				$("#admin_out").html(out);
			});
		});
		$("#liste_s").click(function(){
			$.getJSON('/admin/index&liste_s',function(data){
				var out = '<table class="admin_table"><tr><td>PID</td><td>Partie</td></tr>';
				for(var u in data) out += '<tr><td>'+data[u]['pid_Server']+'</td><td>'+data[u]['T_Partie_id_Partie']+'</td></tr>';
				out +='</table>';
				$("#admin_out").html(out);
			});
		});
		$("#liste_p").click(function(){
			$.getJSON('/admin/index&liste_p',function(data){
				var out = '<table class="admin_table"><tr><td>Nom</td><td>Prix</td></tr>';
				for(var u in data) out += '<tr><td>'+data[u]['nom_Produit']+'</td><td>'+data[u]['prix_Produit']+'</td></tr>';
				out +='</table>';
				$("#admin_out").html(out);
			});
		});
		$("#liste_sc").click(function(){
			$.getJSON('/admin/index&liste_sc',function(data){
				var out = '<table class="admin_table"><tr><td>Joueur</td><td>Date</td><td>Montant SC</td><td>Montant Euros</td><td>Code validation</td></tr>';
				for(var u in data) out += '<tr><td>'+data[u]['pseudo_joueur']+'</td><td>'+data[u]['date_achat_sc']+'</td><td>'+data[u]['montant_sc']+'</td><td>'+data[u]['montant_euros']+'</td><td>'+data[u]['code_validation']+'</td></tr>';
				out +='</table>';
				$("#admin_out").html(out);
			});
		});
		$("#liste_com").click(function(){
			$.getJSON('/admin/index&liste_com',function(data){
				var out = '<table class="admin_table"><tr><td>Joueur</td><td>Produit</td><td>Date</td></tr>';
				for(var u in data) out += '<tr><td>'+data[u]['pseudo_joueur']+'</td><td>'+data[u]['date_commande']+'</td><td>'+data[u]['nom_produit']+'</td></tr>';
				out +='</table>';
				$("#admin_out").html(out);
			});
		});
	</script>
</div>