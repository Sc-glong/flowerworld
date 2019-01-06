<?php get_header(); ?>
<div class="mb">
<div class="mbinfo">
    <div class="xianbaow">
        <div class="ur"><?php echo deel_breadcrumbs() ?></div>
		<?php while (have_posts()) : the_post(); ?>
            <div class="mbpic"><img class="example2" src="<?php echo get_post_meta($post->ID,"spimg_value",true);?>"></div>
			
		        <div class="textinfo">
			        <h2><?php the_title(); ?></h2>
			        
			        <p><?php echo mb_strimwidth(strip_tags(apply_filters(‘the_content’, $post->post_content)), 0,80,……); ?></p>
			        <div style="clear:both;"></div>
			        <div class="jiage">价格： <span>¥<?php echo get_post_meta($post->ID,"price_value",true);?></span>元</div>
			        <div style="clear:both;"></div>
			        <div class="yuanjia">
			        <del>原价：<?php echo get_post_meta($post->ID,"Market_value",true);?>元</del>
			        <p class="protime">
					    <em><i class="icon iconfont">&#xe62b;</i></em>
					    <span class="jieshu" endTime="<?php echo get_post_meta($post->ID,"notime_value",true);?>"></span>
				    </p>
			    </div>
			    <div class="buttont">
			        <a rel="nofollow" href="<?php echo get_post_meta($post->ID,"golink_value",true);?>" target="_blank" class="demo">立即抢购</a>
			    </div>
			    <div class="bdfx">
			        <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
				</div>
			    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
				<?php the_tags('
	<div class="tags">
	','','
	</div>'); ?>
				</div>
	</div>
	<?php if( dopt('DisplayAd3') ) echo '<div class="adsss">
        '.dopt('Ad3').'
	</div>
    <div class="clear"></div>'; ?>
	<div class="mb_right">
		<div class="tabPanel">
			<ol>
			    <i class="hit">宝贝详情</i>
			    <i>评论咨询</i>
			    <i>消费保障</i>
		    </ol>
		<div class="panes">		
			<div class="pane" style="display:block;">
			     <div class="post-body">
			        <div class="tab_con">
				        <?php the_content(); ?>
						
				    </div>
					<?php endwhile;  ?>
			    </div>
			</div>
			<div class="pane">	
	            <div class="tab_con">
                    <?php comments_template(); ?>            
                </div>
	        </div>
            <div class="pane">
			    <div class="tab_con">
                    <?php echo dopt('goumsh') ?>
                </div>
			</div>
	    </div>
	    </div>
    </div>
</div>
<div class="mb_left">
	<div class="mb_left_title">———— HOT同类热卖 ————</div>
		<ul>
		<?php
global $post;
$cats = wp_get_post_categories($post->ID);
if ($cats) {
    $args = array(
          'category__in' => array( $cats[0] ),
          'post__not_in' => array( $post->ID ),
          'showposts' => 3,
          'caller_get_posts' => 1
      );
  query_posts($args);
  
  if (have_posts()) {
    while (have_posts()) {
      the_post(); update_post_caches($posts); ?>
            <li>            
				<div class="pic">
					<a href="<?php the_permalink(); ?>"><img class="example3" src="<?php echo get_post_meta($post->ID,"spimg_value",true);?>" alt="<?php the_title(); ?>" alt="<?php the_title(); ?>"></a>
					</div>
					<p>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</p>	
					<em>
						宝贝价格：<span>¥<?php echo get_post_meta($post->ID,"price_value",true);?>元</span>
						<a href="<?php echo get_post_meta($post->ID,"golink_value",true);?>">去抢购</a>
					</em>
			</li>
      <?php
    }
  } 
  else {
    echo '<li>* 暂无宝贝</li>';
  }
  wp_reset_query(); 
}
else {
  echo '<li>* 暂无宝贝</li>';
}
?>
        </ul>
</div>
</div>
<?php get_footer(); ?>