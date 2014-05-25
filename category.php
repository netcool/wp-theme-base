<?php get_header(); ?>
<div class="cat-container">
    <div class="cat-title">
        <span><?php breadcrumbs();?></span>
    </div>
    <ul class="post-list">
        <?php $posts = query_posts($query_string . '&orderby=date&showposts=6'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li class="post-item" <?php post_class(); ?>>
                <h2 class="post-title">
                    <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
                <em class="time"><?php the_time('Y-m-j'); ?></em>
            </li>
        <?php endwhile; else: ?>
            <div class="post-no-data">
                <h2 class="post-title">对不起 :(</h2>
                <div class="post-info">暂时没有文章</div>
            </div>
        <?php endif; ?>
    </ul>
    <div class="page-nav">
    <!-- 需要安装pagenavi插件，否则使用原生的翻页 -->
    <?php if(function_exists('wp_pagenavi')){ wp_pagenavi(); } else { ?>
        <div class="post_nav"><?php posts_nav_link(); ?></div>
    <?php } ?>
    </div>
</div>

<div class="news-nav">
    <?php wp_nav_menu( array('menu' => 'new_nav' )); ?>
</div>
<?php get_footer(); ?>