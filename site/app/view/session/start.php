<div id="session_loading"><img src="/assets/img/loading.gif"/><br/>Loading ...</div>
<div id="session">
	<div id="session_start" class="button_wooden">
		Nouvelle partie
	</div>
</div>
<script>
	$('#session_start').click(function (){
		//$.get('/session/start');
		$('#session_loading').show();
	});
</script>