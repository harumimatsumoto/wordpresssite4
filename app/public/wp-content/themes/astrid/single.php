<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Simpledesign
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
	 while ( have_posts() ) : the_post();

	 	get_template_part( 'template-parts/content', get_post_format() );
	?>
	<!--<h3>サイトの人気記事</h3>-->
	<?php	
 		//dynamic_sidebar('footer-2');

		//if ( comments_open() || get_comments_number() ) :
		//	comments_template();
		//endif;

	 	endwhile;
	?>
	<?php
		global $_curcat;
		$caca = $_curcat->cat_ID;
		if (function_exists('wpp_get_mostpopular')) :
		ob_start();
		wpp_get_mostpopular('range=monthly&order_by=views&cat=' . $caca 
		. '&limit=10&stats_comments=0&post_type=post' 
		. '&thumbnail_width=100&thumbnail_height=100' 
		. '&post_start="<li><h4>"&post_end="</h4></li>"'
		. '&do_pattern=1&pattern_form="{image}<br />{title}"');
		$popular = ob_get_clean();
		$popular = explode('</li>', $popular);
		$popular_counter = 0;
		foreach ($popular as &$p) {
			if ($popular_counter == 5) {
				$p = str_replace('<li>', '</ul><ul><li>',$p);
				break;
			}
			$popular_counter++;
		}
		$popular = implode('</li>', $popular);
		$popular = str_replace('<ul>', '<ul class="relatedorg clearfix">', $popular);
		$popular = str_replace('.png', '-100x100.png', $popular);
		$popular = str_replace('.jpg', '-100x100.jpg', $popular);
		$popular = str_replace('.jpeg', '-100x100.jpeg', $popular);
		$popular = str_replace('.gif', '-100x100.gif', $popular);
		$cat_now = get_the_category();
		$cat_now = $cat_now[0];
		$relCatName = $cat_now->cat_name;
	?>
	<h3 class="relatedh3">「<?php echo $relCatName; ?>」カテゴリーの人気記事</h3>
	<?php
		echo $popular;
		endif;
	?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( get_theme_mod('fullwidth_single', 0) != 1 ) :
	get_sidebar();
endif;
get_footer();
?>
