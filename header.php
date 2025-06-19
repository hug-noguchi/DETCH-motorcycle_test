<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php bloginfo('name');
if ( is_single() ) {
	_e('&raquo; Blog Archive', 'kubrick');
}
wp_title(); ?></title>
<meta name="description" content="福岡県大牟田市上内の国産車旧車全般のカスタム＆レストア　DETCH motorcycle（デッチモーターサイクル、でっちもーたーさいくる）">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

<?php if ( is_home() || is_front_page() ) : ?>
<meta name="thumbnail" content="https://www.detchmotorcycle.jp/wp-content/themes/DETCH%20motorcycle/images/mimg_bg.jpg" />
<?php else: ?>
<?php if ( is_single() ) : ?>
<meta name="thumbnail" content="<?php the_post_thumbnail_url(‘medium’); ?>" />
<?php else: ?>
<?php endif; ?>
<?php endif; ?>

<!--
  <PageMap>
    <DataObject type="thumbnail">
      <Attribute name="src" value="https://www.detchmotorcycle.jp/wp-content/themes/DETCH%20motorcycle/images/mimg_bg.jpg"/>
      <Attribute name="width" value="100"/>
      <Attribute name="height" value="130"/>
    </DataObject>
  </PageMap>
-->


<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/common/favicon.ico" >
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="https://use.typekit.net/lmx6ikl.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700|Noto+Sans+JP:400,700|Staatliches&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="https://www.ut-ec.co.jp/common/_lib/js/html5shiv.js"></script>
<script src="https://www.ut-ec.co.jp/common/js/ie.js"></script>
<![endif]-->

<?php wp_head(); ?>

</head>
<body id="top">

<header id="header">
	<div class="container">
		<div id="mobile-head">
			<h1 id="logo"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">DETCH motorcycle</a></h1>
			<div id="nav-toggle">
				<div>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
		<?php if (is_home()): ?>
		<nav id="global_menu" class="home_menu">
			<ul>
				<li><a href="#top">Home</a></li>
				<li><a href="#case">GALLEY</a></li>
				<li><a href="#access">Access</a></li>
				<li><a href="#about">About us</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</nav>
		<?php else: ?>
		<nav id="global_menu">
			<ul>
				<li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
				<li><a href="<?php echo esc_url(home_url('')); ?>#case">GALLEY</a></li>
				<li><a href="<?php echo esc_url(home_url('')); ?>#access">Access</a></li>
				<li><a href="<?php echo esc_url(home_url('')); ?>#about">About us</a></li>
				<li><a href="<?php echo esc_url(home_url('')); ?>#contact">Contact</a></li>
			</ul>
		</nav>
		<?php endif; ?>
	</div>
</header>
