<?php get_header('case'); ?>

<section class="page_contents">
	<div class="container">
		<h2 class="title_01 txt_c">GALLEY</h2>
		<div class="case_archive">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="case_archive_box">
				<div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', ['loading' => 'lazy']); ?></a></div>
				<div class="text">
					<h3>■年式　<?php the_title(); ?></h3>
					<p>■カスタム概要</p>
					<?php the_content('続きを読む'); ?>
					<div class="btn"><a href="<?php the_permalink(); ?>">VIEW MORE</a></div>
				</div>
			</article>
			<?php endwhile; endif; ?>
			<?php wp_reset_query(); ?>
		</div>
		<div id="pagenav">
			<p><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></p>
		</div>
	</div>
</section>

<?php get_footer(); ?>
