<!DOCTYPE HTML>
<html>
<head>
	<title><?php wp_title( '-', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<?php wp_head(); ?>
</head>
<body>
<div id="header">
	<div id="inner-header">
		<div id="logo">
			<a href="<?php bloginfo('url'); ?>">
				<!-- logo图片 -->
				LOGO
				<!-- <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="" /> -->
			</a>
		</div>
		<div id="nav">
			<!-- 导航，需在设置外观->菜单中设置 -->
			<?php wp_nav_menu(array('menu' => 'nav','depth' => 1)); ?>
		</div>
		<div id="search" class="clearfix">
			<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" class="m-input" id="search-input" name="s" />
				<input type="submit" class="m-btn" id="search-button" value="搜索" />
			</form>
		</div>
	</div>	
</div>