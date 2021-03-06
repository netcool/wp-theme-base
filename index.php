<?php get_header(); ?>
<div id="banner">
    <div id="inner-banner"></div>
</div>
<div id="content">
    <div class="content-row">
        <!-- 为了展示功能下面的内容都是从后端传过来 -->
        <!-- 有时候根据实际情况可以直接在前端写死 -->
        <div id="content-left">
            <!-- 展示id为1的文章内容 -->
            <?php query_posts('page_id=2'); ?>
            <h2 class="content-title">
                <span>公司简介</span>
                <em class="more"><a href="<?php bloginfo('url'); ?>/?page_id=1">更多&gt;&gt;</a></em>
            </h2>
            <?php while(have_posts()) : the_post(); ?>
                <div class="content-main"><?php the_excerpt(); ?></div>
            <?php endwhile;wp_reset_query();?>
        </div>
        <div id="content-center">
            <!-- 展示5篇分类为1,2,3的文章标题 -->
            <?php query_posts("showposts=5&cat=1,2,3"); ?>
            <h2 class="content-title">
                <span>公司动态</span>
                <em class="more"><a href="<?php bloginfo('url'); ?>/?cat=1,2,3">更多&gt;&gt;</a></em>
            </h2>
            <ul class="content-main">
                <?php while (have_posts()) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>">
                        <span><?php the_title(); ?></span>
                        <em class="time"><?php the_time('Y-m-d') ?></em>
                    </a>
                </li>
                <?php endwhile;wp_reset_query(); ?>
            </ul>
        </div>
        <div id="content-right">
            <!-- 展示id为2的文章内容 -->
            <?php query_posts("page_id=2"); ?>
            <h2 class="content-title">
                <span>公司理念</span>
                <em class="more"><a href="<?php bloginfo('url'); ?>/?page_id=2">更多&gt;&gt;</a></em>
            </h2>
            <?php while(have_posts()) : the_post(); ?>
                <div class="content-main"><?php the_excerpt(); ?></div>
            <?php endwhile;wp_reset_query();?>
        </div>
    </div>
    <div class="content-row" id="content-bottom">
        <!-- 展示分类为1,2,3的文章内的第一张图片, 一共展示12张 -->
        <!-- 可以在functions.php中定义默认图片的src， -->
        <?php query_posts("showposts=12&cat=1,2,3"); ?>
        <h2 class="content-title">
            <span>产品图片</span>
            <em class="more"><a href="<?php bloginfo('url'); ?>/?cat=1,2,3">更多&gt;&gt;</a></em>
        </h2>
        <div id="img-carousel" class="flexslider carousel">
            <ul class="slides img-carousel-list">
                <?php while (have_posts()) : the_post(); ?>
                <li class="img-carousel-item"><a href="<?php the_permalink() ?>"><img src="<?php echo catch_that_image() ?>" /></a></li>
                <?php endwhile;wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</div>
<?php get_footer(); ?>