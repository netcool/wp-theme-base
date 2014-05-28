<?php

// 注释掉在线字体库，解决中国大陆加载速度慢的问题
function coolwp_remove_open_sans() {    
    wp_deregister_style( 'open-sans' );    
    wp_register_style( 'open-sans', false );    
    wp_enqueue_style('open-sans','');    
}    
add_action( 'init', 'coolwp_remove_open_sans' );   

//设置摘要的字数
function new_excerpt_length($length) {
    return 175;
}
add_filter('excerpt_length', 'new_excerpt_length');

// 设置摘要结束为省略号样式
function new_excerpt_more($more) {
    return '......';
}
// 设置摘要结束为查更多的链接
// function new_excerpt_more($more) {
//     global $post;
//     return '… <a href="'. get_permalink($post->ID) . '">' . '更多&gt;&gt;' . '</a>';
// }
add_filter('excerpt_more', 'new_excerpt_more');

// 注册菜单和小工具
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'before_widget' => '<div class="sidebar">    ',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}

// 只显示文章第一张图片
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){ //Defines a default image
        $first_img = bloginfo('template_url')."/img/default.png";
    }
    return $first_img;
}

// 面包屑导航
function breadcrumbs() {
    $delimiter = '&nbsp<em>&gt;</em>&nbsp';
    $name = 'Home'; //text for the 'Home' link
    $currentBefore = '';
    $currentAfter = '';
    if ( !is_home() && !is_front_page() || is_paged() ) {
        echo '';
        global $post;
        $home = get_bloginfo('url');
        echo "<a href = '$home'>" . $name . '</a>' . ' ' . $delimiter . ' ';

        if ( is_category() ) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);

            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $currentBefore . '';
            single_cat_title();
            echo '' . $currentAfter;
        }
        elseif ( is_day() ) {
            echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
            echo '' . get_the_time('F') . ' ' . $delimiter . ' ';
            echo $currentBefore . get_the_time('d') . $currentAfter;

        }
        elseif ( is_month() ) {
            echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
            echo $currentBefore . get_the_time('F') . $currentAfter;

        }
        elseif ( is_year() ) {
            echo $currentBefore . get_the_time('Y') . $currentAfter;
        }
        elseif ( is_single() ) {
            $cat = get_the_category(); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        }
        elseif ( is_page() && !$post->post_parent ) {
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        }
        elseif ( is_page() && $post->post_parent ) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '' . get_the_title($page->ID) . '';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        }
        elseif ( is_search() ) {
            echo $currentBefore . 'Search result: ' . get_search_query() . '' . $currentAfter;
        }
        elseif ( is_tag() ) {
            echo $currentBefore . 'Posts tagged ';
            single_tag_title();
            echo '' . $currentAfter;
        }
        elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
        }
        elseif ( is_404() ) {
            echo $currentBefore . 'Error 404' . $currentAfter;
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '';
    }
}
?>