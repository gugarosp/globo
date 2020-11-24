<?php
get_header();

function listaNoticias ($tituloPost, $tipoPost) {
	$query = new WP_Query( array("post_type" => $tipoPost));
?>
	<h1><?php echo $tituloPost; ?></h1>
<?php 
	while ($query->have_posts()) : $query->the_post();
?>
	<div>
		<h3><?php the_title(); ?></h3>
		<?php the_content(); ?>
	</div>
<?php 
	endwhile;
}
?>


<main>

	<section id="colunas">
		<div>
			<?php listaNoticias("G1", "g1"); ?>
		</div>

		<div>
			<?php listaNoticias("Ge", "ge"); ?>
		</div>

		<div>
			<?php listaNoticias("Gshow", "gshow"); ?>
		</div>

	</section>

	<section>
		<div>
			<?php listaNoticias("Techtudo", "techtudo"); ?>
		</div>

	</section>

</main>

<?php
get_footer();
?>