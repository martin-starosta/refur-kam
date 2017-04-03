<?php

$segments = get_terms( 'segments', array(
	'hide_empty' => false,
	'orderby' => 'count',
	'order' => 'DESC',
) );
?>

<h3>Segmenty</h3>
<ul class="list-group">
<?php foreach( $segments as $segment ) : ?>
	<?php $active_class = ( $segment->term_id == get_query_var( 'segment', false ) ) ? 'active' : ''; ?>
	<li class="list-group-item <?php echo esc_html( $active_class ); ?>">
		<a href="<?php echo esc_html( add_parameter_to_permalink( 'segment', $segment->term_id ) ); ?>"><?php echo esc_html( $segment->name ); ?></a><span class="badge"><?php echo esc_html( $segment->count ); ?></span>
	</li>
<?php endforeach; ?>
</ul>

<?php

$customers = get_terms( 'customers', array(
	'hide_empty' => true,
	'orderby' => 'count',
	'order' => 'DESC',
) );
?>

<h3>Zákazníci</h3>
<div class="list-group">
<?php foreach( $customers as $customer ) : ?>
	<?php $active_class = ( $customer->term_id == get_query_var( 'customer', false ) ) ? 'active' : ''; ?>
		<a class="list-group-item <?php echo esc_html( $active_class ); ?>" 
			href="<?php echo esc_html( add_parameter_to_permalink( 'customer', $customer->term_id ) ); ?>">
				<?php echo esc_html( $customer->name ); ?><span class="badge"><?php echo esc_html( $customer->count ); ?></span>
		</a>
<?php endforeach; ?>
</div>