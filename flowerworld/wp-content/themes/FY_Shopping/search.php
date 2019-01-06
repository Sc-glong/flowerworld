<?php get_header(); ?>
<div class="mb">
    <div class="mbinfo">
        <div class="mb_right">
			<div class="tab_con">
			    <h1 class="ph">搜索结果</h1>
				<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="ss"><a href="<?php  echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h1>
				<?php endwhile; ?>
<?php else : ?>
<h1 class="ss"><?php _e( '抱歉没有找到该文章', 'FengYan' ); ?></h1>
<?php endif; ?>
			</div>
        </div>
	</div>

    <div class="mb_left">
	<div class="mb_left_title">———— 大家正在买 ————</div>
		<ul>
		
		
		<?php 
$post_num = 5; 
$args = array( 
‘post_password’ => ”, 
‘post_status’ => ‘publish’, 
‘post__not_in’ => array($post->ID),
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
<?php get_footer(); ?>