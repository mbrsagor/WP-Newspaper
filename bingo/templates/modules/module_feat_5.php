<?php
if ( ! function_exists( 'bingo_ruby_post_feat_5' ) ) {
	function bingo_ruby_post_feat_5( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-feat-5">';

		$str .= '<div class="post-thumb-outer">';
		if ( has_post_thumbnail() ) {
			$str .= bingo_ruby_post_thumb_overlay();
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_540x370');
            $str .= bingo_ruby_post_format( 'is-absolute is-top-format' );
            $str .= bingo_ruby_post_review_info();
		}
		$str .= '</div>';

		$str .= '<div class="post-header-outer is-header-overlay is-light-text">';
		$str .= '<div class="post-header">';
		$str .= bingo_ruby_post_title( 'is-size-6' );
		$str .= '</div><!-- post header-->';
		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}

