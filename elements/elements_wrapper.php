<?php /*

	ACFPE Elements Wrapper Template

*/ 
	$uniqueID = get_sub_field('unique_id');
	$backgroundType = get_sub_field('background_type');
	if(get_sub_field('enable_jumbotron')){
		$elementType = 'jumbo';
		$jumboScale = get_sub_field('jumbotron_scale');
		$topPadding = '';
		$bottomPadding = '';
	} else {
		$elementType = 'element';
		$topPadding = get_sub_field('top_padding');
		$bottomPadding = get_sub_field('bottom_padding');
	};
	$backgroundImageID = get_sub_field('background_image');
	if($backgroundImageID){
		$backgroundImage = wp_get_attachment_image_src($backgroundImageID, 'full');
	};
	$backgroundFixed = get_sub_field('background_fixed');
	$backgroundPosition = get_sub_field('background_position');
	$backgroundRepeat = get_sub_field('background_repeat');
	$backgroundCover = get_sub_field('background_cover');
	if(get_sub_field('background_color')){
		$backgroundColor = get_sub_field('background_color');
	} else {
		$backgroundColor = 'transparent';
	};
	$backgroundVideo = get_sub_field('background_video');
	$hl_color = get_sub_field('headline_color');
	$text_color = get_sub_field('text_color');
	$downArrow = get_sub_field('down_arrow');
?>

<?php if($backgroundType === 'none'){?>

	<style>
		div#wrap-<?php echo $uniqueID; ?>.<?php echo $elementType; ?>-outer{
			<?php if( get_sub_field('enable_jumbotron') ){
			 echo 'height:'.$jumboScale.'vh;'; };?>
		}
	</style>

	<div class="<?php echo $elementType; ?>-outer <?php echo $backgroundType; ?> clearfix" id="wrap-<?php echo $uniqueID; ?>">
		<?php if($downArrow){?>
			<a class="scroll-down" id="down-<?php echo $uniqueID; ?>" href="#down-<?php echo $uniqueID; ?>"><span class="glyphicon glyphicon-menu-down"></span></a>
		<?php }; ?>
		<div class="<?php echo $elementType; ?>-middle">
			<div class="<?php echo $elementType; ?>-inner <?php echo $topPadding;?> <?php echo $bottomPadding; ?>">

<?php }; ?>

<?php if($backgroundType === 'image'){?>

	<style>
		div#wrap-<?php echo $uniqueID; ?>.<?php echo $elementType; ?>-outer{
			<?php if( get_sub_field('enable_jumbotron') ){
			 echo 'height:'.$jumboScale.'vh;'; };?>
			background-color:<?php echo $backgroundColor; ?>;
			background-image:url('<?php echo $backgroundImage[0]; ?>');
			background-attachment: <?php if($backgroundFixed){?>fixed<?php }else{ ?>scroll<?php }; ?>;
			<?php if($backgroundCover){?>
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $backgroundImage[0]; ?>', sizingMethod='scale');
				-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $backgroundImage[0]; ?>', sizingMethod='scale')";
				background-repeat: no-repeat;
				background-position: <?php echo $backgroundPosition; ?>;
			<?php } else{ ?>
				background-repeat: <?php echo $backgroundRepeat; ?>;
				background-position: <?php echo $backgroundPosition; ?>;
			<?php }; ?>
			color: <?php echo $text_color; ?>;
		}
		div#<?php echo $uniqueID; ?> .p-content{
			color: <?php echo $text_color; ?>;
		}
		div#<?php echo $uniqueID; ?> .p-title{
			color:<?php echo $hl_color;?>;
		}
	</style>

	<?php $opaque = get_sub_field('enable_color_overlay');?>
	<?php if($opaque){

		$opaqueHex = get_sub_field('opaque_overlay_color');
		$opaqueRGB = acfpe_hex2rgb($opaqueHex);
		$opaqueAmount = get_sub_field('opacity_amount');
		?>
		<style>
			#wrap-<?php echo $uniqueID; ?> .<?php echo $elementType; ?>-middle{
				background-color:rgba(<?php echo $opaqueRGB[0]; ?>,<?php echo $opaqueRGB[1]; ?>,<?php echo $opaqueRGB[2]; ?>,0.<?php echo $opaqueAmount; ?>);
			}
		</style>

	<?php };?>

	<div class="<?php echo $elementType; ?>-outer <?php echo $backgroundType; ?> clearfix" id="wrap-<?php echo $uniqueID; ?>">
		<?php if($downArrow){?>
			<a class="scroll-down" id="down-<?php echo $uniqueID; ?>" href="#down-<?php echo $uniqueID; ?>"><span class="glyphicon glyphicon-menu-down"></span></a>
		<?php }; ?>
		<div class="<?php echo $elementType; ?>-middle">
			<div class="<?php echo $elementType; ?>-inner <?php echo $topPadding;?> <?php echo $bottomPadding; ?>">

<?php }; ?>

<?php if($backgroundType === 'color'){?>

	<style>
		#wrap-<?php echo $uniqueID; ?>.<?php echo $elementType; ?>-outer{
			<?php if( get_sub_field('enable_jumbotron') ){
			 echo 'height:'.$jumboScale.'vh;'; };?>
		}
		#wrap-<?php echo $uniqueID; ?> .<?php echo $elementType; ?>-middle{
			background-color:<?php echo $backgroundColor; ?>;
		}
		#wrap-<?php echo $uniqueID; ?> .<?php echo $elementType; ?>-inner{
			color: <?php echo $text_color; ?>;
		}
	</style>

	<div class="<?php echo $elementType; ?>-outer <?php echo $backgroundType; ?> clearfix" id="wrap-<?php echo $uniqueID; ?>">
		<?php if($downArrow){?>
			<a class="scroll-down" id="down-<?php echo $uniqueID; ?>" href="#down-<?php echo $uniqueID; ?>"><span class="glyphicon glyphicon-menu-down"></span></a>
		<?php }; ?>
		<div class="<?php echo $elementType; ?>-middle">
			<div class="<?php echo $elementType; ?>-inner <?php echo $topPadding;?> <?php echo $bottomPadding; ?>">

<?php };?>

<?php if($backgroundType === 'video'){?>
	
	<?php
		global $ytScript;
		$ytScript = true;
		$opaque = get_sub_field('enable_color_overlay');
		if(get_sub_field('mute_video')){
			$mute = 'true';
		}else{
			$mute = 'false';
		};
		if(get_sub_field('loop_video')){
			$loop = 'true';
		}else{
			$loop = 'false';
		};
		$video_start = get_sub_field('start_video_at');
	?>
	<?php if($opaque){

		$opaqueHex = get_sub_field('opaque_overlay_color');
		$opaqueRGB = acfpe_hex2rgb($opaqueHex);
		$opaqueAmount = get_sub_field('opacity_amount');
		?>
		<style>
			
			#wrap-<?php echo $uniqueID; ?> .<?php echo $elementType; ?>-middle{
				background-color:rgba(<?php echo $opaqueRGB[0]; ?>,<?php echo $opaqueRGB[1]; ?>,<?php echo $opaqueRGB[2]; ?>,0.<?php echo $opaqueAmount; ?>);
			}
		</style>

	<?php };?>

	<style>
		#wrap-<?php echo $uniqueID; ?>.<?php echo $elementType; ?>-outer{
			<?php if( get_sub_field('enable_jumbotron') ){
			 echo 'height:'.$jumboScale.'vh;'; };?>
		}
		#wrap-<?php echo $uniqueID; ?> .<?php echo $elementType; ?>-inner{
			color: <?php echo $text_color; ?>;
		}
	</style>

	<script>
		window.onload = function(){
			jQuery('.player').YTPlayer();
		}
	</script>

	<div class="<?php echo $elementType; ?>-outer <?php echo $backgroundType; ?> clearfix" id="wrap-<?php echo $uniqueID; ?>">
		<div id="videoElement-<?php echo $uniqueID; ?>" class="player videoElement" data-property="{videoURL:'<?php echo $backgroundVideo; ?>',containment:'#videoElement-<?php echo $uniqueID; ?>', showControls:false, autoPlay:true, loop:<?php echo $loop; ?>, mute:<?php echo $mute; ?>, startAt:<?php echo $video_start; ?>, opacity:1, addRaster:true, quality:'default'}"></div>
		<?php if($downArrow){?>
			<a class="scroll-down" id="down-<?php echo $uniqueID; ?>" href="#down-<?php echo $uniqueID; ?>"><span class="glyphicon glyphicon-menu-down"></span></a>
		<?php }; ?>
		<div class="<?php echo $elementType; ?>-middle">
			<div class="<?php echo $elementType; ?>-inner <?php echo $topPadding;?> <?php echo $bottomPadding; ?>">

<?php };?>




