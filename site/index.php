<?php 
session_start();
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
	if(!file_exists($actionFile) && !file_exists($viewFile)) {
		header("Status: 303 See Other", false, 303);
		header('Location : /website/404');
		exit();
	}
 	return $out;
}
if($_SERVER['REQUEST_URI']=='/') {
	header("Status: 303 See Other", false, 303);
	header('Location : /website/index');
	exit();
}

include __DIR__.'/app/dal/dal.php';
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
		<meta name="keywords" content="Survival Camp, jeu, coopération" />
		<meta name="description" content="Survival Camp : Jouez en coopération avec vos amis et participez aux tournois pour gagner de l'argent !" />
		
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
						<img class="logo" ALIGN="center" src="/assets/img/Feu de camp.png"/>
					</div>
					<div id="menu">
						<nav>
							<div id="menu_entries">
								<a href="/website/index"><div class="menu_entry"><img class="menu_icon" id="home"		src="/assets/img/std.png"/><span class="title">Accueil</span></div></a>
								<a href="/session/start">	<div class="menu_entry"><img class="menu_icon" id="new_game"	src="/assets/img/std.png"/><span class="title">Nouvelle Partie</span></div></a>
								<a href="/tournament/show"><div class="menu_entry"><img class="menu_icon" id="tournament"	src="/assets/img/std.png"/><span class="title">Tournois</span></div></a>
								<a href="/tournament/scores"><div class="menu_entry"><img class="menu_icon" id="classment"	src="/assets/img/std.png"/><span class="title">Classement</span></div></a>
								<a href="/shop/get"><div class="menu_entry"><img class="menu_icon" id="shop"		src="/assets/img/std.png"/><span class="title">Boutique</span></div></a>
								<a href="/currency/get"><div class="menu_entry"><img class="menu_icon" id="buy"			src="/assets/img/std.png"/><span class="title">Acheter des SC</span></div></a>
							</div>
						</nav>
					</div>
					<div id="connection">
						<?php
							//Check connection status
							if(isset($_POST["f_login_submit"])) {
								if (login($_POST["f_login_pseudo"], $_POST["f_login_password"])) {
									echo render_action("user/logout");
								}else{
									$context["connection_attempt"] = 1;
									echo render_action("user/login");
								}
							} else {
								echo render_action("user/check_log");
							}
						?>
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
