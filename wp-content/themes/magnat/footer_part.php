	<?php 
	$frontpage_id = get_option( 'page_on_front' );
	if(is_front_page()){ ?>
			<div class="m-slide-year"><span>2005-<?php echo date('Y') ?></span></div>
			<div class="m-slide-copy"><span>&copy;<?php echo bloginfo('name') ?></span></div>
	<?php } ?>
			<div class="footer">
	<?php if( have_rows('социальные_сети',$frontpage_id) ): $num = 0; ?>
				<!--<div class="m-slide-social">
	<?php while ( have_rows('социальные_сети',$frontpage_id) ) : the_row(); $num++; ?>
					<a <?php $link = get_sub_field('ссылка'); if($link){?>href="<?php echo $link?>" target="_blank"<?php } ?> title="<?php echo $name = get_sub_field('название',$frontpage_id)?>" style="animation-delay:<?php echo 1.3+0.2*$num?>s;"><img src="<?php the_sub_field('иконка') ?>?v=3" alt="<?php echo $name?>"></a>
	<?php endwhile ?>
				</div>-->
	<?php endif ?>
				<div class="mobile-mail">
					<?php
					$email = get_field('электронная_почта',$frontpage_id);
					if($email && count($email)>0){
						?><a href="mailto:<?php echo $email = $email[0]['адрес_эл.почты']?>"><?php echo $email?></a><?php 
					}?>
				</div>
				<div class="mobile-copy">
					<span>&copy; <?php echo date('Y') ?> <?php echo bloginfo('name') ?></span>
				</div>
			</div>
		</div>
	</div><!-- #page -->
	</div>
</div><!-- #body-content -->