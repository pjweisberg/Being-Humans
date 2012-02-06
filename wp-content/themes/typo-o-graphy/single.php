<?php get_header(); ?>
<div class="container_12">
<div class="grid_8">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div <?php post_class('post') ?>> 
<div class="title">  
<?php typo_posted_on(); ?> 
<em><?php comments_popup_link( __( 'Leave a comment', 'typo-o-graphy' ), __( '1 Comment', 'typo-o-graphy' ), __( '% Comments', 'typo-o-graphy' ) ); ?> <?php edit_post_link(__('Edit This','typo-o-graphy')) ?></em>
<h1><?php the_title(); ?></h1>
<em><?php _e('Categories','typo-o-graphy'); ?></em>: <?php the_category(', ') ?>
   <?php if (get_the_tags()) { ?> <br /><em><?php _e('Tags:','typo-o-graphy'); ?></em>: <?php the_tags('', ', ', ' ');  } ?>
</div>
<div class="entry">
<?php if ( (function_exists( 'add_theme_support' ))  && ( has_post_thumbnail() )){
the_post_thumbnail('typo_single_post'); } ?>	
<?php the_content(__('(more...)','typo-o-graphy')); ?>
 <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'typo-o-graphy' ), 'after' => '</div>' ) ); ?>
 <div class="clear"></div>
</div>
</div>
<?php comments_template(); ?> 
<?php endwhile; else: ?>
<div class="entry"><p><?php _e('Sorry, no posts matched your criteria.','typo-o-graphy'); ?></p></div>
<?php endif; ?>
</div> 
<?php get_sidebar(); ?>

<div class="wp-pagenavi">
		<div class="alignleft"><?php previous_post_link( ); ?></div>
		<div class="alignright"><?php next_post_link( ); ?></div>
</div>
</div>
<?php get_footer(); ?>
        