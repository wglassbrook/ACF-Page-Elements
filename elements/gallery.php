<?php /*

	ACFPE Gallery Element Template

	Lightbox for gallery https://github.com/lokesh/lightbox2

*/ 

	$eClass = get_sub_field('element_class');
	$cWidth = get_sub_field('condense_width');
	$gallery_cols = get_sub_field('gallery_columns');
	$images = get_sub_field('gallery_images');
	$uniqueID = 'eID-'.get_sub_field('unique_id');
	$x = 0;
?>

<section class="p-element gallery-element <?php echo $eClass; ?>" id="<?php echo $uniqueID; ?>">
	<div class="image-set">
		<?php if($cWidth){?>
			<div class="container">
				<div class="row">
		<?php }; ?>

		<?php foreach ( $images as $image): ?>
			<?php
				$img_id = $image['id'];
				$image_thumb = wp_get_attachment_image_src( $img_id , 'gallery_thumb' );
				$image_url = wp_get_attachment_image_src( $img_id , 'full' );
				$attachment = get_post( $img_id );
				$image_info = [
					'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
					'caption' => $attachment->post_excerpt,
					'description' => $attachment->post_content,
					'href' => get_permalink( $attachment->ID ),
					'src' => $attachment->guid,
					'title' => $attachment->post_title
				];
			?>

			<div class="gallery-image-block matchHeight <?php echo $gallery_cols; ?>">
				<a data-lightbox="<?php echo $uniqueID; ?>" href="<?php echo $image_url[0]; ?>" data-title="<h4><?php echo $image_info['title']; ?></h4><?php echo $image_info['caption']; ?>">
					<img class="gallery-image" src="<?php echo $image_thumb[0]; ?>" alt="<?php echo $image_info['title']; ?>" />
				</a>
			</div>

		<?php endforeach; ?>

		<?php if($cWidth){?>
				</div>
			</div>
		<?php }; ?>
		<div class="clearfix"></div>

	</div>

</section>