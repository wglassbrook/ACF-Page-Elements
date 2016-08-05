<?php /*

	ACFPE Title Element Template

*/ ?>

<?php
	$eClass = get_sub_field('element_class');
	$uniqueID = 'eID-'.get_sub_field('unique_id');
	$pTitle = get_sub_field('title');
?>

<section class="p-element title_element clearfix <?php echo $eClass; ?>" id="<?php echo $uniqueID; ?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
			
				<?php if( $pTitle ) { ?><?php echo $pTitle; ?><?php }; ?>

			</div>
		</div>
	</div>
</section>