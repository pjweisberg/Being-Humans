<?php get_header(); ?>
<div class="container_12">
<?php	if ( have_posts() )	: the_post(); ?>
<h1 class="title"><?php printf( __( 'Author Archives: %s', 'typo-o-graphy' ), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a></span>" ); ?></h1>
<?php endif; ?>
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
        