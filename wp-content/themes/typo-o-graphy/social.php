<?php   $options = get_option('typo_theme_options'); ?>
<ul class="grid_4 social">
<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Subscribe Rss','typo-o-graphy'); ?>"></a></li>
<?php if($options['facebook'] <> '') : ?><li id="fb"><a href="http://www.facebook.com/<?php echo($options['facebook']); ?>"><?php _e('Facebook profil','typo-o-graphy'); ?></a></li><?php endif; ?>
<?php if($options['tube'] <> '') : ?><li id="tb"><a href="http://www.youtube.com/user/<?php echo($options['tube']); ?>"><?php _e('YouTube profil','typo-o-graphy'); ?></a></li><?php endif; ?>
<?php if($options['lastfm'] <> '') : ?><li id="fm"><a href="http://www.lastfm.pl/user/<?php echo($options['lastfm']); ?>"><?php _e('YouTube profil','typo-o-graphy'); ?></a></li><?php endif; ?>
</ul>
	