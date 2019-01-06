<?php get_header(); ?>
<div class="mb">
<div class="nymanny">
    <div class="nywenz">
        <div class="hengxian">
            <div class="wenz"><?php while (have_posts()) : the_post(); ?>
                <header class="article-header"><h1 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		            <div class="article-meta">
			        <span class="item"><i class="fa fa-user"></i> <?php the_author(); ?></span>
			        <span class="item"><i class="fa fa-clock-o"></i> <?php echo timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) )?></span>
			        <span class="item"><i class="fa fa-comment"></i> 评论(<?php echo zfunc_comments_users($post->ID); ?>)</span> 
		            </div>
	            </header><?php endwhile;  ?>
	            <div class="post-body"> <?php the_content(); ?></div>
                <p class="post-copyright">除特别注明外，本站所有文章均为<a href="<?php site_url(); ?>" style="color:#51aded;"><?php bloginfo('name'); ?></a>原创，转载请注明出处来自<a href="<?php the_permalink(); ?>" style="color:#51aded;"><?php the_permalink(); ?></a></p> 
            </div>
        </div>
    <div class="hengxian">
       
        <div class="wenz">
       <?php comments_template(); ?>         
        </div>
	</div>
    </div>
</div>

 <div class="mb_left">
	<div class="mb_left_title">———— 大家正在买 ————</div>
		<ul>
			<?php 
$post_num = 1; 
$args = array( 
‘post_password’ => ”, 
‘post_status’ => ‘publish’,
//‘post__not_in’ => array($post->ID),
	'post__in'   => array(2,4,6),
‘caller_get_posts’ => 1, 
‘orderby’ => ‘comment_count’,
‘posts_per_page’ => $post_num 
); 
$query_posts = new WP_Query(); 
$query_posts->query($args); 
while( $query_posts->have_posts() ) { $query_posts->the_post(); ?> 
<li>            
				    <div class="pic">
					    <a href="<?php the_permalink(); ?>"><img class="example3" src="<?php echo get_post_meta($post->ID,"spimg_value",true);?>" alt="<?php the_title(); ?>"></a>
					</div>
					<p>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</p>	
					<em>
						宝贝价格：<span>¥<?php echo get_post_meta($post->ID,"price_value",true);?>元</span>
						<a href="<?php echo get_post_meta($post->ID,"golink_value",true);?>">去抢购</a>
					</em>
				</li>
<?php } wp_reset_query();?> 
        </ul>
	</div> 
</div>
</div>