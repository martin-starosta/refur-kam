<?php
    $customer = get_term( $post_customer_filter, 'customers' );
?>

<div class="row customer-info">
    <div class="col-lg-12 col-xs-12">
        <h2>Príspevky z ketegórie: <?php echo esc_html( $customer->name ); ?></h2>

        <p>
            <a class="btn btn-default" href="<?php echo clear_filter_var_from_url( get_current_url(), 'customer'); ?>" role="button">Zobraziť všetky príspevky</a>
        </p>
    </div>
</div>