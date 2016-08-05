<?php /*

	ACF Blocks Element Template

*/ ?>

<?php
	$eClass = get_sub_field('element_class');
	$uniqueID = 'eID-'.get_sub_field('unique_id');
	$cWidth = get_sub_field('condensed_width');
	$block_cols = get_sub_field('block_columns');
	$blocks_link = get_sub_field('blocks_link');
	$blocks_link_text = get_sub_field('blocks_link_text');
	$blocks_link_url = get_sub_field('blocks_link_url');
?>

<section class="p-element blocks-element clearfix <?php echo $eClass; ?>" id="<?php echo $uniqueID; ?>">

	<div class="container">

		<?php if(have_rows('block_items')): ?>

			<div class="row blocks">
				<div class="<?php echo $cWidth ? 'col-xs-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2' : 'col-xs-12'; ?>">
					<div class="row">
					<?php $i = 0; while(have_rows('block_items')): the_row();?>
						<?php
							$block_title = get_sub_field('block_title');
							$block_background_type = get_sub_field('block_background_type');
							$block_background_color = get_sub_field('background_color');
							$block_background_image = get_sub_field('background_image');
							if($block_background_image){
								$block_background_image_url = wp_get_attachment_image_src( $block_background_image, 'block_thumb' );
							};

							$block_media = get_sub_field('block_media');
							$block_media_image = get_sub_field('block_media_image');
							if($block_media_image){
								$block_media_imageurl = wp_get_attachment_image_src( $block_media_image, 'block_thumb' );
							};

							$block_media_video = get_sub_field('block_media_video');
							$block_media_audio = get_sub_field('block_media_audio');
							$block_media_audio_file = $block_media_audio['url'];
							$block_media_location = get_sub_field('block_media_location');

							$block_description = get_sub_field('block_description');
							$block_invert_text_color = get_sub_field('block_invert_text_color');

							$block_link = get_sub_field('block_link');
							$block_link_text = get_sub_field('block_link_text');
							$block_link_style = get_sub_field('block_link_style');
							$block_link_external = get_sub_field('block_link_external');
							$i++;
						?>

						<div class="block_column <?php echo $block_cols; ?>">
							<div class="block matchHeight block_bg_<?php echo $block_background_type; ?> <?php echo $block_invert_text_color ? 'color_invert' : ''; ?> media-<?php echo $block_media_location;?>"
								<?php if($block_background_type === 'image'){?>
									style="background: transparent url('<?php echo $block_background_image_url[0]; ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;" 
								<?php }else if($block_background_type === 'color'){?>
									style="background-color: <?php echo $block_background_color; ?>;"
								<?php }; ?>
							>
								<?php if($block_title){?>
									<h3 class="block_title"><?php echo $block_title; ?></h3>
								<?php }; ?>

								<?php if($block_media_location != 'top'){?>
									<div class="block_description">
										<?php echo $block_description; ?>
									</div>
								<?php }; ?>
								<?php if($block_media === 'image'){ ?>
									<img class="block_media_image" src="<?php echo $block_media_imageurl[0]; ?>"/>
								<?php }; ?>
								<?php if($block_media === 'video'){ ?>
									<div class="block-media-video embed-responsive embed-responsive-16by9">
										<?php echo $block_media_video; ?>
									</div>
								<?php }; ?>
								<?php if($block_media === 'audio'){ ?>
									<div class="block_media_audio">
									
										<audio preload="auto" controls id="audio_<?php echo $i; ?>">
											<source src="<?php echo $block_media_audio_file; ?>" type="audio/mp3"/>
											Your browser does not support the audio element. <a href="<?php echo $block_media_audio_file; ?>" title="mp3 audio file">Download</a>
										</audio>

										<script type="text/javascript">
											window.onload = function() {
												jQuery( 'audio' ).audioPlayer();
											};
										</script>

									</div>
								<?php }; ?>

								<?php if($block_media_location === 'top'){?>
									<div class="block_description">
										<?php echo $block_description; ?>
									</div>
								<?php }; ?>

								<?php if($block_link){?><a class="clearfix block_link btn btn-sm <?php echo $block_link_style; ?>" href="<?php echo $block_link; ?>" title="<?php echo $block_title; ?> target="<?php echo $block_link_external ? '_blank' : '_top'; ?>">
									<?php echo $block_link_text ? $block_link_text : 'Read More'; ?>
								</a><?php }; ?>

							</div>
						</div>

					<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if($blocks_link){ ?>

			<div class="row">
				<div class="col-xs-12 col-sm-4 col-sm-offset-4">
					<a class="btn btn-ls btn-info btn-block" href="<?php echo $blocks_link_url; ?>"><?php echo $blocks_link_text; ?></a>
				</div>
			</div>

		<?php }; ?>

	</div>

</section>
<div class="clearfix"></div>