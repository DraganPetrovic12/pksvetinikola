<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ci-uikit
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Michroma&family=Noto+Sans:wght@700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y7R3PPD82H"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Y7R3PPD82H');
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<a style="display: none;" class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ci-uikit' ); ?></a>

	<header id="masthead" data-uk-sticky="show-on-up: true; animation: uk-animation-slide-top; cls-active: uk-navbar-sticky;" class="uk-sticky site-header">
		<div class="container">
			<div class="wrapper">
				<div class="site-branding">
					<?php if (get_field('header_logo', 'option')): ?>
						<a class="header-logo" href="/" rel="home">
							<img alt="Logo" src="<?php echo get_field('header_logo', 'option')['sizes']['large']; ?>" data-uk-svg>
							<div class="uk-margin-left logo-text">PLIVAČKI KLUB<br>SVETI NIKOLA NIŠ</div>
						</a>
					<?php else: ?>
						<a class="header-logo" href="/" rel="home">
							<img alt="Logo" src="<?php echo get_stylesheet_directory_uri();?>/images/svetinikolamichroma.svg" data-uk-svg>
						</a>
					<?php endif ?>
				</div>
				<nav class="main-navigation uk-navbar-container" data-uk-navbar>
					<div class="nav-overlay uk-navbar-left hide-me">
						<?php
							wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     =>'uk-navbar-nav'
							) );
						?>
					</div>
					<div class="nav-overlay uk-navbar-right search-icon">
						<a class="uk-navbar-toggle toggle-search" data-uk-toggle="target: .header-form;" href="#">
							<img src="<?php echo get_stylesheet_directory_uri();?>/images/searxng.svg" alt="icon" data-uk-svg>
						</a>
					</div>
					<div class="nav-overlay header-form uk-flex-1" hidden>
						<div class="uk-navbar-item">
							<form method="get" action="<?php print site_url(); ?>" class="uk-search uk-search-navbar uk-width-1-1">
								<input class="uk-search-input" name="s" value="<?php if(isset($_GET['s'])){print $_GET['s'];}?>" type="search" placeholder="Search..." autofocus>
							</form>
						</div>
						<a class="uk-navbar-toggle toggle-search" data-uk-close data-uk-toggle="target: .header-form;" href="#"></a>
					</div>
					<div class="header-form-mobile-view">
						<div class="uk-navbar-item">
							<form method="get" action="<?php print site_url(); ?>" class="uk-search uk-search-navbar uk-width-1-1">
								<input class="uk-search-input" name="s" value="<?php if(isset($_GET['s'])){print $_GET['s'];}?>" type="search" placeholder="Search..." autofocus>
								<input class="mobile-view-submit" type="submit" name="submit" value="">
							</form>
						</div>
					</div>
				</nav>
				<a href="#toggle-box" class="open-menu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a><!-- mobile-menu-trigger -->
			</div>
		</div><!-- .container -->
	</header><!-- #masthead -->
