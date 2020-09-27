<?php
//check
$bingo_ruby_topbar_cart = bingo_ruby_core::get_option( 'topbar_cart_icon' );
if ( ! class_exists( 'Woocommerce' ) || empty( $bingo_ruby_topbar_cart ) ) {
	return false;
} ?>

<?php if ( ! is_cart() ):
	$bingo_ruby_woo        = bingo_ruby_wc_global_value();
	$bingo_ruby_cart_count = WC()->cart->cart_contents_count;
	?>

	<div class="topbar-cart">
		<a class="cart-icon" href="<?php echo esc_url( wc_get_cart_url() ) ?>" title="<?php esc_attr_e( 'View your shopping cart', 'bingo' ); ?>">
			<i class="fa fa-shopping-bag" aria-hidden="true"></i><span class="cart-counter"><?php echo esc_attr( $bingo_ruby_cart_count ); ?></span>
		</a>

		<div id="ruby-mini-cart" class="mini-cart-wrap">

			<ul class="cart_list product_list_widget">

				<?php if ( ! WC()->cart->is_empty() ) : ?>

					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
							<li class="<?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
								<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									esc_attr__( 'Remove this item', 'bingo' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
								?>
								<?php if ( ! $_product->is_visible() ) : ?>
									<?php echo str_replace( array(
											'http:',
											'https:'
										), '', $thumbnail ) . $product_name . '&nbsp;'; ?>
								<?php else : ?>
									<a href="<?php echo esc_url( $product_permalink ); ?>">
										<?php echo str_replace( array(
												'http:',
												'https:'
											), '', $thumbnail ) . $product_name . '&nbsp;'; ?>
									</a>
								<?php endif; ?>
								<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
							</li>
						<?php
						}
					}
					?>

				<?php else : ?>
					<li class="empty"><?php esc_html_e( 'No products in the cart.', 'bingo' ); ?></li>
				<?php endif; ?>

			</ul>
			<!--  end product list  -->

			<?php if ( ! WC()->cart->is_empty() ) : ?>

				<p class="total"><strong><?php esc_html_e( 'Subtotal', 'bingo' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>
				<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
				<p class="buttons">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button wc-forward"><?php esc_html_e( 'View Cart', 'bingo' ); ?></a>
					<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward"><?php esc_html_e( 'Checkout', 'bingo' ); ?></a>
				</p>

			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>