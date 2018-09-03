<?php
/**
 * Template Name: Вакансии
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
					<div id="pl-58" class="panel-layout">
						<div id="pg-58-0" class="panel-grid panel-has-style">
							<div class="panel-row-style panel-row-style-for-58-0">
								<div id="pgc-58-0-0" class="panel-grid-cell">
									<div id="panel-58-0-0-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="0">
										<div class="panel-widget-style panel-widget-style-for-58-0-0-0">
											<div class="so-widget-sow-editor so-widget-sow-editor-base">
												<h3 class="widget-title"><?php the_field('заголовок_текстового_блока')?></h3>
												<div class="siteorigin-widget-tinymce textwidget">
													<p><?php the_field('текст')?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="pgc-58-0-1" class="panel-grid-cell">
									<div id="panel-58-0-1-0" class="so-panel widget widget_siteorigin-panels-builder panel-first-child panel-last-child" data-index="1">
										<div class="custom-mobile-collapse panel-widget-style panel-widget-style-for-58-0-1-0">
											<div id="pl-w5ac79b6a5573f" class="panel-layout">
												<div id="pg-w5ac79b6a5573f-0" class="panel-grid panel-has-style">
													<div class="custom-mobile-collapse panel-row-style panel-row-style-for-w5ac79b6a5573f-0">
														<div id="pgc-w5ac79b6a5573f-0-0" class="panel-grid-cell">
															<div id="panel-w5ac79b6a5573f-0-0-0" class="so-panel widget widget_cl-counter widget-cl-counter panel-first-child" data-index="0">
																<div class="panel-widget-style panel-widget-style-for-w5ac79b6a5573f-0-0-0">
																	<div class="cl-counter" data-duration="1000">
																		<div class="cl-counter-value"><span class="cl-counter-value-part type_number" data-final="<?php echo $num = get_field('показатели')[0]['число']?>"><?php echo $num ?></span></div>
																		<div class="cl-counter-title"><?php echo get_field('показатели')[0]['текст']?></div>
																	</div>
																</div>
															</div>
															<div id="panel-w5ac79b6a5573f-0-0-1" class="so-panel widget widget_cl-counter widget-cl-counter panel-last-child" data-index="1">
																<div class="cl-counter" data-duration="1000">
																	<div class="cl-counter-value"><span class="cl-counter-value-part type_number" data-final="<?php echo $num = get_field('показатели')[1]['число']?>"><?php echo $num ?></span></div>
																	<div class="cl-counter-title"><?php echo get_field('показатели')[1]['текст']?></div>
																</div>
															</div>
														</div>
														<div id="pgc-w5ac79b6a5573f-0-1" class="panel-grid-cell">
															<div id="panel-w5ac79b6a5573f-0-1-0" class="so-panel widget widget_cl-counter widget-cl-counter panel-first-child panel-last-child" data-index="2">
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
								</div>
							</div>
						</div>
						<?php 
						$img = get_field('изображение');
						if($img){
							?><div id="pg-58-1" class="panel-grid panel-has-style">
								<div class="panel-row-style panel-row-style-for-58-1">
									<div id="pgc-58-1-0" class="panel-grid-cell">
										<div id="panel-58-1-0-0" class="so-panel widget widget_media_image panel-first-child panel-last-child" data-index="2"><img style="max-width: 100%; height: auto;" src="<?php echo $img?>" class="image" alt="" style="max-width: 100%; height: auto;"></div>
									</div>
								</div>
							</div><?php
						} ?>

						
						<div id="pg-58-4" class="panel-grid panel-has-style">
							<div class="panel-row-style panel-row-style-for-58-4">
								<div id="pgc-58-4-0" class="panel-grid-cell">
									<div id="panel-58-4-0-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="7">
										<div class="panel-widget-style panel-widget-style-for-58-4-0-0">
											<div class="so-widget-sow-editor so-widget-sow-editor-base">
												<div class="siteorigin-widget-tinymce textwidget">
													<h1><?php the_title()?></h1>
													<p><?php the_field('описание_блока_вакансии')?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="pgc-58-4-1" class="panel-grid-cell">
									<div id="panel-58-4-1-0" class="so-panel widget widget_siteorigin-panels-builder panel-first-child panel-last-child" data-index="8">
										<div id="pl-w5ace06d2452dd" class="panel-layout">
											<div id="pg-w5ace06d2452dd-0" class="panel-grid panel-no-style">
												<div id="pgc-w5ace06d2452dd-0-0" class="panel-grid-cell">
													<div id="panel-w5ace06d2452dd-0-0-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="0">
														<div class="so-widget-sow-editor so-widget-sow-editor-base">
															<h3 class="widget-title"><?php the_field('заголовок_блока_у_нас')?></h3>
															<div class="siteorigin-widget-tinymce textwidget">
																<hr>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="pg-w5ace06d2452dd-1" class="panel-grid panel-has-style">
												<div class="noCollapse panel-row-style panel-row-style-for-w5ace06d2452dd-1">
													<div id="pgc-w5ace06d2452dd-1-0" class="panel-grid-cell">
														<div id="panel-w5ace06d2452dd-1-0-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="1">
															<div class="strong-text panel-widget-style panel-widget-style-for-w5ace06d2452dd-1-0-0">
																<div class="so-widget-sow-editor so-widget-sow-editor-base">
																	<div class="siteorigin-widget-tinymce textwidget">
																		<p><strong><?php echo get_field('у_нас')[0]['текст']?></strong></p>
																	</div>
																</div>
															</div>
														</div>
														<div id="panel-w5ace06d2452dd-1-0-1" class="so-panel widget widget_sow-editor panel-last-child" data-index="2">
															<div class="strong-text panel-widget-style panel-widget-style-for-w5ace06d2452dd-1-0-1">
																<div class="so-widget-sow-editor so-widget-sow-editor-base">
																	<div class="siteorigin-widget-tinymce textwidget">
																		<p><strong><?php echo get_field('у_нас')[3]['текст']?></strong></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="pgc-w5ace06d2452dd-1-1" class="panel-grid-cell">
														<div id="panel-w5ace06d2452dd-1-1-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="3">
															<div class="strong-text panel-widget-style panel-widget-style-for-w5ace06d2452dd-1-1-0">
																<div class="so-widget-sow-editor so-widget-sow-editor-base">
																	<div class="siteorigin-widget-tinymce textwidget">
																		<p><strong><?php echo get_field('у_нас')[1]['текст']?></strong></p>
																	</div>
																</div>
															</div>
														</div>
														<div id="panel-w5ace06d2452dd-1-1-1" class="so-panel widget widget_sow-editor panel-last-child" data-index="4">
															<div class="strong-text panel-widget-style panel-widget-style-for-w5ace06d2452dd-1-1-1">
																<div class="so-widget-sow-editor so-widget-sow-editor-base">
																	<div class="siteorigin-widget-tinymce textwidget">
																		<p><strong><?php echo get_field('у_нас')[4]['текст']?></strong></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="pgc-w5ace06d2452dd-1-2" class="panel-grid-cell">
														<div id="panel-w5ace06d2452dd-1-2-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="5">
															<div class="strong-text panel-widget-style panel-widget-style-for-w5ace06d2452dd-1-2-0">
																<div class="so-widget-sow-editor so-widget-sow-editor-base">
																	<div class="siteorigin-widget-tinymce textwidget">
																		<p><strong><?php echo get_field('у_нас')[2]['текст']?></strong></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					if( have_rows('вакансии') ):
						?><div class="job-items"><?php
						while ( have_rows('вакансии') ) : the_row();
							?><div class="job-item"><?php
								?><div class="job-item-title"><?php
									?><div class="job-item-table"><?php
										?><div class="job-item-left"><h3><?php
											echo get_sub_field('заголовок');
										?></h3></div><?php
										?><div class="job-item-right"><?php
											$img = get_sub_field('изображение')['url'];
											if($img) { ?><img class="job-img hidden-sm hidden-md hidden-lg" src="<?php echo $img;?>"><?php }
											echo get_sub_field('краткое_описание');
										?></div><?php
									?></div><?php
								?></div><?php
								?><div class="job-item-description"><?php
									?><div class="job-item-table"><?php
										?><div class="job-item-left hidden-xs"><?php
											ob_start();
											if($img) { ?><img class="job-img hidden-xs" src="<?php echo $img;?>"><?php }
											$mail = get_sub_field('email'); 
											_e( 'Send your CV to email:', 'dazzling' );
											?><br><a href="mailto:<?php echo $mail?>"><strong><?php echo $mail ?></strong></a><br><a class="btn" href="mailto:<?php echo $mail?>"><?php _e( 'Respond', 'dazzling' ); ?></a><?php
											$output = ob_get_contents();
											ob_end_clean();
											echo $output;
										?></div><?php
										?><div class="job-item-right"><?php
											echo get_sub_field('описание');
										?></div><?php
										?><div class="job-item-left hidden-sm hidden-md hidden-lg"><?php
											echo $output;
										?></div><?php
									?></div><?php
								?></div><?php
							?></div><?php
						endwhile;
						?></div><?php
					endif;
					?>
				</div>
			</article>
		<?php endwhile; ?>
	</main>
</div>
<?php get_template_part( 'footer_part' ) ?> 
<?php get_footer(); ?>
