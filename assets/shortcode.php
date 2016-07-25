<?php

wp_enqueue_script( 'sly', plugins_url ('/sly-carousel/assets/sly.js'), array('jquery'), '1.6.1', true );
wp_enqueue_script( 'sly-init', plugins_url ('/sly-carousel/assets/sly-init.js'), array('sly'), '1.0', true );
function duck_sly_shortcode( $atts, $content = null, $shortcodename = '' ){

	$attr = shortcode_atts( array(
	       	'title'              => '',
			'frame_height'		 => '500',
			'posts_count'        => 10,
			'post_type'          => 'post',
			'post_status'        => 'publish',
			'visibility_items'   => 5,
			'thumb'              => 'yes',
			'thumb_width'        => 290,
			'thumb_height'       => 220,
			'more_text'   => '',
			'categories'         => '',
			'excerpt_count'      => 15,
			'display_navs'       => 'yes',
			'display_pagination' => 'yes',
			'custom_class'       => '',
		), $atts );

$excerpt_count      = absint( $attr['excerpt_count'] );
$frameheight 		= absint( $attr['frame_height']);
$get_category_type = $attr['post_type'] == 'post' ? 'category' : $attr['post_type'].'_category';
		$categories_ids = array();
		foreach ( explode(',', str_replace(', ', ',', $attr['categories'])) as $category ) {
			$get_cat_id = get_term_by( 'name', $category, $get_category_type );
			if ( $get_cat_id ) {
				$categories_ids[] = $get_cat_id->term_id;
			}
		}
		$get_query_tax = $categories_ids ? 'tax_query' : '';

		// WP_Query arguments
		$args = array(
			'post_status'         => $attr['post_status'],
			'posts_per_page'      => $attr['posts_count'],
			'ignore_sticky_posts' => 1,
			'post_type'           => $attr['post_type'],
			"$get_query_tax"      => array(
				array(
					'taxonomy' => $get_category_type,
					'field'    => 'id',
					'terms'    => $categories_ids
					)
				)
		);

		// The Query
		$carousel_query = new WP_Query( $args );

		if ( $carousel_query->have_posts() ) :
		
		$output = '<div class="wrap">';
		$output .= $attr['title'] ? '<h2>' . $attr['title'] . '</h2>' : '';
        $output .='<div class="frame" id="basic" style="height: '.$frameheight.'px">				
                   	 <ul class="clearfix">'; 
					
				while ( $carousel_query->have_posts() ) : $carousel_query->the_post();
					
					$post_id         = $carousel_query->post->ID;
					$post_link 		 = get_the_permalink();
					$post_title      = esc_html( get_the_title( $post_id ) );
					$post_title_attr = esc_attr( strip_tags( get_the_title( $post_id ) ) );
					$format          = get_post_format( $post_id );
					$format          = (empty( $format )) ? 'format-standart' : 'format-' . $format;
					
					if ( has_excerpt( $post_id ) ) {
						$excerpt = wp_strip_all_tags( get_the_excerpt(25) );
					} else {
						$excerpt = wp_strip_all_tags( strip_shortcodes (get_the_content(25) ) );
					}
					$output .='<li style="width: ' .$attr['thumb_width'].'px;">
                        	<h2 class="post-title"><a href="' . $post_link . '" title="' . $post_title .'"> ' . $post_title .'</a></h2>
                                <div class="excerpt">';
									if(has_post_thumbnail()) {
												$thumb        = get_post_thumbnail_id(); //get img ID
												$img_url      = wp_get_attachment_url($thumb, 'medium'); //get img URL
												$image = aq_resize($img_url, $attr['thumb_width'], $attr['thumb_height'], true); //resize & crop img
								
									$output .= '<figure class="featured-thumbnail thumbnail large"><img src="' . $image . '" style="display: block;"></figure>';
										}
							// post excerpt
							if ( !empty($excerpt{0}) ) {
								$output .= $excerpt_count > 0 ? '<p class="excerpt">' . wp_trim_words( $excerpt, $excerpt_count ) . '</p>' : '';
							}	
							
							$more_text = esc_html( wp_kses_data( $attr['more_text'] ) );
							if ( $more_text != '' ) {
								$output .= '<a href="' . get_permalink( $post_id ) . '" class="btn btn-primary" title="' . $post_title_attr . '">';
									$output .= __( $more_text);
								$output .= '</a>';
							}							
							
							$output .='</div></li>';
                         endwhile;
                     $output .='</ul>';
                   wp_reset_postdata();
                $output .='</div>
                <div class="clear" style="margin: 20px 0 0;"></div>
                <button class="btn prev"><i class="icon-chevron-left"></i></button>
                <button class="btn next"><i class="icon-chevron-right"></i></button>
                <div class="clear" style="margin: 20px 0 0;"></div>
                <div class="scrollbar">
                    <div class="handle">
                        <div class="mousearea"></div>
                    </div>
                </div>
		</div>';
	endif;	

return $output;

};

add_shortcode ('sly', 'duck_sly_shortcode');

?>