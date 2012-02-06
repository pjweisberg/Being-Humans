<?php
/*********************/
require_once ( get_stylesheet_directory() . '/typo-theme-options.php' );
require_once ( get_stylesheet_directory() . '/typo-widgets.php' );
/*********************/
function typo_widgets_init() {
register_sidebar( array(
		'name' => __( 'Header Widget Area', 'typo-o-graphy'),
		'id' => 'header-widget-area',
		'description' => __( 'The header widget area', 'typo-o-graphy' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'typo-o-graphy'),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', 'typo-o-graphy' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
		register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'typo-o-graphy' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'typo-o-graphy' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'typo-o-graphy' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'typo-o-graphy' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'typo_widgets_init' );
/*********************/	
load_theme_textdomain( 'typo-o-graphy', TEMPLATEPATH . '/languages' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
/*********************/	
if ( function_exists( 'add_theme_support' ) ){
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 598, 200, true );
add_image_size('typo_single_post', 598, 200, true);
}
/*********************/	
if ( ! isset( $content_width ) )
	$content_width = 598;
/*********************/	
add_theme_support( 'automatic-feed-links' );
/*********************/	
add_editor_style();
/*********************/
function typo_stylesheet() {
         wp_register_style('typo_print',  get_stylesheet_directory_uri() .'/print.css', '' , '1.0','print');
         wp_enqueue_style( 'typo_print'); }
add_action('wp_print_styles', 'typo_stylesheet');
/*********************/	
if (function_exists('wp_nav_menu')) {
register_nav_menus(array('primary' =>__( 'Primary Navigation', 'typo-o-graphy' )));
}
/*********************/	
function typo_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'typo_menu_args' );
/*********************/	
function typo_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'typo_remove_gallery_css' );
/*********************/	
add_custom_background();
/*********************/	
function typo_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'typo_recent_comments_style' );
/*********************/	
function typo_excerpt_more( $more ) {
	return ' &hellip;' . ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'typo-o-graphy' ) . '</a>';
}
add_filter( 'excerpt_more', 'typo_excerpt_more' );
/*********************/	
if ( ! function_exists( 'typo_posted_on' ) ) :
function typo_posted_on() {
   printf( __( '<em> %1$s, Author:</em> %2$s,' , 'typo-o-graphy' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'typo-o-graphy' ), get_the_author() ),
			get_the_author()
		)		
	);
}
endif;
/*********************/	
if ( ! function_exists( 'custom_comments' ) ) :
function custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'typo-o-graphy' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'typo-o-graphy' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'typo-o-graphy' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'typo-o-graphy' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'typo-o-graphy' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'typo-o-graphy'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

?>
