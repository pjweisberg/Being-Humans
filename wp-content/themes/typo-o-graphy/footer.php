<div id="footer">
<div class="container_12">	
<div class="grid_6">
<?php (is_attachment()) ? '' : '' ?>
<?php	if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
<ul class="widget"> 
<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
</ul>
<?php  endif ?>
</div>
<div class="grid_6">
<?php (is_attachment()) ? '' : '' ?>
<?php	if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
<ul class="widget"> 
<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
</ul>
<?php  endif ?>
</div>
</div>
<ul class="menubtm"> 
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?>,</li>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS','typo-o-graphy'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>','typo-o-graphy'); ?></a>,</li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS','typo-o-graphy'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>','typo-o-graphy'); ?></a>,</li>
		<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'typo-o-graphy'); ?>"><abbr title="WordPress">WP</abbr></a>,</li>
		<li><?php _e('Theme design by','typo-o-graphy'); ?> <?php if (is_home()) { ?><a href="http://tommek.eu"> Tomek Mazur </a><?php } else {?> Tomek Mazur <?php }  ?>
        2009</li>			<?php wp_meta(); ?>
</ul>
</div>
<?php wp_footer(); ?>
</body>
</html>