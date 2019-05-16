<head>
	<?php wp_head(); ?>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale = 1.0'>

	<link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
	<link rel="manifest" href="/favicon/manifest.json">
	<link name="msapplication-TileColor" content="#ffffff">
	<link name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
	<link name="theme-color" content="#ffffff">
</head>
<body <?php body_class(); ?>>
	<div id="menu-container" class="container-fluid index-top">
		<div class="row" id="topmenu">
			<div id="desktop-logo" class="col-lg-2">
				<a href="<?php echo get_site_url(); ?>">
					<div id="logo"></div>
				</a>
			</div>
			<div id="desktop-menu" class="col-lg-10">
				<?php wp_nav_menu(array('theme_location'=>'main_menu')); ?>
			</div>
			<div id="burger-menu-wrapper">
				<div id="burger-menu">
					<div id="slice-1" class="slice"></div>
					<div id="slice-2" class="slice"></div>
					<div id="slice-3" class="slice"></div>
				</div>
			</div>
		</div>
	</div>
