<?php /*

	ACFPE Content Columns

*/
	$uniqueID = get_sub_field('unique_id');
	$eClass = get_sub_field('element_class');
	$pTitle = get_sub_field('title');
	$cols = get_sub_field('columns');
	$condensedWidth = get_sub_field('condensed_width');
?>

<?php if(have_rows('columns_content')):?>

	<section class="p-element <?php echo $eClass; ?> columns-element clearfix <?php echo '',($condensedWidth ? 'container' : '');?>">
		<?php if($condensedWidth = false){?>
		<div class="row">
		<?php };?>
		<?php if( $pTitle ) { ?><h2 class="p-title columns-title"><?php echo $pTitle; ?></h2><?php }; ?>

		<?php while(have_rows('columns_content')): the_row();?>
			<div class="matchHeight column <?php echo $cols; ?>">
				<?php
					$title = get_sub_field('column_title');
					$content = get_sub_field('column_content');
					
				?>

				<?php if($title){
					echo '<h3 class="column_title">' . $title . '</h3>';
				};?>
				<?php if($content){
					echo $content;
				}; ?>

				<?php if(get_sub_field('column_map')){ ?>
					<?php
						global $mapScripts;
					   	$mapScripts = true;
						$location = get_sub_field('column_map');
						$mapheight = get_sub_field('map_height');;
						$mapID = get_sub_field('unique_id');
					?>
					<div class="map-element">
						<style>
						.map-element .acf-map#<?php echo $mapID; ?>{
							height:<?php echo $mapheight;?>px;
						}
						</style>
						<div class="post-map acf-map" id="<?php echo $mapID; ?>">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<?php if (get_sub_field('get_directions')):?>
						<?php
							$addr = $location['address'];
							$addr = str_replace(" ", "+", $addr);
						?>
						<a class="get-directions pull-rightx" href="http://maps.google.com/maps?f=d&hl=en&geocode=&daddr=<?php echo $addr; ?>" target="_blank">Get directions from Google Maps&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
					<?php endif; ?>
				<?php }; ?>

			</div>
		<?php endwhile; ?>
		<?php if($condensedWidth = false){?>
			</div>
		<?php }; ?>
	</section>
<?php endif; ?>

