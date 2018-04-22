<?php
/**
 * The home template file.
 *
 * @package Simpledesign
 */

get_header(); ?>


	<div id="primary" class="content-area <?php echo esc_attr(simpledesign_blog_layout()); ?>">
		<main id="main" class="site-main" role="main">
		<?php 
			//if ($category):
			$categories = get_categories(array('orderby'=>'term_id'));
			$num = 1;		
			foreach($categories as $category) :
		?>
		<div class ="col-sm-4">
			<div class ="top_contents entry-content">			
				<h2 class = "text-center" >
				<a href="<?php echo get_category_link( $category->term_id ); ?>">
						<?php echo $category->cat_name; ?>
				</a><!--display:block;width:100%;text-align:center;-->
				</h2>
				<ul class ='top_lists entry-meta'>
				<?php dynamic_sidebar( 'PopularPost'.$num ) ; ?>
				<?php
					//TODO:popularpostの表示がうまくいっていれば不要
					//query_posts('cat='.$category->cat_ID);
					//if (have_posts()) : while (have_posts()) : the_post();
				?>
					<!--<li class = "text-center"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>-->
				<?php //endwhile; endif; ?>
				</ul>
			</div>
		</div>
		<?php $num++; endforeach; //endif;?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
	if ( simpledesign_blog_layout() == 'list' ) :
		get_sidebar();
	endif;
?>
<?php get_footer(); ?>
