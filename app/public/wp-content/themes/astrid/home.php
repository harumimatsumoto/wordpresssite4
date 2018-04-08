<?php
/**
 * The home template file.
 *
 * @package Astrid
 */

get_header(); ?>


	<div id="primary" class="content-area <?php echo esc_attr(astrid_blog_layout()); ?>">
		<main id="main" class="site-main" role="main">
		<div class = "row top-page-contents">
			<?php
				$categories = get_categories(array('orderby'=>'term_id'));
				foreach($categories as $category) :
			?>		
				<div class ="col-md-4">
					<div class ="top_contents">			
						<h2 class = "text-center" >
						<a href="<?php echo get_category_link( $category->term_id ); ?>">
								<?php echo $category->cat_name; ?>
							</a>
						</h2>
						<ul class ='top_lists'>
						<?php
							query_posts('cat='.$category->cat_ID);
							if (have_posts()) : while (have_posts()) : the_post();
						?>
							<li class = "text-center"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
						<?php endwhile; endif; ?>
						</ul>
					</div>
				</div> 
			<?php endforeach; ?>
		</div>

		<?php if ( have_posts() ) : ?>

			<div class="posts-layout">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php endwhile; ?>
			</div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
	if ( astrid_blog_layout() == 'list' ) :
		get_sidebar();
	endif;
?>
<?php get_footer(); ?>
