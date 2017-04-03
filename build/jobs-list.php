<?php
/**
 * Template Name: Jobs listing page
 *
 * @package refur
 */

get_header(); ?>

	<div id="primary" class="content-area col-xs-12">
		<main id="main" class="site-main" role="main">
		<?php
		$args = array(
			'posts_per_page' => 25,
			'offset'           => 0,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'jobs',
			'post_status'      => 'publish',
			'suppress_filters' => true,
		);

		$job_category_filter = get_query_var( 'job_category', false );
		if ( $job_category_filter ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'job_category',
					'field' => 'term_id',
					'terms' => urldecode( $job_category_filter ),
				),
			);
		}

		$jobs_array = get_posts( $args );
		?>

		<div class="intro-text row">
			<div class="col-lg-12 col-xs-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<h2><?php echo the_title(); ?></h2>
					<?php echo the_content(); ?>
			<?php endwhile; // End of the loop. ?>
			</div>
		</div><!-- .intro-text -->

		<div class="row">
		<div class="col-lg-8">
		<?php foreach ( $jobs_array as $job ) : ?>
			<div class="job-list list-group">
				<a href="<?php echo esc_html( get_post_meta( $job->ID, 'url', true ) ); ?>" target="_blank" class="list-group-item">
					<h4 class="list-group-item-heading"><?php echo esc_html( $job->post_title ); ?></h4>

					<?php foreach ( get_the_terms( $job->ID, 'job_category' ) as $category ) : ?>
						<span class="badge bg-red"><?php echo esc_html( $category->name ) ?></span>
					<?php endforeach; ?>

					<p class="list-group-item-text">
						<?php echo esc_html( get_post_meta( $job->ID, 'company', true ) ); ?><br/>
						<span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html( get_post_meta( $job->ID, 'location', true ) ); ?></span><br/>
						<span title="Publikované dňa"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> <?php echo get_the_date( 'd. M. Y', $job->ID ) ?></span>
					</p>
				</a>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="col-lg-4">
			<h3>Filtrovať podľa kategórie</h3>
			<?php getTermsList( 'job_category' ) ?>
		</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
