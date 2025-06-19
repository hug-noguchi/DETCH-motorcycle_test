<?php get_header(); ?>
<!-- search.php -->
<div id="sub_mimg">
	<div class="inner">
		<h2>検索結果</h2>
		<img src="<?php echo get_template_directory_uri(); ?>/images/sample.jpg" alt="sample" />
	</div>
</div>

<div id="contents" class="page">

	<div class="container_01 mb50">

		<div class="contents">
			<div class="breadcrumbs">
			    <?php if(function_exists('bcn_display'))
			    {
			        bcn_display();
			    }?>
			</div>
			<h3 class="mb20"><span class="inner">検索結果</span></h3>
			<?php if (have_posts()) : ?>
			<p class="mb20">以下の項目が検索により見つかりました。</p>
			<div class="post_list">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="post_list_box">
					<h2 class="ttl"><a href="<?php the_permalink(); ?>/"><?php the_title(); ?></a></h2>
					<p><?php echo get_post_meta($post->ID, _aioseop_description, true); ?></p>
				</article>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
			<div id="pagenav">
				<p><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></p>
			</div>
			<?php else : ?>
			<p class="mb20">お探しの記事・ページは見つかりませんでした。
				<br />以下のフォームから検索して頂くか、各メニューへお進み下さい。</p>
			<div class="search_box mb20">
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
					<input type="text" value="" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="検索" />
				</form>
			</div>
			<p><span class="b">【検索ヒント】</span>
				<br />キーワードに誤字・脱字がないかご確認下さい。
				<br />異なるキーワードを入力して検索して下さい。
				<br />より一般的な言葉を入力して下さい。</p>
			<?php endif; ?>
		</div>

		<?php include(TEMPLATEPATH.'/sidebar.php'); ?>

	</div>

<?php get_footer(); ?>