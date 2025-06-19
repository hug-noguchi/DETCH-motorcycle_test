<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Fifteen 1.7
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function twentyfifteen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyfifteen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyfifteen_resource_hints', 10, 2 );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous && has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css      .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css      .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Fifteen 1.9
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyfifteen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 22;
	$args['smallest'] = 8;
	$args['unit']     = 'pt';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyfifteen_widget_tag_cloud_args' );

//register_nav_menu('mainmenu', 'メインメニュー');

// 画像URLを相対パスにする
function replaceImagePath($arg) {
$content = str_replace('"images/', '"' . get_bloginfo('template_directory') . '/images/', $arg);
return $content;
}
add_action('the_content', 'replaceImagePath');

// アイキャッチ有効
add_theme_support( 'post-thumbnails', array( 'post','case','sale' ) );

// 管理画面の表示・非表示
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
    //remove_menu_page( 'index.php' ); //ダッシュボード
    remove_menu_page( 'edit.php' ); //投稿メニュー
    //remove_menu_page( 'upload.php' ); //メディア
    //remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
    remove_menu_page( 'edit-comments.php' ); //コメントメニュー
    //remove_menu_page( 'themes.php' ); //外観メニュー
    //remove_menu_page( 'plugins.php' ); //プラグインメニュー
    //remove_menu_page( 'tools.php' ); //ツールメニュー
    //remove_menu_page( 'options-general.php' ); //設定メニュー
}

// カスタム投稿(を追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
	// お知らせ
	register_post_type( 'case', //カスタム投稿タイプ名を指定
		array(
			'labels' => array(
			'name' => __( '製品一覧' ),
			'singular_name' => __( '製品一覧' )
		),
		'public' => true,
		'has_archive' => true, //アーカイブページを持つ
		'menu_position' => 4, //管理画面のメニュー順位
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'comments'),
		)
	);
	register_taxonomy(
		'case_cat', //タクソノミーの名前
		'case', //使用するカスタム投稿タイプ名
		array(
			'hierarchical' => true, //trueだと親子関係が使用可能。falseで使用不可
			'update_count_callback' => '_update_post_term_count',
			'label' => 'カテゴリー',
			'singular_label' => 'カテゴリー',
			'public' => true,
			'show_ui' => true,
		)
	);
	register_post_type( 'sale', //カスタム投稿タイプ名を指定
		array(
			'labels' => array(
			'name' => __( 'SALE' ),
			'singular_name' => __( 'SALE' )
		),
		'public' => true,
		'has_archive' => true, //アーカイブページを持つ
		'menu_position' => 5, //管理画面のメニュー順位
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'comments'),
		)
	);
	register_taxonomy(
		'sale_cat', //タクソノミーの名前
		'sale', //使用するカスタム投稿タイプ名
		array(
			'hierarchical' => true, //trueだと親子関係が使用可能。falseで使用不可
			'update_count_callback' => '_update_post_term_count',
			'label' => 'カテゴリー',
			'singular_label' => 'カテゴリー',
			'public' => true,
			'show_ui' => true,
		)
	);
}
