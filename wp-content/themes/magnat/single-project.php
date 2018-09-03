<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dazzling
 */

get_header(); ?>
	<?php get_template_part( 'header_part' ) ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="entry-content">
			<div class="backBtn">
				<a href="/">Назад</a>
			</div>
			<style>
			.backBtn {
				margin: 55px 0 0 26px;
    			position: fixed;
   				 width: 70px;
			}

			.backBtn a {
				color: #959595;
				text-decoration: none;
				display: block;
				border-bottom: 1px solid;
				padding: 0 1px;
				height: 22px;
				float: left;
				margin: 0 0 0 33px;
				position: relative;
			}

			.backBtn a:link,
			.backBtn a:visited,
			.backBtn a:hover,
			.backBtn a:active {
				color: #959595;
				text-decoration: none;
			}
				
			.backBtn a:before {
				content: '';
				position: absolute;
				height: 32px;
				width: 32px;
				top: 13px;
				margin: -16px 0;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
				left: -35px;
				background-image: url(/wp-content/themes/magnat/img/backBtn.svg);
			}
			.backBtn a:hover,
			.backBtn:hover a:before
			{
				opacity: 0.7;
				text-decoration: none;
			}
			@media (max-width: 767px) {
				.backBtn {
					position: relative;
					width: 100%;
					overflow: hidden;
					margin: -42px 0 35px 7px;
					font-size: 16px;
				}
			}

			</style>
				<?php ob_start();
				?><div class="entry-description "><?php $descr = get_field('описание'); if(!$descr) { $descr = '<h1>'.get_the_title().'</h1>'.get_field('краткое_описание'); $hide = true; } echo $descr;?></div>
<style>
.project-header:before{
	background-color:<?php the_field('цвет')?>;
}
</style>
<?php
				$projectHeader = ob_get_contents();
				ob_end_clean();?>
				<header class="project-header<?php if($hide) echo ' hide-desctop' ?>"><?php echo $projectHeader?></header>
				
				<div class="news-loop tag-load">
				
					<?php 
					$def_ID = get_the_ID();
					
					
					//$tags = wp_get_post_tags($post->ID);
					//$cat_ids = array();
					//if ( $tags && ! is_wp_error( $tags ) ) {
					//	foreach ( $tags as $tag ) {
					//		array_push( $cat_ids, $tag->slug );
					//	}
					//}
					//echo '<pre>'; print_r(get_next_posts_page_link()); echo '</pre>';
					
					
					$projects = get_posts( array(
						'numberposts' => -1,
						'orderby'     => 'menu_order',
						'post_type'   => 'project',
					//	'tax_query' => array(
					//		array(
					//			'taxonomy' => 'genre',
					//			'field'    => 'slug',
					//			'terms'    => $cat_ids
					//		)
					//	)
					) ); 
					
					
					if($projects){
						$projects_arr = array();
						$num = 0;
						$count = count($projects);
						if($count>1){
							foreach($projects as $project) {
								$projects_arr[$num] = $project->ID;
								if($projects_arr[$num] == $def_ID){
									if($num == 0){
										$prev_num = $count-1;
										$next_num = $num+1;
									} else {
										if($num == $count-1){
											$prev_num = $num-1;
											$next_num = 0;
										} else {
											$prev_num = $num-1;
											$next_num = $num+1;
										}
									}
								}
								$num++;
							}
							//echo '<a href="' . get_permalink($projects_arr[$prev_num]) . '">' . __( 'Previous <br>work', 'dazzling' ) . '</a>';
							//echo '<a href="' . get_permalink($projects_arr[$next_num]) . '">' . __( 'Next <br>work ', 'dazzling' ) . '</a>';
							echo '<a href="' . get_permalink($projects_arr[$prev_num]) . '">Предыдущий<br>проект</a>';
							echo '<a href="' . get_permalink($projects_arr[$next_num]) . '">Следующий<br>проект</a>';
							//echo get_permalink( get_next_post(TRUE) );
							//echo get_permalink( get_previous_post(TRUE) );
							//echo previous_post_link('%link', 'Back' , TRUE ); 
						}
					} ?>
					
				</div>
				<?php if( have_rows('блоки') ):
					$num = 0;
					while ( have_rows('блоки') ) : the_row();
						$type = get_sub_field('тип_блока');
						switch ($type) {
							case 'Изображение':
								?><img src="<?php echo get_sub_field('изображение')['url'] ?>?v=2" class="progect-img lazyload<?php if(get_sub_field('во_всю_ширину')=='Во всю ширину') echo ' progect-full-width'?>"><?php
							break;
							case 'Видео':
								?><div class="video-div">
									<iframe src="https://player.vimeo.com/video/<?php the_sub_field('видео')?>?autoplay=1&autopause=0&loop=1&color=ffffff&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position:absolute; top:0; left:0; width:100%; height:100%;" class="embed-content<?php if(get_sub_field('во_всю_ширину')=='Во всю ширину') echo ' progect-full-width'?>"></iframe>								
								</div><?php
							break;
							case 'Описание':
								$num++;
								?><div class="pText-content" id="pText<?php echo $num?>"><?php the_sub_field('описание') ?></div><style>#pText<?php echo $num?>:before{background-color:<?php the_field('цвет')?>;}</style><?php
							break;
						}
					endwhile;
				endif;

				$terms = get_terms( 'post_tag', '' );
				if($terms){
					?><div class="project-tags"><a class="project-tag" href="<?php echo get_post_type_archive_link( 'project' )?>"><?php _e( 'All', 'dazzling' );?></a><?php
					if(is_tag()) $def_tag = get_queried_object()->term_id;
					foreach($terms as $term){
						?><a class="project-tag" href="<?php echo get_term_link($term->term_id)?>"><?php echo $term->name ?></a><?php
					}
					?></div><?php
				} ?>
			</div>
		<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_template_part( 'footer_part' ) ?> 
<?php get_footer(); ?>