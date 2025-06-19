<?php get_header(); ?>

<section id="mimg" class="contents target">
	<div id="mimg_bg" class="bg"></div>
	<div class="scroll"><a href="#about"><span></span>Scroll</a></div>
</section>

<section id="sale" class="contents target">
	<div id="sale_bg" class="bg"></div>
	<div class="container">
		<h2 class="title_01">For sale</h2>
		<div class="column2 sale_list mb50">
			<?php
				$args = array('post_type' => 'sale', 'posts_per_page' => '2');
				$myposts = get_posts( $args );
				if( !empty($myposts)):
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<article class="column_box sale_list_box">
				<div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
				<div class="text">
					<h3>■年式　<?php the_title(); ?></h3>
					<p>■カスタム概要</p>
					<?php the_content('続きを読む'); ?>
				</div>
			</article>
			<?php endforeach; ?>
			<?php elseif(empty($myposts)): ?>
			<p style="text-align:center;">現在セールの商品はございません</p>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<p class="btn"><a href="<?php echo esc_url(home_url('')); ?>/sale">VIEW MORE</a></p>
	</div>
</section>

<section id="about" class="contents target">
	<div id="about_bg" class="bg"></div>
	<div class="container">
		<div class="column2">
			<div class="column_box">
				<h2 class="title_01">About us</h2>
				<table class="about_tbl mb50">
					<tr>
						<th>社名</th>
						<td>DETCH motorcycle</td>
					</tr>
					<tr>
						<th>所在地</th>
						<td>福岡県大牟田市上内3668-568</td>
					</tr>
					<tr>
						<th>設立</th>
						<td>2019年10月1日</td>
					</tr>
					<tr>
						<th>代表者</th>
						<td>白倉 史貴</td>
					</tr>
					<tr>
						<th>事業内容</th>
						<td>国産車旧車全般のカスタム＆レストア</td>
					</tr>
					<tr>
						<th>電話番号</th>
						<td><a href="tel:0944-31-3504" class="tel">0944-31-3504</a></td>
					</tr>
				</table>
				<h3 class="title_02">事業内容</h3>
				<p class="mb30">エンジン修理　カスタム　レストア　（外装塗装　焼き付け塗装　TIG溶接　部品製作）</p>
				<h3 class="title_02">代表挨拶</h3>
				<p>楽しく、カッコよく快適なバイクを作るため一台一台丁寧な仕事を心掛けています。
					<br />電車でお越しのお客様は駅までお迎えに上がります。お気軽にお立ち寄りください。</p>
			</div>
<!--
			<div class="column_box">
				<div class="column2 image_box">
					<p class="column_box image"><img src="<?php echo get_template_directory_uri(); ?>/images/about_01.jpg" /></p>
					<p class="column_box image"><img src="<?php echo get_template_directory_uri(); ?>/images/about_02.jpg" /></p>
				</div>
			</div>
-->
		</div>
	</div>
</section>

<section id="case" class="contents target">
	<div id="case_bg" class="bg"></div>
	<div class="container">
		<h2 class="title_01">Cases for custom</h2>
		<div class="column2 case_list mb50">
			<?php
				$args = array('post_type' => 'case', 'posts_per_page' => '2');
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<article class="column_box case_list_box">
				<div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
				<div class="text">
					<h3>■年式　<?php the_title(); ?></h3>
					<p>■カスタム概要</p>
					<?php the_content('続きを読む'); ?>
				</div>
			</article>
			<?php endforeach; wp_reset_postdata();?>
		</div>
		<p class="btn"><a href="<?php echo esc_url(home_url('')); ?>/case">VIEW MORE</a></p>
	</div>
</section>

<section id="access" class="contents target">
	<div id="access_bg" class="bg"></div>
	<div class="container">
		<div class="column2">
			<div class="column_box">
				<h2 class="title_01">Access</h2>
				<p class="logo mb10">DETCH motorcycle</p>
				<p>福岡県大牟田市上内3668-568
					<br />営業時間：8:00 – 17:00
					<br />定休日：毎週月曜日</p>
				<p class="mb20">電話番号：<a href="tel:0944-31-3504" class="tel">0944-31-3504</a></p>
				<p class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/access.png" alt="How to access" /></p>
			</div>
			<div class="column_box">
				<div id="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3342.7785764271052!2d130.50315445004904!3d33.088609475247004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354052f8f9508ddf%3A0xc7a8c5b28d5261e7!2z44CSODM3LTA5MDIg56aP5bKh55yM5aSn54mf55Sw5biC5aSn5a2X5LiK5YaF77yT77yW77yW77yY4oiS77yV77yW77yY!5e0!3m2!1sja!2sjp!4v1565219671574!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="contact" class="contents target">
	<div id="contact_bg" class="bg"></div>
	<div class="container">
		<h2 class="title_01">Contact</h2>
		<p class="mb30">下記フォームに内容をご記入の上、確認ボタンをクリックしてください。</p>
		<?php echo do_shortcode('[mwform_formkey key="7"]'); ?>
	</div>
</section>

<?php get_footer(); ?>