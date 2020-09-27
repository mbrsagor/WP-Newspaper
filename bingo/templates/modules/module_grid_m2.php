<?php
/** -------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * render post gird m9
 */
if ( ! function_exists( 'bingo_ruby_post_grid_m2' ) ) {
	function bingo_ruby_post_grid_m2( $options = array() ) {

		$classes   = array();
		$classes[] = 'post-wrap post-grid-m2';
		if ( ! empty( $options['block_style'] ) && 'dark' == $options['block_style'] ) {
			$classes[] = 'is-light-text is-dark-post';
		}

		$classes = implode( ' ', $classes );

		$str = '';
		$str .= '<article class="' . esc_attr( $classes ) . '">';

		$str .= '<div class="post-header">';
		//render thumbnail
		if ( has_post_thumbnail() ) {
            $smooth_style = bingo_ruby_check_smooth_style();
            if ( empty( $smooth_style ) ) {
                $str .= '<div class="post-thumb-outer">';
            } else {
                $str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
            }
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_540x370' );
			$str .= bingo_ruby_post_cat_info( 'is-absolute is-light-text' );
			$str .= bingo_ruby_post_format( 'is-absolute is-top-format' );
			$str .= '</div>';
		}
		$str .= '</div><!-- post header-->';

		$str .= '<div class="post-body">';
		$str .= bingo_ruby_post_title( 'is-size-5' );
		$str .= '</div><!-- post body-->';

		$str .= '</article>';

		return $str;
	}
}


