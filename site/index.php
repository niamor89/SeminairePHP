<?php 
include __DIR__.'/app/dal/dal.php';

$context = array();

function render_action($route) {
	
	global $context;
	$actionFile = __DIR__.'/app/module/'.$route.'.php';	
	if (file_exists($actionFile))
		include ($actionFile);
	$viewFile = __DIR__.'/app/view/'.$route.'.php';
	$out = null;
	if (file_exists($viewFile) && !isset($context['no_render']))
	{
  		ob_start();
  		include ($viewFile);
  		$out = ob_get_contents();
  		ob_end_clean();
	}
 	return $out;
}
if($_SERVER['REQUEST_URI']=='/') {
	header("Status: 303 See Other", false, 303);
	header('Location : website/index');
	exit();
}

$out = render_action($_GET['action']);

if (null != $out)
{
?>	

<!-- header part -->
<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="UTF-8"/>
		<title><?php echo $context["title"] ?></title>
		<meta name="keywords" content="Survival Camp, jeu, coop�ration" />
		<meta name="description" content="Survival Camp : Jouez en coop�ration avec vos amis et participez aux tournois pour gagner de l'argent !" />
		
		<link href="/assets/styles/default/style.css" rel="stylesheet" type="text/css" />
		<link href="/assets/styles/default/Farah.css" rel="stylesheet" type="text/css" />
		<link href="/assets/styles/default/RomainN.css" rel="stylesheet" type="text/css" />
		<link href="/assets/styles/default/RomainT.css" rel="stylesheet" type="text/css" />
		<link href="/assets/styles/default/Antoine.css" rel="stylesheet" type="text/css" />
		<link href="/assets/styles/default/Ousmane.css" rel="stylesheet" type="text/css" />
		<link href="/assets/styles/default/Ruslan.css" rel="stylesheet" type="text/css" />
		
		<script src="/assets/js/jquery.js"></script>
		
		<link rel="icon" type="image/png" href="/assets/default/img/favicon.ico" /> 
		<!--[if IE]>
			<link rel="shortcut icon" type="image/x-icon" href="/assets/default/img/favicon.ico" />
		<![endif]-->
	</head>
	<body>
		<div id="page">
			<div id="header">
				<header>
					<div id="logo">
						Logo div
					</div>
					<div id="menu">
						<div id="menu_entries">
							<div class="menu_entry"><img class="menu_icon" id="home"		src="/assets/img/std.png"/><span class="title">Accueil</span></div>
							<div class="menu_entry"><img class="menu_icon" id="new_game"	src="/assets/img/std.png"/><span class="title">Nouvelle Partie</span></div>
							<div class="menu_entry"><img class="menu_icon" id="tournament"	src="/assets/img/std.png"/><span class="title">Tournois</span></div>
							<div class="menu_entry"><img class="menu_icon" id="classment"	src="/assets/img/std.png"/><span class="title">Classement</span></div>
							<div class="menu_entry"><img class="menu_icon" id="shop"		src="/assets/img/std.png"/><span class="title">Boutique</span></div>
							<div class="menu_entry"><img class="menu_icon" id="buy"			src="/assets/img/std.png"/><span class="title">Acheter des SC</span></div>
						</div>
					</div>
					<div id="connection">
						<?php  echo render_action("user/check_log") ?>
					</div>
				</header>
			</div>
			<div class="clear"></div>
			<div id="content">
				<?php echo $out ?>
			</div>
			<div class="clear"></div>
			<div id="footer">
				<footer>
					Copyleft &#169; Survival Camp 2013
				</footer>
			</div>
		</div>
	</body>
</html>
<?php
}
?>
