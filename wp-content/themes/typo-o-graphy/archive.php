<?php get_header(); ?>
<div class="container_12">
<h1 class="grid_12 title">
<?php if ( is_day() ) : ?>
<?php printf( __( 'Daily Archives: <span>%s</span>', 'typo-o-graphy' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
<?php printf( __( 'Monthly Archives: <span>%s</span>', 'typo-o-graphy' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
<?php printf( __( 'Yearly Archives: <span>%s</span>', 'typo-o-graphy' ), get_the_date('Y') ); ?>
<?php else : ?>
<?php _e( 'Blog Archives', 'typo-o-graphy' ); ?> <?php endif; ?></h1>
<?php get_template_part( 'loop' );	?>
<?php get_sidebar(); ?>
<?php  if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
<div class="wp-pagenavi">
		<div class="alignleft"><?php next_posts_link( __( '&larr; Older posts', 'typo-o-graphy' ) ); ?></div>
		<div class="alignright"><?php previous_posts_link( __( 'Newer posts &rarr;', 'typo-o-graphy' ) ); ?></div>
</div>
<?php } ?>
</div>
<?php get_footer(); ?>
        