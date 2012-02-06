<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes();?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php global $page, $paged; ?>
    <?php if ( is_home() || is_front_page() ) { ?><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>
    <?php } elseif ( is_search() ) {  ?><?php the_search_query(); ?> | <?php _e('Search Results', 'mt-white');?>
    <?php } elseif  ( is_singular()  ) { ?><?php wp_title( '|', true, 'right' ); ?>  <?php if ( $paged >= 2 || $page >= 2 ) {
		echo  sprintf( __( 'Page %s |','mt-white' ), max( $paged, $page ) );  ?> <?php  bloginfo('name'); } ?>
    <?php } elseif  ( is_category() ) { ?><?php single_cat_title(); ?> | <?php _e('Category Archives', 'mt-white'); ?> | <?php bloginfo('name');  ?>
    <?php } elseif  ( is_month() ) { ?><?php the_time( get_option('date_format')) ?> | <?php _e('Archives', 'mt-white'); ?> | <?php bloginfo('name'); ?>
    <?php } elseif  ( is_tag() ) { ?><?php  single_tag_title('', true); ?> | <?php _e('Tag Archives', 'mt-whit'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?> 
    <?php } elseif  ( is_404() ) { ?> <?php _e('HTTP 404: Not Found', 'mt-white'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?>   
    <?php } elseif  ( is_author() ) { ?> <?php if ( have_posts() )	the_post(); ?><?php printf( __( 'About %s', 'mt-white' ), get_the_author() );   ?> 
   <?php } else { ?> <?php wp_title( '|', true, 'right' ); echo' | ';  bloginfo('name'); } ?>
    </title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" charset="utf-8" rel="stylesheet" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() && get_option('thread_comments') ) { wp_enqueue_script( 'comment-reply' ); } ?>
<?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>>
<?php   $options = get_option('typo_theme_options'); ?>
<div id="header">
<div class="container_12 "> 

<?php if (!is_attachment()) { ?>
<?php  if   ( is_active_sidebar( 'header-widget-area' ) ) { ?>      
<div class="grid_8">
	<?php }  else { ?>
<div class="grid_12">	

<?php }}  else { ?>
<div class="grid_12">
<?php  } ?>

<?php $typo_heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'h2'; ?>
<<?php echo $typo_heading_tag; ?>><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></<?php echo $typo_heading_tag; ?>>
<strong><?php bloginfo('description'); ?></strong>
</div>
<?php if (!is_attachment()) { ?>
<?php if ( is_active_sidebar( 'header-widget-area' )) : ?> 
<div class="grid_4">
<ul class="widget">
<?php dynamic_sidebar( 'header-widget-area' ); ?>
</ul>
</div>
<?php  endif ?>  
<?php } ?>
<div class="clear"></div>
</div>

</div>
<div id="nav">        
<div class="container_12 ">
<div  class="grid_8">
<?php  wp_nav_menu( array( 'sort_column' => 'menu_order', 'Primary Navigation', 'theme_location'=>'primary', 
'container'=> ' ','menu_class'=> 'm' ) ); ?>
</div>
<div class="grid_4">
<?php get_search_form(); ?>
</div>
</div>
<div class="clear"></div>
</div>