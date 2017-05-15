<?php
/**
 * The Template for displaying all single posts.
 *
 * @package zerif
 */

	get_header(); ?>
	<div class="clear"></div>
</header> <!-- / END HOME SECTION  -->
<?php
zerif_after_header_trigger();
$zerif_change_to_full_width = get_theme_mod( 'zerif_change_to_full_width' );
?>
<div id="content" class="site-content">
	<div class="container">
		<?php
		zerif_before_single_post_trigger();
		if( ! empty( $zerif_change_to_full_width ) ) {
			echo '<div class="content-left-wrap col-md-12">';
		} else {
			echo '<div class="content-left-wrap col-md-9">';
		}
		?>
			<?php zerif_top_single_post_trigger(); ?>
			<div id="primary" class="content-area">
				<main itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage" id="main" class="site-main">
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'content', 'single' );
						zerif_post_nav();
						/* If comments are open or we have at least one comment, load up the comment template */
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template('');
						endif;
					endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php zerif_bottom_single_post_trigger(); ?>
		</div><!-- .content-left-wrap -->
		<?php zerif_after_single_post_trigger(); ?>
		<?php
		if( empty( $zerif_change_to_full_width ) ) {
			zerif_sidebar_trigger();
		}
		?>
	</div><!-- .container -->
</div>
<?php get_footer(); ?>