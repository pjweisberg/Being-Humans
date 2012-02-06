<?php get_header(); ?>
<div class="container_12">
<div class="grid_8">
<div class="title">   
<h1><?php _e('Error 404 - Not Found','typo-o-graphy'); ?></h1>
</div>
<div class="entry">
<h2><?php _e('Recent Posts','typo-o-graphy'); ?></h2>
<ul>
<?php query_posts('showposts=5&orderby=date');  while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'typo-o-graphy' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
 <p><?php _e('Categories','typo-o-graphy'); ?>: <?php the_category(',') ?></p>
</li>		
<?php endwhile; ?>
</ul>
</div>
</div> 
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
        