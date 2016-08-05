<?php /*

	ACF Blocks Element Template

*/ ?>

<?php
	$eClass = get_sub_field('element_class');
	$uniqueID = 'eID-'.get_sub_field('unique_id');
	$cWidth = get_sub_field('content_width');
	$block_cols = get_sub_field('block_columns');
	$blocks_link = get_sub_field('blocks_link');
	$blocks_link_text = get_sub_field('blocks_link_text');
	$blocks_link_url = get_sub_field('blocks_link_url');
?>

<section class="p-element blocks-element clearfix <?php echo $eClass; ?>" id="<?php echo $uniqueID; ?>">

	<div class="container">

		<?php if(have_rows('block_items')): ?>

			<div class="row">
			<?php while(have_rows('block_items')): the_row();?>
				<?php
					$block_title = get_sub_field('block_title');
					$block_image_id = get_sub_field('block_image');
					$block_image_url = wp_get_attachment_image_src( $block_image_id, 'block_thumb' );
					$block_description = get_sub_field('block_description');
					$block_link = get_sub_field('block_link');
					$block_link_text = get_sub_field('block_link_text');
					$background_img = get_sub_field("image_as_background");
				?>

				<div class="blocks <?php echo $block_cols; ?>">

					<?php if($background_img){?>

						<?php if($block_link){?><a href="<?php echo $block_link; ?>" title="<?php echo $block_title; ?>"><?php }; ?>

						<div class="image_block matchHeight"  <?php if($background_img){?>style="background: transparent url('<?php echo $block_image_url[0]; ?>') no-repeat top center; background-size:100%; height:250px;" <?php }; ?>>
							<h3><?php echo $block_title; ?></h3>
							<?php echo $block_description; ?>
							<?php if($block_link){?><a class="btn btn-sm btn-warning" href="<?php echo $block_link; ?>" title="<?php echo $block_title; ?>">
								<?php if($block_link_text){echo $block_link_text;}else{echo 'Read More';}; ?>
							</a><?php }; ?>
						</div>

						<?php if($block_link){?></a><?php }; ?>

					<?php }else{?>

						<div class="description_block matchHeight">

							<h3><?php echo $block_title; ?></h3>

							<div class="block_desc">
								<?php if(!$background_img && $block_image_url){?>
									<div class="block_img">
										<img src='<?php echo $block_image_url[0]; ?>' alt="block image" />
									</div>
								<?php }; ?>
								<?php echo $block_description; ?>
							</div>

							<?php if($block_link){?><a class="btn btn-sm btn-info" href="<?php echo $block_link; ?>" title="<?php echo $block_title; ?>">
								<?php if($block_link_text){echo $block_link_text;}else{echo 'Read More';}; ?>
							</a><?php }; ?>

						</div>

					<?php }; ?>

				</div>

			<?php endwhile; ?>
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