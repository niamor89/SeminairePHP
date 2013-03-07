
<!--
        <ul class="index_diaporama">
            <li><img src="/assets/img/maquette1_mini.png" alt="Image 1" /></li>
            <li><img src="/assets/img/maquette1.png" alt="Image 2" /></li>
            <li><img src="/assets/img/map.png" alt="Image 3" /></li>
            <li><img src="/assets/img/maquette1_mini.png" alt="Image 4" /></li>
        </ul>



<div id=index_img_left>
	<figure id="index_img_small" >
	    <img src="/assets/img/maquette1_mini.png" alt="Maquette" />
	    <img src="/assets/img/maquette1_mini.png" alt="Maquette" />
	    <img src="/assets/img/maquette1_mini.png" alt="Maquette" />
	</figure>
</div>


<div id=index_img_right>
	<figure id="index_img_big">
	    <img src="/assets/img/map.png" alt="Maquette" />
	    <figcaption>Voici notre première maquette</figcaption>
	</figure>
</div>
-->

<script>
	var index_assoc = [['/assets/img/map_mini.png','/assets/img/map.png'],
			['/assets/img/map2_mini.png','/assets/img/map2.png'],
			['/assets/img/map3_mini.png','/assets/img/map3.png']];
	$(function(){
		$('#index_zoom img:gt(0)').fadeOut();
		$('#index_menu img').each(function() {
			$(this).on('click',function(){
				var j;
				for(j=0;j<index_assoc.length;j++)
					if(index_assoc[j][0]==$(this).attr('src'))
					{
						$('#index_zoom img').fadeOut();
						$('#index_zoom img[src="'+index_assoc[j][1]+'"]').fadeIn(1000);
						break;
					}
			});
		});
		
	});
</script>
		
<div id="index_main">
	<div id="index_menu">
		<img src="/assets/img/map_mini.png"/>
		<img src="/assets/img/map2_mini.png"/>
		<img src="/assets/img/map3_mini.png"/>
	</div>
	<div id="index_zoom">
		<img src="/assets/img/map.png"/>
		<img src="/assets/img/map2.png"/>
		<img src="/assets/img/map3.png"/>
	</div>
</div>

<div>
	<p id="index_description">
		<i>Survival Camp</i> est un jeu de survie en temps réel. <br/><br/>
		<i>Survival Camp</i> se positionne auprès des joueurs à la recherche d'un jeu original, coopératif et  accessible depuis un navigateur. Il permet par ailleurs aux joueurs de gagner de l'argent en participant aux tournois.<br/><br/>
		<i>Survival Camp</i> se déroule sur une carte dédié à une équipe de 5 personnes. Cette équipe devra s'organiser pour que tous les membres puissent survivre dans un milieu hostile. Il leur faudra gérer, la faim, la maladie et l'état physiologique. Ils ont à leurs dispositions différentes ressources qui leur permettront d'une part : construire des bâtiments nécessaires à l'avancement dans le jeu, d'autre part : fabriquer les outils et objets nécessaires à la survie.<br/><br/>
		Tentez l'aventure avec vos amis ! Participez aux tournois et gagnez de l'argent !
	</p>
</div>