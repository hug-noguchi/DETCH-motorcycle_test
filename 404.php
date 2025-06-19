<?php get_header(); ?>

<section class="page_contents">
	<div class="container">
		<h2 class="title_01 txt_c">404 Error</h2>
		<p class="txt_c mb30">お探しの記事・ページは見つかりませんでした。
			<br />以下のフォームから検索して頂くか、各メニューへお進み下さい。</p>
		<div class="search_box mb20">
			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
				<input type="text" value="" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="検索" />
			</form>
		</div>
		<p class="mb20">お探しの記事・ページは見つかりませんでした。
			<br />以下のフォームから検索して頂くか、各メニューへお進み下さい。</p>
		<p>【検索ヒント】
			<br />キーワードに誤字・脱字がないかご確認下さい。
			<br />異なるキーワードを入力して検索して下さい。
			<br />より一般的な言葉を入力して下さい。</p>
	</div>
</section>

<?php get_footer(); ?>