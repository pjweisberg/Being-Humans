<?php get_header(); ?>
<div class="container_12">
<h1 class="grid_12 title"><?php printf( __( 'Category Archives: <span>%s</span>', 'typo-o-graphy' ), single_cat_title( '', false ) );?></h1>
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
        