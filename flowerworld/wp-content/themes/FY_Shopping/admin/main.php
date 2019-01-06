<?php
$themename = $dname.'主题';
$options = array("logo", "erweima", "Description", "Keywords", "beian", "tongji", "Welcome", "YLink", "dibulb", "zaixkf", "zxfank", "zxqqhm", "goumsh", "huandeng", "Ad1", "DisplayAd1", "Ad2", "DisplayAd2", "Ad3", "DisplayAd3", 
);
function mytheme_add_admin() {
    global $themename, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                update_option( $value, $_REQUEST[ $value ] ); 
            }
            header("Location: admin.php?page=main.php&saved=true");
            die;
        }
    }
    add_theme_page($themename."设置", $themename."设置", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
    global $themename, $options;
    $i=0;
    if ( $_REQUEST['saved'] ) echo '<div class="updated settings-error"><p>'.$themename.'修改已保存</p></div>';
?>

<div class="wrap goux">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/admin/admin.css"/>
    <h2><?php echo $themename; ?>设置
	<span class="sheji">设计师：<a href="" target="_blank">花世界</a> &nbsp;&nbsp; <a href="" target="_blank">花时间鲜花铺</a></span>
            </h2>
<div class="tabPanel">
			<ul>
			    <i class="hit">基本设置</i>
			    <i>外观设置</i>
			    <i>广告及幻灯片</i>
				<i>说明</i>
				<div class="tuisong">更新通知：<?php if(function_exists('file_get_contents')){
    echo file_get_contents( "http://7xjgd9.com1.z0.glb.clouddn.com/tuisong.txt" );
    }else{
    echo '如果您看到这句话，证明你的file_get_contents函数被禁用了，请开启此函数！';}?></div>
		    </ul>
		<div class="panes">		
			<div class="pane" style="display:block;">
			     <div class="post-body">
			        <form method="post">
    <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<tr class="color1">
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
 			<th width="25%"><p align="center">说明</p></th> 
		</tr>
		<tr class="color3">
			<td><p align="center">网站LOGO</p></td>
			<td><p align="left"><input style="width:98%;" type="text" id="logo" name="logo" value="<?php echo dopt('logo'); ?>"></p></td>
			<td><p align="left">输入LOGO地址（LOGO尺寸建议为420X85）</p></td>
		</tr>
		<tr class="color3">
			<td><p align="center">网站二维码</p></td>
			<td><p align="left"><input style="width:98%;" type="text" id="erweima" name="erweima" value="<?php echo dopt('erweima'); ?>"></p></td>
			<td><p align="left">输入二维码地址（二维码尺寸建议为140X140）</p></td>
		</tr>
		<tr class="color3">
			<td><p align="center">站点关键词</p></td>
			<td><p align="left"><input style="width:98%;" type="text" id="Description" name="Description" value="<?php echo dopt('Description'); ?>"></p></td>
			<td><p align="left">填写站点关键词</p></td>
		</tr>
		<tr>
			 <td><p align="center">站点描述</p></td>
			<td><p align="left"><input style="width:98%;" type="text" id="Keywords" name="Keywords" value="<?php echo dopt('Keywords'); ?>"></p></td>
			<td><p align="left">填写站点描述</p></td>
		</tr>
		<tr>
			 <td><p align="center">备案信息</p></td>
			<td><p align="left"><input style="width:98%;" type="text" id="beian" name="beian" value="<?php echo dopt('beian'); ?>"></p></td>
			<td><p align="left">填写备案信息</p></td>
		</tr>
		<tr>
			 <td><p align="center">统计代码</p></td>
			<td><p align="left"><input style="width:98%;" type="text" id="tongji" name="tongji" value="<?php echo dopt('tongji'); ?>"></p></td>
			<td><p align="left">输入统计代码</p></td>
		</tr>
	</table>
   <br />
   <input class="fbutton" style="margin-top:10px;width:99%;padding:0 auto;" name="save" type="submit" value="保存设置">
        <input type="hidden" name="action" value="save">
	 </div>
			</div>
			<div class="pane">
	        <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<tr class="color1">
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr class="color3">
			<td><p align="center">顶部欢迎语</p></td>
			<td><p align="left">
			<textarea name="Welcome" type="text" id="Welcome" style="width:98%;"><?php echo dopt('Welcome'); ?></textarea>
			</p></td>
			<td><p align="left">设置顶部欢迎语或者公告</p></td>
		</tr>
		<tr class="color3">
			<td><p align="center">顶部右边连接</p></td>
			<td><p align="left">
			<textarea name="YLink" type="text" id="YLink" style="width:98%;"><?php echo dopt('YLink'); ?></textarea>
			</p></td>
			<td><p align="left">用来添加网站收藏之类的</p></td>
		</tr>
		</table>
      <table width="100%" style='padding:0;margin-top:5px;' cellspacing='0' cellpadding='0' class="tableBorder">
   <tr class="color1">
    <th width="100%"><p align="center">底部列表设置</p></th>
   </tr>
   <tr class="color3">
   <td><p align="center"><textarea name="dibulb" type="text" id="dibulb" style="width:98%;"><?php echo dopt('dibulb'); ?></textarea></p></td>
   </tr>
   </table>
  <table width="100%" style='padding:0;margin-top:5px;' cellspacing='0' cellpadding='0' class="tableBorder">
   <tr class="color1">
    <th width="100%"><p align="center">客服设置</p></th>
   </tr>
 </table>
   <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
	    <tr>
			<td><label for="zaixkf"><p align="center">在线客服</p></label></td>
			<td><p align="left"><textarea name="zaixkf" type="text" id="zaixkf" style="width:98%;"><?php echo dopt('zaixkf'); ?></textarea></p></td>
			<td><p align="left">点击在线客服详情页链接</p></td>
		</tr>	
		<tr>
			<td><label for="zxfank"><p align="center">留言反馈</p></label></td>
			<td><p align="left"><textarea name="zxfank" type="text" id="zxfank" style="width:98%;"><?php echo dopt('zxfank'); ?></textarea></p></td>
			<td><p align="left">点击留言反馈详情页链接</p></td>
		</tr>
		
		<tr>
			<td><label for="zxqqhm"><p align="center">在线咨询</p></label></td>
			<td><p align="left"><textarea name="zxqqhm" type="text" id="zxqqhm" style="width:98%;"><?php echo dopt('zxqqhm'); ?></textarea></p></td>
			<td><p align="left">输入QQ号码</p></td>
		</tr>
	</table>
   <table width="100%" cellspacing='0' cellpadding='0'>
   <tr class="color1">
    <th width="100%"><p align="center">消费保障说明设置</p></th>
   </tr>
    <tr>
  <td><p align="left"><textarea class="zwsrk" name="goumsh" type="text" id="goumsh"><?php echo dopt('goumsh'); ?></textarea></p></td>
    </tr>
 </table>
   <br />
   <input class="fbutton" style="margin-top:10px;width:99%;padding:0 auto;" name="save" type="submit" value="保存设置">
        <input type="hidden" name="action" value="save">
</div>
<div class="pane">
			<table width="100%" cellspacing='0' cellpadding='0'>
   <tr class="color1">
    <th width="100%"><p align="center">幻灯片设置</p></th>
   </tr>
    <tr>
  <td><p align="left"><textarea class="zwsrk" name="huandeng" type="text" id="huandeng"><?php echo dopt('huandeng'); ?></textarea></p></td>
    </tr>
 </table>
 <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
	<tr class="color1">
		<th width="15%"><p align="center">AD编号</p></th>
		<th width="40%"><p align="center">广告代码</p></th>
		<th width="10%"><p align="center">是否开启</p></th>
		<th width="25%"><p align="center">备注</p></th>
	</tr>
    <tr>
		<td><p align="center">广告位1</p></td>
		<td><p align="left"><textarea name="Ad1" type="text" id="Ad1" style="width:98%;"><?php echo dopt('Ad1'); ?></textarea></p></td>
		<td><p align="center"><input type="checkbox" id="DisplayAd1" name="DisplayAd1" <?php if(dopt('DisplayAd1')) echo 'checked="checked"' ?>></p></td>
		<td><p align="left">位置：首页幻灯片底部底部，1180×80</p></td>
	</tr>
    <tr>
		<td><p align="center">广告位2</p></td>
		<td><p align="left"><textarea name="Ad2" type="text" id="Ad2" style="width:98%;"><?php echo dopt('Ad2'); ?></textarea></p></td>
		<td><p align="center"><input type="checkbox" id="DisplayAd2" name="DisplayAd2" <?php if(dopt('DisplayAd2')) echo 'checked="checked"' ?>></p></td>
		<td><p align="left">位置：首页翻页底部，1180×80</p></td>
	</tr>
    <tr>
		<td><p align="center">广告位3</p></td>
		<td><p align="left"><textarea name="Ad3" type="text" id="Ad3" style="width:98%;"><?php echo dopt('Ad3'); ?></textarea></p></td>
		<td><p align="center"><input type="checkbox" id="DisplayAd3" name="DisplayAd3" <?php if(dopt('DisplayAd3')) echo 'checked="checked"' ?>></p></td>
		<td><p align="left">位置：文章内页宝贝详情上边，850×80</p></td>
	</tr>
 </table>
 <br />
   <input class="fbutton" style="margin-top:10px;width:99%;padding:0 auto;" name="save" type="submit" value="保存设置">
        <input type="hidden" name="action" value="save">
</form>		
		</div>
			<div class="pane">
			<p>
                 <span style="font-size: 18px; color: rgb(255, 0, 0);">【版权声明】</span>
              </p>
			   <p>
                   <span style="color: rgb(255, 0, 0);">您可以免费使用、传播和修改本主题，但请保留页脚主题设计者链接，不得将本作品用于商业目的，包括所有页面元素！</span>
              </p>
            
            </div>
		 </div>
	    </div>
</div>
<script>
var aaa = []
jQuery('.goux input, .goux textarea').each(function(e){
    if( jQuery(this).attr('id') ) aaa.push( jQuery(this).attr('id') )
})
console.log( aaa )
</script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){	
	$('.tabPanel ul i').click(function(){
		$(this).addClass('hit').siblings().removeClass('hit');
		$('.panes>div:eq('+$(this).index()+')').show().siblings().hide();	
	})
})
</script>
<?php } ?>
<?php add_action('admin_menu', 'mytheme_add_admin');?>