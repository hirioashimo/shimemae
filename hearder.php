<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *　タグ変更　24行目　20210124
 *<meta name="viewport" content="width=device-width, initial-scale=1"> 
 * @package Screenr
 */
$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');

function is_mobile() {
    $user_agent = $_SERVER['HTTP_USER_AGENT']; // HTTP ヘッダからユーザー エージェントの文字列を取り出す

    return preg_match('/iphone|ipod|android/ui', $user_agent) != 0; // 既知の判定用文字列を検索
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'screenr' ); ?></a>
    <?php
    $header_classes = array();
    $header_classes[] = 'site-header';
    $header_layout = get_theme_mod( 'header_layout' );
    if ( $header_layout == 'fixed' ){
        $header_classes[] = 'sticky-header';
    } else if (  $header_layout == 'transparent' ) {
        $header_classes[] = 'sticky-header';
        $header_classes[] = 'transparent';
    }

    ?>
	<header id="masthead" class="<?php echo esc_attr( join( ' ', $header_classes ) );?>" role="banner">
		<div class="container">
			<?php screenr_branding(); ?>

			<div class="header-right-wrapper">
				<a href="#" id="nav-toggle"><?php esc_html_e('Menu', 'screenr'); ?><span></span></a>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<ul class="nav-menu">
						<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s')); ?>
					</ul>
				</nav>
				<!-- #site-navigation -->
			</div>

		</div>
	</header><!-- #masthead -->

	
	<?php if (is_mobile()):?>
		<img id="elem" width="60" style="z-index: 999;position: absolute; top: 7vh;right: 1vw;" src="<?php echo esc_url( get_template_directory_uri() )?>/shimemaelogo.jpg"></img>
	<?php else:?>
		<img id="elem"  width="100" style="z-index: 999;position: absolute; top: 2vh;right: 2vw;" src="<?php echo esc_url( get_template_directory_uri() )?>/shimemaelogo.jpg"></img>
	<?php endif;?>
	
	<script src="<?php echo esc_url( get_template_directory_uri() )?>/anime.min.js"></script>

	<?php if (is_mobile()):?>
		<script>
			var elem = document.getElementById('elem');
			window.onload = function() {
			anime({
				targets: elem,
				translateX: '-81vw',
				rotate: '-1turn',
				easing: 'easeInOutQuad'
			})
			}
		</script>
	<?php elseif($isiPad):?>
		<script>
			var elem = document.getElementById('elem');
			window.onload = function() {
			anime({
				targets: elem,
				translateX: '-75vw',
				rotate: '-1turn',
				easing: 'easeInOutQuad'
			})
			}
		</script>
	<?php else:?>
		<script>
			var elem = document.getElementById('elem');
			window.onload = function() {
			anime({
				targets: elem,
				translateX: '-60vw',
				rotate: '-1turn',
				easing: 'easeInOutQuad'
			})
			}
		</script>
	<?php endif;?>

<?php
do_action( 'screenr_after_site_header' );