<?php 
$context = array();

function render_action($route) {
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
	header('Location : home/show');
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
		<meta name="keywords" content="Survival Camp, jeu, coopération" />
		<meta name="description" content="Survival Camp : Jouez en coopération avec vos amis et participez aux tournois pour gagner de l'argent !" />
		
		<link href="/assets/styles/default/style.css" rel="stylesheet" type="text/css" />
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		
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
						
					</div>
					<div id="menu">
						<nav>
							<ul>
								<li><img src=""/>XXXX<span class="title">Accueil</span></li>
								<li><img src=""/>XXXX<span class="title">Nouvelle Partie</span></li>
								<li><img src=""/>XXXX<span class="title">Tournois</span></li>
								<li><img src=""/>XXXX<span class="title">Classement</span></li>
								<li><img src=""/>XXXX<span class="title">Boutique</span></li>
								<li><img src=""/>XXXX<span class="title">Acheter des SC</span></li>
							</ul>
						</nav>
					</div>
					<div id="connection">
						
					</div>
				</header>
			</div>
			<div class="clear"></div>
			<div id="content">
				<?php echo render_action('home/show') ?>
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
