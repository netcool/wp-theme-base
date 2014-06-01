<!DOCTYPE HTML>
<html>
<head>
	<title>
		<?php bloginfo('name'); ?>
		<?php wp_title( '-', true, '' ); ?>
	</title>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dep/FlexSlider/flexslider.css" type="text/css" />
	<?php wp_head(); ?>
</head>
<body>
<div id="header">
	<div id="inner-header">
		<div id="logo">
			<a href="<?php bloginfo('url'); ?>"></a>
		</div>
		<div id="nav">
			<!-- 导航, 需在设置外观->菜单中设置 -->
			<?php wp_nav_menu(
				array(
					'menu' => 'nav', // nav的名称, 在外观->菜单里添加名为'nav'的菜单即可
					'depth' => 2 // 1: 不显示下拉框, 2: 显示下拉框
				)
			); ?>
		</div>
		<div id="search" class="clearfix">
			<form method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input placeholder="请输入关键字" type="text" class="m-input" id="search-input" name="s" />
				<input type="submit" class="m-btn" id="search-btn" value="搜索" />
			</form>
		</div>
	</div>	
</div>