<?php global $largo, $shown_ids, $tags; ?>

<div id="homepage-featured" class="row-fluid clearfix">
	<div <?php post_class( 'top-story span12' ); ?>>
	<?php
		$topstory = largo_get_featured_posts( array(
			'tax_query' => array(
				array(
					'taxonomy' 	=> 'prominence',
					'field' 	=> 'slug',
					'terms' 	=> 'top-story'
				)
			),
			'showposts' => 1
		) );
		if ( $topstory->have_posts() ) {
			while ( $topstory->have_posts() ) {
				$topstory->the_post(); $shown_ids[] = get_the_ID();
				?>
				
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<h5 class="byline"><?php largo_byline( true, false, get_the_ID() ); ?></h5>
				<?php largo_excerpt( get_the_ID(), 4, null ); ?>
				<?php if ( largo_post_in_series() ) {
					$feature = largo_get_the_main_feature();
					$feature_posts = largo_get_recent_posts_for_term( $feature, 1, 1 );
					if ( $feature_posts ) {
						foreach ( $feature_posts as $feature_post ): ?>

							<h4 class="related-story"><?php _e('Related:', 'largo'); ?> <a href="<?php echo esc_url( get_permalink( $feature_post->ID ) ); ?>"><?php echo get_the_title( $feature_post->ID ); ?></a></h4>
						<?php endforeach;
					}
				}
			}
		} // end top story ?>
	</div>
</div>
