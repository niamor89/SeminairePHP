
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
				var assoc = [['/assets/img/map_mini.png','/assets/img/map.png'],
						['/assets/img/map2_mini.png','/assets/img/map2.png']
						['/assets/img/map3_mini.png','/assets/img/map3.png']];
	$(function(){
		$('#index_zoom img').fadeOut(1);
		$('#index_menu img').on('click',function(){
			var j;
			for(j=0;j<assoc.length;j++)
				if(assoc[j][0]==$(this).attr('src'))
				{
					$('#index_zoom img').fadeOut();
					$('#index_zoom img[src="'+assoc[j][1]+'"]').fadeIn(1000);
					break;
				}
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
		Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
	</p>
</div>