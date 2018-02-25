<!DOCTYPE html>

<html lang="<?php print $language->language; ?>">

	<head>

		<title><?php print $head_title; ?></title>

		<meta charset="utf-8">

		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<?php print $styles; ?>
		<?php print $head; ?>
		<link rel="stylesheet" href="/css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- livereload -->
		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
		<!-- livereload -->


		<?php

			//Tracking code

			$tracking_code = theme_get_setting('general_setting_tracking_code', 'enma');

			print $tracking_code;

			//Custom css

			$custom_css = theme_get_setting('custom_css', 'enma');

			if(!empty($custom_css)):

		?>

		<style type="text/css" media="all">

		<?php print $custom_css;?>

		</style>

		<?php

			endif;

		?>

	</head>

	<?php



		if(isset($menu_style) && $menu_style == 'menu4') {

			$body_class = 'sidenav';

		} elseif(isset($menu_style)) {

			$menu_style = $menu_style;

		} else $menu_style = theme_get_setting('menu_style', 'enma');

		if ($menu_style == 'menu4') {

			$body_class = 'sidenav';

		} else $body_class = '';

		if(isset($body_font)) {

			$body_font_family = $body_font;

		} else $body_font_family = theme_get_setting('body_font', 'enma');

	?>

	<body class="<?php print $classes;?> <?php print $body_class; ?>"  <?php print $attributes;?> <?php if(!empty($body_font_family)) print 'style="font-family: '.$body_font_family.', sans-serif;"';?>

		<?php if ($menu_style == 'menu2') {print 'data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top"';} elseif($menu_style == 'menu4') print 'data-spy="scroll" data-offset="0" data-target=".navbar" ';?>>

		<div id="skip-link">

			<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>

		</div>

		<!-- Preloader -->

		<div class="loader-mask">

			<div class="loader">

				"Loading..."

			</div>

		</div>

		<?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>

		<?php print $scripts; ?>

	</body>

</html>