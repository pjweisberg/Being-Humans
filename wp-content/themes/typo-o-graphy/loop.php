<div class="grid_8">
<?php if ( ! have_posts() ) : ?>
<div class="title">   
<h1><?php _e('Not Found','typo-o-graphy'); ?></h1>
</div>
<?php get_search_form(); ?>
<div class="entry">
<h2><?php _e('Recent Posts','typo-o-graphy'); ?></h2>
<ul>
<?php query_posts('showposts=5&orderby=date'); while (have_posts()) : the_post(); ?>
	   <li><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'typo-o-graphy' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	   <p><?php _e('Categories','typo-o-graphy'); ?>: <?php the_category(',') ?></p>
    </li>		
<?php endwhile; wp_reset_query(); ?>
</ul>
</div>
<?php endif; ?>

<?php if ( is_author() ) : //author description  ?>
<?php if ( get_the_author_meta( 'description' ) ) : ?>
<div class="entry-author">
<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( '', 60 ) ); ?>
<h2><?php printf( __( 'About %s', 'typo-o-graphy' ), get_the_author() ); ?></h2>
<?php the_author_meta( 'description' ); ?>
</div>
<?php endif; ?>
<?php endif; ?>

<?php  while (have_posts()) : the_post(); ?>
<div <?php post_class('post') ?>> 
<div class="title">  
<?php typo_posted_on(); ?> <em><?php comments_popup_link( __( 'Leave a comment', 'typo-o-graphy' ), __( '1 Comment', 'typo-o-graphy' ), __( '% Comments', 'typo-o-graphy' ) ); ?> <?php edit_post_link(__('Edit This','typo-o-graphy')) ?></em>
<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'typo-o-graphy' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<em><?php _e('Categories','typo-o-graphy'); ?></em>: <?php the_category(', ') ?>
   <?php if (get_the_tags()) { ?> <br /><em><?php _e('Tags:','typo-o-graphy'); ?></em>: <?php the_tags('', ', ', ' ');   ?><br /><?php } ?>
</div>
<div class="entry">
<?php if ( is_archive() || is_search() ) :  ?>
<?php the_excerpt(); ?>
<?php else : ?>
<?php if ( (function_exists( 'add_theme_support' ))  && ( has_post_thumbnail() )){
the_post_thumbnail('typo_single_post'); } ?>	
<?php the_content(__('(more...)','typo-o-graphy')); ?> <div class="clear"></div>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'typo-o-graphy' ), 'after' => '</div>' ) ); ?>
 <div class="clear"></div>
<?php endif; ?>
</div>
<div class="clear"></div>
</div>
<?php comments_template(); ?> 
<?php endwhile; ?>
</div> 