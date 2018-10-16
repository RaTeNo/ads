<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<a href="<?php the_permalink(); ?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>

		<div class="entry-meta">

			<?php //understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
		<div class="container container-margin">
			<div class="row">
			   <div class="col-sm">Площадь</div>
			   <div class="col-sm"><?php the_field("plosh"); ?></div>
			</div>
			<div class="row">
			   <div class="col-sm">Стоимость</div>
			   <div class="col-sm"><?php the_field("price"); ?></div>
			</div>
			<div class="row">
			   <div class="col-sm">Адрес</div>
			   <div class="col-sm"><?php the_field("adres"); ?></div>
			</div>
			<div class="row">
			   <div class="col-sm">Жилая площадь</div>
			   <div class="col-sm"><?php the_field("jil_plosh"); ?></div>
			</div>
			<div class="row">
			   <div class="col-sm">Этаж</div>
			   <div class="col-sm"><?php the_field("etaj"); ?></div>
			</div>
			<div class="row">
			   <div class="col-sm">Город</div>
			   <div class="col-sm">
			   <?php $city = get_field('s_city');  if($city) : ?>		
					<a href="<?php echo get_permalink($city[0]); ?>"><?php echo get_the_title($city[0]); ?></a>
			   <?php  endif; ?>
			   </div>
			</div>
		</div>


		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
