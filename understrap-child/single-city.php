<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">

							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>							

						</header><!-- .entry-header -->

						<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
						
						<div class="entry-content">
							<?php the_content(); ?>						

						</div><!-- .entry-content -->
						
						<h2>Последние объекты</h2>
						<div class="container list_object">
							<?php $args = array( 'posts_per_page' => 10, 'post_type' =>'estate', 'meta_key' => 's_city', 'meta_value' => $post->ID, 'meta_compare' => 'LIKE' );   $query1 = new WP_Query($args);
							while($query1->have_posts()) {$query1->the_post(); ?>	
							<div class="row">
							   <div class="col-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
							</div>	
							<?php } wp_reset_postdata(); ?>
						</div>

						<footer class="entry-footer">

							<?php understrap_entry_footer(); ?>

						</footer><!-- .entry-footer -->

					</article><!-- #post-## -->
		
			
				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
