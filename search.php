<?php get_header(); ?>
<div id="category-container" class="container">
    <div class="crumb">
        <span><?php breadcrumbs();?></span>
    </div>
    <div class="content">
        <div class="content-left">
            <ul class="post-list">
                <?php $posts = query_posts($query_string); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <li class="post-item" <?php post_class(); ?>>
                        <div class="time"><?php the_time('Y-m-j'); ?></div>
                        <h2 class="post-title">
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="post-main">
                            <?php the_excerpt(); ?>
                            <a class="more" href="<?php the_permalink() ?>">阅读全文 &gt;&gt;</a>
                        </div>
                    </li>
                <?php endwhile; else: ?>
                    <div class="post-no-data">
                        <h2 class="post-title">对不起 :(</h2>
                        <div class="post-info">没有搜索到响应文章</div>
                    </div>
                <?php endif; ?>
            </ul>
            <div class="page-nav">
            <!-- 需要安装pagenavi插件，否则使用原生的翻页 -->
            <?php if(function_exists('wp_pagenavi')){ wp_pagenavi(); } else { ?>
                <div class="post_nav"><?php posts_nav_link(' ', '上一页', '下一页'); ?></div>
            <?php } ?>
            </div>
        </div>
        <div class="content-right">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>