<?php get_header(); ?>
 <div class="main_lt" style="position:relative; z-index:9;">
        <div id="slideBox" class="slideBox">
			<div class="bd">
				<ul>
                   <?php echo dopt('huandeng') ?>
				</ul>
			</div>
            <a class="prev" href="javascript:void(0)"></a>
			<a class="next" href="javascript:void(0)"></a>
        </div>
        <script type="text/javascript">
		    jQuery(".slideBox").slide({mainCell:".bd ul",effect:"leftLoop",autoPlay:true,easing:"easeOutCirc",delayTime:1000});
        </script>
    </div>
	<div class="clear"></div>
	<?php if( dopt('DisplayAd1') ) echo '<div class="ads">
        '.dopt('Ad1').'
	</div>
    <div class="clear"></div>'; ?>
	<div class="main">
        <div class="main_l">
	        <div class="shangp">
	            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
				<li>
	                <a href="<?php the_permalink(); ?>" target="_blank">
                    <img class="example1" src="<?php echo get_post_meta($post->ID,"spimg_value",true);?>" alt="<?php the_title(); ?>" style="display: inline;"/>
                    </a>
	                <a class="titie" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><h2><?php the_title(); ?></h2></a>
	                <div>
	                    <b>价格：<?php echo get_post_meta($post->ID,"price_value",true);?>元</b><del>原价：<?php echo get_post_meta($post->ID,"Market_value",true);?>元</del>
		                <p class="protime">
		                    <em><i class="icon iconfont">&#xe62b;</i></em>
		                    <span class="jieshu" endTime="<?php echo get_post_meta($post->ID,"notime_value",true);?>"></span>
		                </p>
	                </div>
                </li>
				<?php endwhile; endif; ?>
			</div>
			<div class="pagination">
                <div class="next-page"><?php next_posts_link(0); ?></div>
            </div>
	    </div>
	    <?php if( dopt('DisplayAd2') ) echo '<div class="adss">
        '.dopt('Ad2').'
	</div>
    <div class="clear"></div>'; ?>
	</div>
<?php get_footer(); ?>