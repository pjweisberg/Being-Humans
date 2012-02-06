<?php get_header(); ?>
<div class="container_12">
<div class="grid_8">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div <?php post_class('post') ?>> 
<div class="title">
<?php if ( is_front_page() ) { ?>
<h2><?php the_title(); ?></h2>
<?php } else { ?>
<h1><?php the_title(); ?></h1>
<?php } ?>
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
<p><?php _e('Sorry, no posts matched your criteria.','typo-o-graphy'); ?></p>
<?php endif; ?>
</div> 
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
        