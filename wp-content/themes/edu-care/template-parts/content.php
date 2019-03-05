<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edu_Care
 */

?>

<?php 
	if ( has_post_thumbnail() ) {

		$second_col = 'col-7';
		$class = '';

	} else{

		$second_col = 'col-12';
		$class = 'no-image-sticky';
		
}?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-category-wrapper post'); ?>>
	<div class="row <?php echo esc_attr( $class );?>">

		<?php if( is_sticky() ){ ?>
	    	<div class="favourite"><i class="fa fa-star"></i></div>
		<?php } ?>





		<?php if ( has_post_thumbnail() ) { ?>
			<div class="col-5">
			    <?php the_post_thumbnail('edu-care-blog-list'); ?>
			</div> <!-- .col -->
		<?php } ?>



		<div class="<?php echo esc_attr( $second_col ); ?>">
			<header class="entry-header">
			<?php
				if ( is_single() ) :
					the_title( '<h2 class="widget-title">', '</h2>' );
				else :
					the_title( '<h2 class="widget-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
			</header>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="post-details">
				<?php 
					edu_care_posted_on(); 
					edu_care_entry_footer();
				?>
			</div><!-- .post-details -->
			<?php endif; ?>

			<div class="entry-content">
					<?php the_excerpt(); ?>
			</div>
			<a href="<?php the_permalink(); ?>" class="btn"> <?php esc_html_e( 'Read More', 'edu-care' ); ?> </a>
		</div> <!-- .col -->



	</div><!-- .row -->
</article><!-- .post-category -->
