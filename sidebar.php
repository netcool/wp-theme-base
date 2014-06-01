<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()): ?>
    <!-- 如果添加小工具栏, 将替换一下内容 -->
    <div class="sidebar">
        <h2>产品分类</h2>
		<div class="sidebar-content">
            <!-- 在设置外观->菜单中添加新的导航 -->
            <?php wp_nav_menu( array('menu' => 'side-nav' )); ?>
        </div>   
    </div>
    <div class="sidebar">
        <h2>新闻动态</h2>
        <?php query_posts("showposts=5&cat=1,2,3"); ?>
        <ul>
            <?php while (have_posts()) : the_post(); ?>
            <li>
                <em class="time"><?php the_time('Y-m-d') ?></em>&nbsp;
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                    <span><?php the_title(); ?></span>
                </a>
            </li>
            <?php endwhile;wp_reset_query(); ?>
        </ul>
    </div>
<?php endif; ?>
