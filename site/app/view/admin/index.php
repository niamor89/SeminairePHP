<div id="admin">
	<h1>Actions</h1><br/>
	<div id="liste_j" class="button_wooden">Liste de joueurs</div>
	<div id="liste_c" class="button_wooden">Liste de cartes</div>
	<div id="liste_s" class="button_wooden">Liste de serveurs</div>
	<br/><br/>
	<div id="admin_out">
		
	</div>
	<script>
		$("#liste_j").click(function(){
			$.getJSON('/admin/index&liste_j',function(data){
				var out = '<table><tr><td>Pseudo</td><td>Mail</td><td>Admin</td></tr>';
				for(var u in data) out += '<tr><td>'+data[u]['pseudo_Joueur']+'</td><td>'+data[u]['mail_Joueur']+'</td><td>'+(data[u]['is_Admin']==1?'yes':'no')+'</td></tr>';
				out +='</table>';
				$("#admin_out").html(out);
			});
		});
		
		$("#liste_c").click(function(){
			$.getJSON('/admin/index&liste_c',function(data){
				var out = '<table><tr><td>Id</td><td>Nom</td><td>Url</td></tr>';
				for(var u in data) out += '<tr><td>'+data[u]['id_Carte']+'</td><td>'+data[u]['nom_Carte']+'</td><td>'+data[u]['url_Carte']+'</td></tr>';
				out +='</table>';
				$("#admin_out").html(out);
			});
		});
		$("#liste_s").click(function(){
			$.getJSON('/admin/index&liste_s',function(data){
				var out = '<table><tr><td>PID</td><td>Partie</td></tr>';
				for(var u in data) out += '<tr><td>'+data[u]['pid_Server']+'</td><td>'+data[u]['T_Partie_id_Partie']+'</td></tr>';
				out +='</table>';
				$("#admin_out").html(out);
			});
		});
	</script>
</div>