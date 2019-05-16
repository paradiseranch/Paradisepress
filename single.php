
<?php 
	
	/*
	Template Name: Single Blog Posts Template
	*/
	
?>
<?php get_header(); ?>
<div id="maincontent" class="container">
  <div class="row content-padding">
    <div id="blog-content" class="col"><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="blog-heading">
        <h1><?php the_title(); ?></h1>
        <div class="date"><?php echo get_the_date(); ?></div>
        <div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>
      </div><?php the_content(); ?>
      <?php endwhile; ?>
      <div class="navigation">
        <div class="next-posts"><?php next_posts_link(); ?></div>
        <div class="prev-posts"><?php previous_posts_link(); ?></div>
      </div><?php else : ?>
      <h1>Not Found</h1><?php endif; ?>
    </div>
  </div>
</div><?php get_footer(); ?>