<h1>
	<?php 
	print $node->title;
	?>
</h1>

<nav id="menu_prpoyecto">
	<li data-elemento="secDocumentos">
		<img src="/images/icon-documents.png" alt="">
		<span>Documentos</span>
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit.
		</p>
	</li>

	<li data-elemento="secImagenes">
		<img src="/images/logo-imagenes.png" alt="">
		<span>Imágenes</span>
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit.
		</p>
	</li>

	<li data-elemento="secVideos">
		<img src="/images/logo-vieos.png" alt="">
		<span>Videos</span>
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit.
		</p>
	</li>
</nav>

<h3 id="secDocumentos">Documentos</h3>

<?php print views_get_view('_enma_page_portfolio')->preview('block_1');?>

<h3 id="secImagenes">Imágenes</h3>

<?php print views_get_view('_enma_page_portfolio')->preview('block_1');?>

<h3 id="secVideos">Videos</h3>

<?php print views_get_view('_enma_page_portfolio')->preview('block_1');?>

<script>
	$(document).ready(function(){
		$("#menu_prpoyecto li").click(function(){
			altura=$(this).attr("data-elemento");		
			altura=$("#"+altura).offset().top;
			
			$('html, body').animate({scrollTop: altura-100}, 500);
			
		});
	})

</script>