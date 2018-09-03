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
	<section id="primary" class="content-area portfolio-archive-template">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : 
			$terms = get_terms( 'post_tag', '' );
			if($terms){
				?><div class="project-tags tag-load"><a class="project-tag<?php if(!is_tag()) echo ' active'?>" href="<?php echo get_post_type_archive_link( 'project' )?>"><?php _e( 'All', 'dazzling' );?></a><?php
				if(is_tag()) $def_tag = get_queried_object()->term_id;
				foreach($terms as $term){
					?><a class="project-tag<?php if($def_tag==$term->term_id) echo ' active'?>" href="<?php echo get_term_link($term->term_id)?>"><?php echo $term->name ?></a><?php
				}
				?></div><?php
			} ?>
			<div class="archive-div grid">
				<div class="grid-sizer"></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="archive-item grid-item ajax-load waypoint">
						<a href="<?php the_permalink()?>" class="archive-content">
							<div class="archive-bg" data-dbg="<?php echo get_field('превью')['url']?>" <?php $mbg = get_field('превью_для_мобильного')['url']; if($mbg) {?>data-mbg="<?php echo $mbg?>"<?php }?>></div>
							<div class="archive-text">
								<div class="archive-title"><?php the_title()?></div>
								<?php $description = get_field('краткое_описание');
								if($description){ ?><div class="archive-description"><?php echo $description?></div><?php } 
								
								$terms = get_the_terms( get_the_ID(), 'post_tag' );
								if($terms){
									?><div class="archive-tags"><?php foreach($terms as $term) echo '#'.$term->name.' '; ?></div><?php
								}?>
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