
<?php 
	
	/*
	Template Name: Front Page Template
	*/
	
?>
<?php get_header(); ?>
<div id="maincontent" class="container">
  <div id="content" class="row">
    <div class="col-lg"></div>
  </div>
  <div id="content" class="row">
    <div class="col-8">
      <div id="inhalt">
        <?php 
        	$post_id = 334; 
        	$post_content = get_post($post_id);
        	$content = $post_content->post_content;
        	echo apply_filters('the_content',$content);
        ?>
      </div>
    </div>
    <div class="col-4">
      <div id="blog-teaser">
        <h4>neues im blog</h4><?php 
        				
        $args = array( 'numberposts' => 2, 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");
        $postslist = get_posts( $args );
        	
        echo '<ul id="latest_posts">';
        foreach ($postslist as $post) :  setup_postdata($post); 
        ?> 
        			 <li>
        			 	<h3><a href="/index.php/blog#post-<?php the_ID()?>" title="<?php the_title();?>"> <?php the_title(); ?></a></h3>
        				<div class="the-date"><?php the_date(); ?></div>
        			 	<?php echo get_excerpt(); ?>
        			</li>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div><?php get_footer(); ?>