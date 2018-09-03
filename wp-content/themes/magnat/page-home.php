<?php
/**
 * Template Name: Главная
 *
 * This is the template that displays full width page without sidebar
 *
 * @package dazzling
 */
 
$frontpage_id = get_option( 'page_on_front' );
$template_directory = get_template_directory_uri();

get_header(); ?>

<?php get_template_part( 'header_part' ) ?>
<div class="m-slide-items-container">
	<div id="m-slide-items" class="m-slide-items owl-carousel owl-theme" style="height:1080px;width:1920px;">
		<div id="msi1" class="item m-slide-item" data-tag="home" style="background-image:url('<?php echo $template_directory.'/img/slide01.svg?v='.filemtime( get_template_directory().'/img/slide01.svg' )?>');">
			<div id="msi1-bg-item-1" class="msi1-bg-item" style="background-image:url('<?php echo $template_directory.'/img/slide01_1.svg?v='.filemtime( get_template_directory().'/img/slide01_1.svg' )?>');"></div>
			<div id="msi1-bg-item-2" class="msi1-bg-item" style="background-image:url('<?php echo $template_directory.'/img/slide01_2.svg?v='.filemtime( get_template_directory().'/img/slide01_2.svg' )?>');"></div>
			<div id="msi1-bg-item-3" class="msi1-bg-item" style="background-image:url('<?php echo $template_directory.'/img/slide01_3.svg?v='.filemtime( get_template_directory().'/img/slide01_3.svg' )?>');"></div>
			<div class="m-slide-content">
				<div class="center-center">
					<h1 class="sitelogo"><img src="<?php echo $template_directory.'/img/logo.svg?v=123'.filemtime( get_template_directory().'/img/logo.svg' )?>"><?php echo get_bloginfo('name').' - '.get_bloginfo('description')?></h1>
				</div>
				<?php
				$args = array(
					'numberposts' => 1,
					'post_type'   => 'news',
				);
				$posts = get_posts( $args );
				if(count($posts)>0){
					?><div class="more-url ajax-load"><a href="<?php echo get_post_type_archive_link('news')?>"><span><?php _e( 'News', 'dazzling' );?></span></a></div><?php
				}
				?>
			</div>
		</div>
		<div id="msi2" class="item m-slide-item" data-tag="about" style="background-image:url('<?php echo $template_directory.'/img/slide02.svg?v='.filemtime( get_template_directory().'/img/slide02.svg' )?>');">
			<div class="m-slide-item-container">
				<div class="m-slide-item-title">
					<div class="m-slide-item-title-div"><?php _e( 'Company', 'dazzling' );?></div>
				</div>
				<div class="m-slide-content">
					<div class="center-center video-up">
						<video id="load-slide" class="video-about" preload="none" playsinline webkit-playsinline webkit-playsinline="true" playsinline="true">
							<source src="<?php the_field('интро',$frontpage_id)?>" type="video/mp4">
							<?php _e( 'Video not supported', 'dazzling' );?>
						</video>
					</div>
					<div class="center-center video-down">
						<video id="showreal" class="video-about" preload="none" playsinline webkit-playsinline webkit-playsinline="true" playsinline="true">
							<source src="<?php the_field('шоурил',$frontpage_id)?>" type="video/mp4">
							<?php _e( 'Video not supported', 'dazzling' );?>
						</video>
					</div>
					<div class="more-url ajax-load"><a href="<?php echo get_field('о_компании',$frontpage_id)?>"><span><?php _e( 'View more', 'dazzling' );?></span></a></div>
					<div class="msi2-mobile" style="background-image:url('<?php echo get_field('превью')['url'] ?>')">
						<div class="msi2-mobile-before">
							<div id="circularG"><div id="circularG_1" class="circularG"></div><div id="circularG_2" class="circularG"></div><div id="circularG_3" class="circularG"></div><div id="circularG_4" class="circularG"></div><div id="circularG_5" class="circularG"></div><div id="circularG_6" class="circularG"></div><div id="circularG_7" class="circularG"></div><div id="circularG_8" class="circularG"></div></div>
							<div class="msi2-mobile-before-text"><?php _e( 'Watch<br>video', 'dazzling' );?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="msi3" class="item m-slide-item" data-tag="projects" style="background-image:url('<?php echo $template_directory.'/img/slide03.svg?v='.filemtime( get_template_directory().'/img/slide03.svg' )?>');">
			<div class="m-slide-item-container">
				<div class="m-slide-content">
					<div class="m-slide-item-title">
						<div class="m-slide-item-title-div"><?php _e( 'Projects', 'dazzling' );?></div>
					</div>
					<div class="center-center">
						<div class="msi3-container">
							<div class="portfolio-slider <?php if(!ae_detect_ie_edge()) echo 'portfolio-slider-mask'?>">
								<div class="portfolio-slider-container">
									<div class="portfolio-slider-owl">
										<?php
										$num = 0;
										$args = array(
											'numberposts' 	=> -1,
											'post_type' 	=> 'project',
											'orderby'       => 'menu_order',
											'order'         => 'ASC',
											'meta_query' => array(
												array(
													'key' => 'закрепить_на_главной',
													'value' => true,
													'compare' => '=='
												),
											),
										);
										$posts = get_posts( $args );
										if(!$posts){
											$args = array(
												'numberposts' => 3,
												'post_type'   => 'project',
											);
											$posts = get_posts( $args );
										}
										if($posts){
											foreach($posts as $post){ setup_postdata($post);
												if($num==0){
													$slURL = get_permalink();
													$slTitle = get_the_title();
													$slDescr = get_field('краткое_описание');
												}
												?><div class="portfolio-slider-item" data-dbg="<?php echo get_field('превью')['url']?>" <?php $mbg = get_field('превью_для_мобильного')['url']; if($mbg) {?>data-mbg="<?php echo $mbg?>"<?php }?> data-title="<?php the_title()?>" <?php $d = get_field('краткое_описание'); if($d){?>data-description="<?php echo $d?>"<?php }?> data-url="<?php the_permalink()?>"></div><?php
												$num++;
											}
										}
										wp_reset_postdata();
										?>
									</div>
								</div>
							</div>
							<?php if(ae_detect_ie_edge()) {?>
								<div class="triangles">
									<div id="triangle1" class="triangle"><div class="triangle-bg"><div class="triangle-bg-confrotate"></div></div></div>
									<div id="triangle2" class="triangle"><div class="triangle-bg"><div class="triangle-bg-confrotate"></div></div></div>
									<div id="triangle3" class="triangle"><div class="triangle-bg"><div class="triangle-bg-confrotate"></div></div></div>
								</div>
							<?php }?>
							<div class="circles <?php if(ae_detect_ie()) echo 'circles-ie'?>">
								<div class="circle spin" id="circle1"><div class="circle-confrotate"></div></div>
								<div class="circle spin" id="circle2"><div class="circle-confrotate"></div></div>
								<div class="circle spin" id="circle3"><div class="circle-confrotate"></div></div>
							</div>
							<div class="circle-more"><div class="circle-more-text m-slide-items-nav-item ajax-load"><a href="<?php echo $slURL?>"><?php _e( 'View more', 'dazzling' );?></a></div></div>
						</div>
					</div>
					<?php 
					$args = array(
						'numberposts' => 1,
						'post_type'   => 'project',
					);
					$posts = get_posts( $args );
					if(count($posts)>0){ 
						?><div class="more-url ajax-load"><a href="<?php echo get_post_type_archive_link('project')?>"><span><?php _e( 'View all', 'dazzling' );?></span></a></div><?
					} ?>
					<div class="ajax-load portfolio-slider-title-div swipe">
						<a class="portfolio-slider-title" href="<?php echo $slURL?>"><?php echo $slTitle?></a>
						<?php if($slDescr){?><a class="portfolio-slider-description" href="<?php echo $slURL?>"><?php echo $slDescr?></a><?php }?>
					</div>
					<div class="portfolio-slider-nav">
						<div class="portfolio-slider-nav-prev"></div>
						<div class="portfolio-slider-nav-next"></div>
					</div>
					<div class="portfolio-slider-next"><span><?php _e( 'Next', 'dazzling' );?></span></div>
				</div>
			</div>
		</div>
		<div id="msi4" class="item m-slide-item" data-tag="contacts" style="background-image:url('<?php echo $template_directory.'/img/slide04.svg?v='.filemtime( get_template_directory().'/img/slide04.svg' )?>');">
			<div class="contacts-bg"><img src="<?php echo $template_directory.'/img/cont_bg.png'?>"></div>
			<div class="m-slide-item-container">
				<div class="m-slide-item-title">
					<div class="m-slide-item-title-div"><?php _e( 'Contacts', 'dazzling' )?></div>
				</div>
				<div class="center-center">
					<div class="contacts-img-div" style="background-image:url(<?php echo $template_directory.'/img/cont.jpg?v=3'?>)"></div>
					<div class="contacts-text-div">
						<div class="contacts-text-title"><?php echo bloginfo('name') ?></div>
						<div class="contacts-text-adr"><?php echo get_field('адрес',$frontpage_id)?></div>
						<?php
						$link =  get_field('ссылка_на_карту',$frontpage_id);
						if($link){
							?><div class="contacts-text-mapUrl"><a href="<?php echo $link?>" target="_blank"><?php _e( 'View on map', 'dazzling' )?></a></div><?php
						} ?>
						<?php if( have_rows('телефон') ): ?>
							<div class="contacts-text-tel">
								<?php while ( have_rows('телефон') ) : the_row() ?>
									<div class="contacts-text-tel-item"><a href="tel:<?php $tel = get_sub_field('номер'); echo substr_replace( preg_replace( "/[^0-9]/" , '' , $tel ) , '+7' , 0 , 1 ) ?>"><?php echo $tel ?></a></div>
								<?php endwhile ?>
							</div>
						<?php endif ?>
						<?php if( have_rows('электронная_почта') ): ?>
							<div class="contacts-text-mail">
								<?php while ( have_rows('электронная_почта') ) : the_row() ?>
									<div class="contacts-text-mail-item"><a href="mailto:<?php echo $email = get_sub_field('адрес_эл.почты') ?>"><?php echo $email ?></a></div>
								<?php endwhile ?>
							</div>
						<?php endif ?>
					</div>
					<div class="contacts-btns-div hidden show-only-899h-768w">
						<div class="contacts-btn-div"><a href="<?php echo $link?>" target="_blank"><?php _e( 'View on map', 'dazzling' )?></a></div>
						<div class="contacts-btn-div"><a class="contact-modal"><?php _e( 'Contact us', 'dazzling' )?></a></div>
					</div>
					<div class="contacts-btns-div">
						<div class="contacts-btn-div"><a class="contact-modal"><?php _e( 'Contact us', 'dazzling' )?></a></div>
						<div class="contacts-btn-div ajax-load"><a href="<?php echo get_field('вакансии',$frontpage_id)?>"><?php _e( 'Work in a company', 'dazzling' )?></a></div>
						<!--<div class="contacts-btn-div"><a<?php $pc = get_field('полиграфический_центр'); if($pc){?> href="<?php echo $pc?>" target="_blank"<?php }?>><?php _e( 'Polygraphic center', 'dazzling' )?></a></div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="object-show-div">
    <div class="obj-pu-padding">
        <div class="obj-pu-div">
            <?php echo do_shortcode('[contact-form-7 id="'.get_field('форма')->ID.'"]')?>
        </div>
    </div>
    <div class="obj-pu-div-close">×</div>
</div>
<?php get_template_part( 'footer_part' ) ?> 
<?php get_footer(); ?>