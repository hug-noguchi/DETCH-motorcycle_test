<?php get_header(); ?>

<section class="page_contents">
	<div class="container">
		<h2 class="title_01 txt_c"><?php the_title(); ?></h2>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content('続きを読む'); ?>
		<?php endwhile; endif; ?>
		<?php wp_reset_query(); ?>
	</div>
</section>

<?php get_footer(); ?>