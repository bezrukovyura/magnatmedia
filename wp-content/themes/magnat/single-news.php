<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dazzling
 */

get_header() ?>
	<?php get_template_part( 'header_part' ) ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post() ?>
				<?php 
				$images = get_field('галерея');
				ob_start();
				if( $images ): $flag = true; ?>
					<div class="single-gal">
						<div class="news-gal">
							<?php foreach( $images as $image ): ?>
								<div class="news-gal-item">
									<a href="<?php echo $image['url']; ?>" class="litebox" data-litebox-group="news-gal">
										<img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt'] ?>">
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif;
				$galery = ob_get_contents();
				ob_end_clean();
				?>
				<article id="post-<?php the_ID(); ?>" class="single-news<?php if(!$flag) echo ' full-width'?>">
					<header class="entry-header page-header">
						<h1 class="entry-title "><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				<?php echo $galery;
				$def_ID = get_the_ID();
				?>
			<?php endwhile ?>
			<div class="news-loop tag-load">
				<?php 
				$posts = get_posts( array(
					'numberposts' => -1,
					'orderby'     => 'menu_order',
					'post_type'   => 'news'
				) );
				if($posts){
					$posts_arr = array();
					$num = 0;
					$count = count($posts);
					if($count>1){
						foreach($posts as $post) {
							$posts_arr[$num] = $post->ID;
							if($posts_arr[$num] == $def_ID){
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
						echo '<a href="' . get_permalink($posts_arr[$prev_num]) . '">' . __( 'Previous <br>news', 'dazzling' ) . '</a>';
						echo '<a href="' . get_permalink($posts_arr[$next_num]) . '">' . __( 'Next <br>news ', 'dazzling' ) . '</a>';
					}
				} ?>
			</div>
			<div class="clear-both"></div>
		</main>
	</div>
	<?php get_template_part( 'footer_part' ) ?> 
<?php get_footer() ?>