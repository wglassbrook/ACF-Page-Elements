<?php /*

	ACF Post List Template

*/ ?>

<?php
	$eClass = get_sub_field('element_class');
	$post_thumbnail_size = get_sub_field('post_thumbnail');
	$post_meta = get_sub_field('post_meta');
	$post_excerpt = get_sub_field('post_excerpt');
	$post_archive = get_sub_field('post_archive');
	$post_list_args = array(
		'post_type' => get_sub_field('post_type'),
		'category_name' => get_sub_field('post_category'),
		'posts_per_page' => get_sub_field('posts_per_page'),
		'order' => get_sub_field('post_order'),
		'orderby' => get_sub_field('order_by')
	);
	//var_dump($post_list_args);
?>

<section class="p-element post-list <?php echo $eClass; ?>">
	<div class="container">

	<?php $post_list_query = new WP_Query( $post_list_args );
	if ( $post_list_query->have_posts() ) : ?>

		<div class="row">
			<div class="col-md-12">

				<?php while ( $post_list_query->have_posts() ) : $post_list_query->the_post();
					$id = get_the_ID();
					$acfpe_post = get_post( $id );
					$acfpe_excerpt = $acfpe_post->post_excerpt;
					$acfpe_content = $acfpe_post->post_content;
				?>
					<article <?php post_class(); ?>>
					  
						<header>
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>

							<?php if ($post_meta){
								get_template_part('templates/entry-meta');
							};?>
							<?php if ($post_thumbnail_size != 'none'){ ?>
								<?php if ( has_post_thumbnail($id) ) {?>
									<?php echo get_the_post_thumbnail($id, $post_thumbnail_size, array('class' => $post_thumbnail_size . '-post-thumb, img-responsive')); ?>
								<?php }; ?>
							<?php }; ?>
						</header>

						<div class="entry-summary">
							<?php if($post_excerpt){
								echo $acfpe_excerpt;
							} else {
								echo $acfpe_content;
							}; ?>
						</div>
					
					</article>
				<?php endwhile; ?>
				<?php if($post_archive){ ?>
					<a href="/category/<?php the_sub_field('post_category'); ?>">See All</a>
				<?php }; ?>

			</div>
		</div>
	<?php endif;?>

	</div>
</section>


