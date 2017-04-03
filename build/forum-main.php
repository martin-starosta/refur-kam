<?php
/**
 * Template Name: Forum - Posts List
 *
 * @package refur
 */

get_header( 'fluid' ); 

$args = array(
	'posts_per_page' => 25,
	'offset'           => 0,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true,
);

$post_customer_filter = get_query_var( 'customer', false );
if ( $post_customer_filter ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'customers',
			'field' => 'term_id',
			'terms' => urldecode( $post_customer_filter ),
		),
	);
}

$post_segment_filter = get_query_var( 'segment', false );
if ( $post_segment_filter ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'segments',
			'field' => 'term_id',
			'terms' => urldecode( $post_segment_filter ),
		),
	);
}

$filtered_posts = get_posts( $args );
?>
<section>
	<?php get_template_part( 'fragments/fragment', 'promo-create-post' ); ?>
</section>

<section class="main-content-space">
	<div class="navigation-drawer col-lg-2 col-xs-12">
		<?php get_template_part( 'fragments/fragment', 'taxonomies-bar' ); ?>
	</div>
	<div class="col-lg-8">
		<?php if ( have_posts() ) : ?>

			<?php if ( $post_customer_filter ) : ?>
				<?php include( locate_template( 'fragments/fragment-customer-information.php', false, false ) ); ?>
			<?php endif; ?>

			<?php get_template_part( 'fragments/fragment', 'search-form' ); ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			
			<div class="posts-listing">
			<?php foreach( $filtered_posts as $post) : setup_postdata( $post ); ?>

				<?php
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endforeach;
			wp_reset_postdata();?>
			</div>
			<?php
				the_posts_pagination(
					array(
						'prev_text' => '<i class="fa fa-angle-double-left"></i>',
						'next_text' => '<i class="fa fa-angle-double-right"></i>',
					)
				);
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
	</div>
</section>
<?php get_footer( 'fluid' ); ?>
