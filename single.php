<?php get_header(); ?>
<div id="page-container" class="container">
    <div class="crumb">
        <span><?php breadcrumbs();?></span>
    </div>
    <div class="content">
        <div class="content-left">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post-entry" <?php post_class(); ?>>
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <div class="time"><?php the_time('Y-m-j'); ?></div>
                    <div class="post-main">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <div class="content-right">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>