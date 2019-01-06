<?php
include('admin/main.php');
if (is_admin() && $_GET['activated'] == 'true') {
header("Location: admin.php?page=main.php");
}
function dopt($e){
		return stripslashes(get_option($e));
	}
$new_meta_boxes =
array(
    "spimg" => array(
        "name" => "spimg",
        "std" => "",
        "title" => "宝贝特色图片:（输入图片地址）"),

    "price" => array(
        "name" => "price",
        "std" => "",
        "title" => "宝贝价格:（直接输入价格即可）"),

    "Market" => array(
        "name" => "Market",
        "std" => "",
        "title" => "宝贝原价:（直接输入价格即可）"),

    "golink" => array(
        "name" => "golink",
        "std" => "",
        "title" => "购买链接（别忘记加http://）"),

    "notime" => array(
        "name" => "notime",
        "std" => "2015-06-19 06:00:00",
        "title" => "优惠结束时间（按格式输入）")
);
function new_meta_boxes() {
    global $post, $new_meta_boxes;

    foreach($new_meta_boxes as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];

        echo'<h4>'.$meta_box['title'].'</h4>';

        echo '<textarea cols="60" rows="2" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';
    }
    
    echo '<input type="hidden" name="newmeshopping_noncename" id="newmeshopping_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	

}
function create_meta_box() {
    global $theme_name;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '输入产品相关信息', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
}
function save_postdata( $post_id ) {
    global $new_meta_boxes;
    
    if ( !wp_verify_nonce( $_POST['newmeshopping_noncename'], plugin_basename(__FILE__) ))
        return;
    
    if ( !current_user_can( 'edit_posts', $post_id ))
        return;
                    
    foreach($new_meta_boxes as $meta_box) {
        $data = $_POST[$meta_box['name'].'_value'];

        if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
            add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
            update_post_meta($post_id, $meta_box['name'].'_value', $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
    }
}
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');
function deel_breadcrumbs(){
    if( !is_single() ) return false;
    $categorys = get_the_category();
    $category = $categorys[0];
    
    return '你的位置：<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a> <small>></small> '.get_category_parents($category->term_id, true, ' <small>></small> ').'<span class="muted">'.get_the_title().'</span>';
}
add_filter('show_admin_bar', '__return_false');
function Bing_admin_lettering(){
    echo'<style type="text/css">
        * { font-family: "Microsoft YaHei" !important; }
        i, .ab-icon, .mce-close, i.mce-i-aligncenter, i.mce-i-alignjustify, i.mce-i-alignleft, i.mce-i-alignright, i.mce-i-blockquote, i.mce-i-bold, i.mce-i-bullist, i.mce-i-charmap, i.mce-i-forecolor, i.mce-i-fullscreen, i.mce-i-help, i.mce-i-hr, i.mce-i-indent, i.mce-i-italic, i.mce-i-link, i.mce-i-ltr, i.mce-i-numlist, i.mce-i-outdent, i.mce-i-pastetext, i.mce-i-pasteword, i.mce-i-redo, i.mce-i-removeformat, i.mce-i-spellchecker, i.mce-i-strikethrough, i.mce-i-underline, i.mce-i-undo, i.mce-i-unlink, i.mce-i-wp-media-library, i.mce-i-wp_adv, i.mce-i-wp_fullscreen, i.mce-i-wp_help, i.mce-i-wp_more, i.mce-i-wp_page, .qt-fullscreen, .star-rating .star { font-family: dashicons !important; }
        .mce-ico { font-family: tinymce, Arial !important; }
        .fa { font-family: FontAwesome !important; }
        .genericon { font-family: "Genericons" !important; }
        .appearance_page_scte-theme-editor #wpbody *, .ace_editor * { font-family: Monaco, Menlo, "Ubuntu Mono", Consolas, source-code-pro, monospace !important; }
        </style>';
}
add_action('admin_head', 'Bing_admin_lettering');
function mytheme_get_avatar($avatar) {
$avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),
"gravatar.duoshuo.com",$avatar);
return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar', 10, 3 );
register_nav_menus();
function zfunc_comments_users($postid=0,$which=0) {
	$comments = get_comments('status=approve&type=comment&post_id='.$postid); 
	if ($comments) {
		$i=0; $j=0; $commentusers=array();
		foreach ($comments as $comment) {
			++$i;
			if ($i==1) { $commentusers[] = $comment->comment_author_email; ++$j; }
			if ( !in_array($comment->comment_author_email, $commentusers) ) {
				$commentusers[] = $comment->comment_author_email;
				++$j;
			}
		}
		$output = array($j,$i);
		$which = ($which == 0) ? 0 : 1;
		return $output[$which]; 
	}
	return 0; 
}
function timeago( $ptime ) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return '刚刚';
    $interval = array (
        12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $ptime).')',
        30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $ptime).')',
        7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $ptime).')',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}
