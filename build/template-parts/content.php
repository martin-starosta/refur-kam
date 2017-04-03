<?php
/**
 * Template part for displaying posts.
 *
 * @package refur
 */

$post_id = get_the_ID();
$customers = wp_get_post_terms( $post_id, 'customers' );

$path_images = get_template_directory_uri() . '/images/';
if( count( $customers ) > 0 ) {
	$customer_id = $customers[0]->term_id;
	$customer_name = strtolower( $customers[0]->name );
	$customer_image = $path_images . esc_html( $customer_name ) . '.jpg';
} else {
	$customer_id = -1;
	$customer_name = '';
	$customer_image = $path_images . 'default-customer.jpg';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'is-loop' ); ?>>
<div class="card">
	<div class="card-image">
		<a href="<?php echo esc_html( get_post_permalink( $post_id ) ); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'medium_large', array(
				'class' => 'alignleft',
				'title' => 'Prečítať článok' . get_the_title(),
				'alt' => 'Úvodný obrázok k článku ' . get_the_title(),
			) ); ?>
		<?php else : ?>
			<img src="<?php echo esc_html( $customer_image ); ?>" title="Prečítať článok <?php echo the_title(); ?>" alt="Úvodný obrázok k článku <?php echo the_title(); ?>" />
		<?php endif; ?>
		</a>
	</div>
	<div class="card-body">
		<div class="author-wrapper">
			<a class="post-author" title="Kliknutím zobrazíte články tohto autora" href="?author=<?php the_author_meta( 'ID' ); ?>"><?php echo get_the_author(); ?></a>
		</div>
		<header class="entry-header">
			<h1 class="card-title"><?php the_title( ); ?></h1>
		</header><!-- .entry-header -->
	<div class="entry-content">
		<?php refur_blog_content(); ?>
	</div><!-- .entry-content -->
	<p class="variation-a"><a class="suit_and_tie" href="<?php echo esc_html( get_post_permalink( $post_id ) ); ?>">Prečítať článok</a></p>
	<div class="card-footer">	
		<div class="card-footer-meta flex flex-row">
			<?php if ( strlen( $customer_name ) > 0 ) : ?>
			<div class="customer">
				<a class="capitalize" href="<?php echo esc_html( add_parameter_to_permalink( 'customer' , $customer_id, get_current_url() ) );?>"
					title="Kliknutím zobrazíte príspevky len pre túto kategóriu.">
					<i class="fa fa-tag" aria-hidden="true"></i>
					<?php echo esc_html( $customer_name ) ?>
				</a>
			</div>
			<?php else : ?>
				<i class="fa fa-tag" aria-hidden="true"></i>
				&nbsp;Nezaradené
			<?php endif; ?>
		</div>
	</div>
	<div class="card-footer">
		<?php the_date('F d, Y', '<p class="post-date">', '</p>'); ?>
	</div>
	</div>
</div>
</a>
</article><!-- #post-## -->
