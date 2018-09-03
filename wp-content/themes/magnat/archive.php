<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dazzling
 */
if ( !have_posts() ) {
	wp_redirect(get_home_url());
} else { 
	get_header(); ?>
<?php get_template_part( 'header_part' ) ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<div class="archive-div grid">
				<div class="grid-sizer"></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="archive-item grid-item ajax-load waypoint">
						<a href="<?php the_permalink()?>" class="archive-content">
							<div class="archive-bg" style="background-image:url('<?php the_post_thumbnail_url()?>')"></div>
							<div class="archive-text">
								<div class="archive-title"><?php the_title()?></div>
								<?php $description = get_field('описание_новости');
								if($description){ ?><div class="archive-description"><?php echo $description?></div><?php } ?>
							</div>
						</a>
					</div>
				<?php endwhile; ?>
				<?php //<div class="clear-both"></div> ?>
			</div>
			<?php //dazzling_paging_nav(); ?>
		<?php endif; ?>
		</main>
	</section>
<?php get_template_part( 'footer_part' ) ?> 
<?php get_footer();
}?>
