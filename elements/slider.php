<?php /*

	ACFPE Slider Element Template

*/

	$eClass = get_sub_field('element_class');
	$uniqueID = 'eID-'.get_sub_field('unique_id');
	$sliderWidth = get_sub_field('slider_width');
	$sliderTheme = get_sub_field('slider_theme');
	$sliderEffect = get_sub_field('slider_effect');
	$animationSpeed = get_sub_field('animation_speed');
	$pauseDuration = get_sub_field('pause_duration');
	$showThumbnails = get_sub_field('show_thumbnails');
	$showControl = get_sub_field('show_control_navigation');
?>

<section class="slider-wrapper clearfix theme-<?php echo $sliderTheme; ?> <?php echo $eClass; ?>" id="<?php echo $uniqueID; ?>">

<?php if (!$sliderWidth){?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
<?php }; ?>

				<div id="slider-<?php echo $uniqueID; ?>" class="carousel slide carousel-<?php echo $sliderEffect;?> carousel-theme-<?php echo $sliderTheme; ?>" data-ride="carousel">

					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php $i = 0;
							while(have_rows('slides')): the_row();
							$slide_imageID = get_sub_field('slide_image');
							$active = '';
							if($i == 0){$active = "active";};
						?>
							<li class="<?php echo $active; ?>" data-target="#slider-<?php echo $uniqueID; ?>" data-slide-to="<?php echo $i; ?>"></li>
							<?php $i++; ?>
						<?php endwhile; ?>
					</ol>

					<!-- Slides -->
					<div class="carousel-inner" role="listbox">

						<?php $n = 0;
							while(have_rows('slides')): the_row();
							$slide_title = get_sub_field('slide_title');
							$slide_title_slug = sanitize_title( $slide_title );
							$slide_content = get_sub_field('slide_content');
							$slide_imageID = get_sub_field('slide_image');
							$slide_link = get_sub_field('slide_link');
							$slide_url = get_sub_field('slide_url');
							$slide_link_text = get_sub_field('slide_link_text');
							$active = '';
							if($n == 0){$active = "active";};
							if($slide_imageID){
								$slide_image_src = wp_get_attachment_image_src($slide_imageID, 'page_banner');
								$slide_large_src = wp_get_attachment_image_src($slide_imageID, 'page_banner_large');
								$slide_mobile_src = wp_get_attachment_image_src($slide_imageID, 'page_banner_mobile');
								//$slide_thumb_src = wp_get_attachment_image_src($slide_imageID, 'slide_thumb');
							}; ?>

							<div class="item <?php echo $active; ?>">

								<?php if($slide_link){?>
									<a href="<?php echo $slide_link;?>">

										<picture>
											<source srcset="<?php echo $slide_mobile_src[0]; ?>" media="(max-width: 991px)">
											<source srcset="<?php echo $slide_large_src[0]; ?>" media="(max-width: 1140px)">
											<img src="<?php echo $slide_image_src[0]; ?>" alt="slide image - <?php echo $slide_title; ?>">
										</picture>


									</a>
								<?php } else { ?>
									<picture>
										<source srcset="<?php echo $slide_mobile_src[0]; ?>" media="(max-width: 991px)">
										<source srcset="<?php echo $slide_large_src[0]; ?>" media="(max-width: 1140px)">
										<img src="<?php echo $slide_image_src[0]; ?>" alt="slide image - <?php echo $slide_title; ?>">
									</picture>
								<?php };?>

								<?php if($slide_title || $slide_content){ ?>
								<div id="<?php echo $slide_title_slug; ?>" class="carousel-caption">
									<?php if($slide_title){ ?><h3 class="slide-title"><?php echo $slide_title; ?></h3><?php }; ?>
									<div class="slide-content"><?php echo $slide_content; ?></div>
									<?php if($slide_link){?><a class="slide_link" href="<?php echo $slide_url; ?>"><?php echo $slide_link_text; ?></a><?php }; ?>
								</div>
								<?php };?>
							</div>

							<?php $n++;?>
						<?php endwhile; ?>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#slider-<?php echo $uniqueID; ?>" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#slider-<?php echo $uniqueID; ?>" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>

				</div>

<?php if (!$sliderWidth){?>
			</div>
		</div>
	</div>
<?php }; ?>



</section>

<script type="text/javascript">
	window.onload = function() {
		jQuery('#slider-<?php echo $uniqueID; ?>').carousel({
			interval: <?php echo $pauseDuration; ?>
		})
	};
</script>

