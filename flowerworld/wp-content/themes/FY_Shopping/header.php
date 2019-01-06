<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language}" lang="{$language}">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
	<title><?php if ( is_home() ) {
        bloginfo('name'); echo " - "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " - "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_search() ) {
        echo "搜索结果"; echo " - "; bloginfo('name');
    } elseif (is_404() ) {
        echo '页面未找到!';
    } else {
        wp_title('',true);
    } ?></title>
	<?php
if ( is_home ( ) )
{
$description = dopt('Description');
$keywords = dopt('Keywords');
 }
else if ( is_single () )
{
if ( $post->post_excerpt)
{
$description = $post->post_excerpt;
} else {
$description = mb_strimwidth(strip_tags(apply_filters(‘the_content’,$post->post_content)
),0,220);
}
$keywords = "";
$tags = wp_get_post_tags($post->ID);
foreach ($tags as $tag ) {
$keywords = $keywords.$tag->name.","; }
 } else if ( is_category() ) {
$description = category_description();
}
?>
	<meta name ="keywords" content="<?php echo $keywords; ?>"/>
    <meta name="description" content=" <?php echo $description; ?> "/ >	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/font-awesome-4.3.0/css/font-awesome.min.css" media="screen" type="text/css" />
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jqcommon.js" type="text/javascript"></script>
</head>
<body>
<div class="t">
    <div class="tip">
        <span><?php echo dopt('Welcome') ?></span>
        <p><?php echo dopt('YLink') ?></p>
    </div>
</div>
<div class="head">
    <div class="logo">
        <span><a href="<?php bloginfo('url'); ?>"><img src="<?php echo dopt('logo') ?>" alt="<?php bloginfo('name'); ?>"></a></span>
    </div>
    <div class="search">
        <form class="searchbox" name="search" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="s" class="s_w" placeholder="找不到内容？搜索下试试">
        <input type="submit" value="搜索" class="an">
        </form>
        <p><?php wp_tag_cloud('smallest=12&largest=12&unit=px&number=5&orderby=count&order=DESC');?></p>
    </div>
</div>
<div id="m">
    <div id="menu">
        <ul>
            <?php wp_nav_menu( array( 'menu' => 'mymenu', 'depth' => 1) );?>
        </ul>
    </div>
</div>