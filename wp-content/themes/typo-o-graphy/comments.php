<div <?php  if ( comments_open() ) { ?> id="comments" <?php } ?>>
<?php if ( post_password_required() ) : ?>
<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'typo-o-graphy' ); ?></p>
			</div><!-- #comments -->
<?php return;	endif; ?>

<?php if ( have_comments() ) : ?>
<h3>
<?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'typo-o-graphy' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?>
</h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'typo-o-graphy' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'typo-o-graphy' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; ?>

			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'custom_comments' ) ); ?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'typo-o-graphy' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'typo-o-graphy' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif;  ?>

<?php else : if ( ! comments_open() ) : ?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'typo-o-graphy' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- #comments -->
