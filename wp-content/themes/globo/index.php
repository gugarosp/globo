<?php
	// Título da página inicial
	$GLOBALS["titulo"] = get_bloginfo()." - ".get_bloginfo("description");

	// Mostra o cabeçalho
	get_header();
?>

<?php
	// Função para listar as notícias de cada seção na página inicial
	function listaNoticias ($tituloPost, $tipoPost) {
		$buscaNoticias = new WP_Query(array("post_type" => $tipoPost));
?>
		<h1><?php echo $tituloPost; ?></h1>
<?php 
		while ($buscaNoticias->have_posts()) : $buscaNoticias->the_post();
?>
		<div>
			<h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php the_content(); ?>
		</div>
<?php 
		endwhile;
	}
?>

	<section id="capa-colunas">
		<div id="capa-g1">
			<?php listaNoticias("G1", "g1"); ?>
		</div>

		<div id="capa-g2">
			<?php listaNoticias("Ge", "ge"); ?>
		</div>

		<div id="capa-gshow">
			<?php listaNoticias("Gshow", "gshow"); ?>
		</div>
	</section>

	<section>
		<div id="capa-g1">
			<?php listaNoticias("Techtudo", "techtudo"); ?>
		</div>
	</section>

<?php
	// Mostra o rodapé
	get_footer();
?>