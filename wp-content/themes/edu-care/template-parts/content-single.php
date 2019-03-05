<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edu_Care
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->
	
	<?php 
	if ( has_post_thumbnail() ) {  ?>
	<figure>
	<?php
		the_post_thumbnail('full');  ?>
	</figure>
	<?php
	} ?>

	<div class="post-details">
		<?php 
			edu_care_posted_on(); 
			edu_care_entry_footer();
		?>
	</div><!-- .post-details -->


	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edu-care' ),
				'after'  => '</div>',
			) );
		?>
	</div>

</article>
