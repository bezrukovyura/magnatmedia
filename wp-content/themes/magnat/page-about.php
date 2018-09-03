<?php
/**
 * Template Name: О компании
 *
 * This is the template that displays full width page without sidebar
 *
 * @package dazzling
 */

get_header(); ?>
<?php get_template_part( 'header_part' ) ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<div id="pl-57" class="panel-layout page-template-page-job">

					
						<div id="pg-57-0" class="panel-grid panel-has-style">
							<div class="collapseRight panel-row-style panel-row-style-for-57-0">
								<div id="pgc-57-0-0" class="panel-grid-cell">
									<div id="panel-57-0-0-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="0">
										<div class="hidden-xs panel-widget-style panel-widget-style-for-57-0-0-0">
											<div class="so-widget-sow-editor so-widget-sow-editor-base">
												<div class="siteorigin-widget-tinymce textwidget">
													<h1><?php the_title()?></h1></div>
											</div>
										</div>
									</div>
									<div id="panel-57-0-0-1" class="so-panel widget widget_sow-editor panel-last-child" data-index="1">
										<div class="so-widget-sow-editor so-widget-sow-editor-base">
											<div class="siteorigin-widget-tinymce textwidget">
												<p><?php the_field('текст')?></p>
											</div>
										</div>
									</div>
								</div>
								<div id="pgc-57-0-1" class="panel-grid-cell">
									<div id="panel-57-0-1-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="2">
										<div class="hidden-sm hidden-md hidden-lg panel-widget-style panel-widget-style-for-57-0-1-0">
											<div class="so-widget-sow-editor so-widget-sow-editor-base">
												<div class="siteorigin-widget-tinymce textwidget">
													<h1><?php the_title()?></h1></div>
											</div>
										</div>
									</div>
									<div id="panel-57-0-1-1" class="so-panel widget widget_media_image" data-index="3">
										<div class="hidden-sm hidden-md hidden-lg panel-widget-style panel-widget-style-for-57-0-1-1"><img src="<?php the_field('дата_(мобильный)')?>" class="image wp-image-452 attachment-full size-full" alt="" style="max-width: 100%; height: auto;"></div>
									</div>
									<div id="panel-57-0-1-2" class="so-panel widget widget_media_image panel-last-child" data-index="4">
										<div class="hidden-xs panel-widget-style panel-widget-style-for-57-0-1-2"><img src="<?php the_field('дата')?>" class="image wp-image-392 attachment-full size-full" alt="" style="max-width: 100%; height: auto;"></div>
									</div>
								</div>
							</div>
						</div>
						
						
						
						
						
						
						
						
						
						
						
						
						
										
						<div id="pg-58-2" class="panel-grid panel-no-style">
							<div id="pgc-58-2-0" class="panel-grid-cell">
								<div id="panel-58-2-0-0" class="so-panel widget widget_media_image panel-first-child panel-last-child" data-index="3">
									<div class="hidden-xs panel-widget-style panel-widget-style-for-58-2-0-0"><img style="max-width: 100%; height: auto;" src="<?php the_field('директор:_фото')?>" class="image" alt="" style="max-width: 100%; height: auto;"></div>
								</div>
							</div>
							<div id="pgc-58-2-1" class="panel-grid-cell">
								<div id="panel-58-2-1-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="4">
									<div class="panel-widget-style panel-widget-style-for-58-2-1-0">
										<div class="so-widget-sow-editor so-widget-sow-editor-base">
											<div class="siteorigin-widget-tinymce textwidget">
												<h3><?php the_field('директор:_имя')?></h3>
												<p><em><?php the_field('директор:_должность')?></em></p>
												<hr>
												<blockquote style="width:100%; color: #959595">
													<p><?php the_field('директор:_цитата')?></p>
												</blockquote>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="pg-58-3" class="panel-grid panel-has-style">
							<div class="panel-row-style panel-row-style-for-58-3" style="align-items: normal;">
								<div id="pgc-58-3-0" class="panel-grid-cell">
									<div id="panel-58-3-0-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="5">
										<div class="so-widget-sow-editor so-widget-sow-editor-base">
											<div class="siteorigin-widget-tinymce textwidget">
												<?php the_field('директор:_достижения_(левая_часть)')?>
											</div>
										</div>
									</div>
								</div>
								<div id="pgc-58-3-1" class="panel-grid-cell">
									<div id="panel-58-3-1-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="6">
										<div class="so-widget-sow-editor so-widget-sow-editor-base">
											<div class="siteorigin-widget-tinymce textwidget">
												<?php the_field('директор:_достижения_(правая_часть)')?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						<div id="pg-57-1" class="panel-grid panel-has-style">
							<div class="collapseRight panel-row-style panel-row-style-for-57-1">
								<div id="pgc-57-1-0" class="panel-grid-cell">
									<div id="panel-57-1-0-0" class="so-panel widget widget_siteorigin-panels-builder panel-first-child panel-last-child" data-index="5">
										<div id="pl-w5ace09d00a353" class="panel-layout">
											<div id="pg-w5ace09d00a353-0" class="panel-grid panel-has-style">
												<div class="noCollapse panel-row-style panel-row-style-for-w5ace09d00a353-0">
													<div id="pgc-w5ace09d00a353-0-0" class="panel-grid-cell">
														<div id="panel-w5ace09d00a353-0-0-0" class="so-panel widget widget_cl-counter widget-cl-counter panel-first-child panel-last-child" data-index="0">
															<div class="cl-counter" data-duration="1000">
																<div class="cl-counter-value"><span class="cl-counter-value-part type_number" data-final="<?php echo $num = get_field('показатели')[0]['число']?>"><?php echo $num ?></span></div>
																<div class="cl-counter-title"><?php echo get_field('показатели')[0]['текст']?></div>
															</div>
														</div>
													</div>
													<div id="pgc-w5ace09d00a353-0-1" class="panel-grid-cell">
														<div id="panel-w5ace09d00a353-0-1-0" class="so-panel widget widget_cl-counter widget-cl-counter panel-first-child panel-last-child" data-index="1">
															<div class="cl-counter" data-duration="1000">
																<div class="cl-counter-value"><span class="cl-counter-value-part type_number" data-final="<?php echo $num = get_field('показатели')[1]['число']?>"><?php echo $num ?></span></div>
																<div class="cl-counter-title"><?php echo get_field('показатели')[1]['текст']?></div>
															</div>
														</div>
													</div>
													<div id="pgc-w5ace09d00a353-0-2" class="panel-grid-cell">
														<div id="panel-w5ace09d00a353-0-2-0" class="so-panel widget widget_cl-counter widget-cl-counter panel-first-child panel-last-child" data-index="2">
															<div class="cl-counter" data-duration="1000">
																<div class="cl-counter-value"><span class="cl-counter-value-part type_number" data-final="<?php echo $num = get_field('показатели')[2]['число']?>"><?php echo $num ?></span></div>
																<div class="cl-counter-title"><?php echo get_field('показатели')[2]['текст']?></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="pgc-57-1-1" class="panel-grid-cell">
									<div id="panel-57-1-1-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="6">
										<div class="panel-widget-style panel-widget-style-for-57-1-1-0">
											<div class="so-widget-sow-editor so-widget-sow-editor-base">
												<div class="siteorigin-widget-tinymce textwidget">
													<blockquote>
														<p><?php the_field('цитата')?></p>
													</blockquote>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="pg-57-2" class="panel-grid panel-no-style">
							<div id="pgc-57-2-0" class="panel-grid-cell">
								<div id="panel-57-2-0-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="7">
									<div class="so-widget-sow-editor so-widget-sow-editor-base">
										<h3 class="widget-title"><?php _e( 'Principles', 'dazzling' );?></h3>
										<div class="siteorigin-widget-tinymce textwidget"></div>
									</div>
								</div>
							</div>
						</div>
						<div id="pg-57-3" class="panel-grid panel-has-style">
							<div class="panel-row-style panel-row-style-for-57-3">
								<div id="pgc-57-3-0" class="panel-grid-cell">
									<div id="panel-57-3-0-0" class="so-panel widget widget_sow-image panel-first-child" data-index="8">
										<div class="panel-widget-style panel-widget-style-for-57-3-0-0">
											<div class="so-widget-sow-image so-widget-sow-image-default-bd5cd9da0588">
												<div class="sow-image-container"><img src="<?php echo get_field('принципы')[0]['изображение']?>" width="1" height="1" sizes="(max-width: 1px) 100vw, 1px" class="so-widget-image"></div>
											</div>
										</div>
									</div>
									<div id="panel-57-3-0-1" class="so-panel widget widget_sow-editor panel-last-child" data-index="9">
										<div class="spisok panel-widget-style panel-widget-style-for-57-3-0-1">
											<div class="so-widget-sow-editor so-widget-sow-editor-base">
												<h3 class="widget-title">1</h3>
												<div class="siteorigin-widget-tinymce textwidget">
													<h3><?php echo get_field('принципы')[0]['заголовок']?></h3>
													<p><?php echo get_field('принципы')[0]['описание']?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="pgc-57-3-1" class="panel-grid-cell">
									<div id="panel-57-3-1-0" class="so-panel widget widget_sow-image panel-first-child" data-index="10">
										<div class="panel-widget-style panel-widget-style-for-57-3-1-0">
											<div class="so-widget-sow-image so-widget-sow-image-default-bd5cd9da0588">
												<div class="sow-image-container"><img src="<?php echo get_field('принципы')[1]['изображение']?>" width="1" height="1" sizes="(max-width: 1px) 100vw, 1px" class="so-widget-image"></div>
											</div>
										</div>
									</div>
									<div id="panel-57-3-1-1" class="so-panel widget widget_sow-editor panel-last-child" data-index="11">
										<div class="spisok panel-widget-style panel-widget-style-for-57-3-1-1">
											<div class="so-widget-sow-editor so-widget-sow-editor-base">
												<h3 class="widget-title">2</h3>
												<div class="siteorigin-widget-tinymce textwidget">
													<h3><?php echo get_field('принципы')[1]['заголовок']?></h3>
													<p><?php echo get_field('принципы')[1]['описание']?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="pgc-57-3-2" class="panel-grid-cell">
									<div id="panel-57-3-2-0" class="so-panel widget widget_sow-image panel-first-child" data-index="12">
										<div class="panel-widget-style panel-widget-style-for-57-3-2-0">
											<div class="so-widget-sow-image so-widget-sow-image-default-bd5cd9da0588">
												<div class="sow-image-container"><img src="<?php echo get_field('принципы')[2]['изображение']?>" width="1" height="1" sizes="(max-width: 1px) 100vw, 1px" class="so-widget-image"></div>
											</div>
										</div>
									</div>
									<div id="panel-57-3-2-1" class="so-panel widget widget_sow-editor panel-last-child" data-index="13">
										<div class="spisok panel-widget-style panel-widget-style-for-57-3-2-1">
											<div class="so-widget-sow-editor so-widget-sow-editor-base">
												<h3 class="widget-title">3</h3>
												<div class="siteorigin-widget-tinymce textwidget">
													<h3><?php echo get_field('принципы')[2]['заголовок']?></h3>
													<p><?php echo get_field('принципы')[2]['описание']?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php 
					if( have_rows('компетенции') ): 
						$output ='';
						$com = 0;?>
						<div class="about-bottom-div">
							<div class="competencies-title-div">
								<div class="competencies-title"><h3><?php _e( 'Competencies', 'dazzling' );?></h3></div>
							</div>
							<div class="competencies-div">
							<?php while ( have_rows('компетенции') ) : the_row(); 
								?><div class="competencies-col"><?php
								?><h3><?php the_sub_field('заголовок'); ?></h3><?php
								if( have_rows('пункты') ): ?>
									<?php while ( have_rows('пункты') ) : the_row(); $com++;?>
										<p class="tab-competency<?php echo $com; if($com == 1) echo ' active'?>"><?php the_sub_field('название'); ?></p>
										<?php ob_start(); ?>
										<div class="div-competency div-competency<?php echo $com?>">
											<h3 class="div-competency-title"><?php the_sub_field('название'); ?></h3>
											<div class="competency-img" style="background-image:url('<?php echo get_sub_field('изображение')['sizes']['large']; ?>')"></div>
											<p><?php the_sub_field('описание'); ?></p>
										</div>
										<?php $output .= ob_get_contents(); ?>
										<?php ob_end_clean(); ?>
									<?php endwhile; ?>
								<?php endif;
								?></div><?php
							endwhile; ?>
							</div>
							<?php echo $output; ?>
						</div>
					<?php endif;
					
					$images = get_field('клиенты');
					if( $images ): ?>
					
						<div class="about-bottom-div">
							<div class="clients-title-div">
								<div class="clients-title"><h3><?php 
								$title = get_field('заголовок_блока'); if($title){ 
									echo $title; 
								} else {
									_e( 'Clients', 'dazzling' );
								} ?></h3></div>
								<?php $description = get_field('описание_блока'); if($description){ ?><div class="clients-description"><?php echo $description?></div><?php } ?>
							</div>
							<div class="clients-div">
								<div class="clients">
									<?php foreach( $images as $image ): ?>
										<div class="client">
											<?php if(ae_detect_ie_edge()) {?>
												<img class="client-orig client-image" src="<?php echo $image['sizes']['magnat-orig-image']; ?>">
												<img class="client-gray client-image" src="<?php echo $image['sizes']['magnat-bw-image']; ?>" title="<?php echo $image['title']?>">
											<?php } else {?>
												<img class="client-orig-gs client-image" src="<?php echo $image['sizes']['magnat-orig-image']; ?>" title="<?php echo $image['title']?>">
											<?php }?>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="clear-both"></div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</article>
		<?php endwhile; ?>
	</main>
</div>
<?php get_template_part( 'footer_part' ) ?> 
<?php get_footer(); ?>