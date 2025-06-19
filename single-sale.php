<?php get_header('sale'); ?>

<section class="page_contents">
	<div class="container">
		<h2 class="title_01 txt_c">For sale</h2>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<ul class="case_image_box">
		<?php if(have_rows('sale')): ?>
			<?php while(have_rows('sale')): the_row(); ?>
			<?php $image = get_sub_field('case-img'); if( !empty($image) ): ?><li><a href="<?php echo $image['url']; ?>"><img src="<?php echo $image['url']; ?>" /></a></li><?php endif; ?>
			<?php endwhile; ?>
		<?php else: ?>
		<?php endif; ?>
		</ul>
		<?php endwhile; endif; ?>
		<?php wp_reset_query(); ?>
	</div>
</section>

<?php get_footer(); ?>