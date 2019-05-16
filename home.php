
<?php 
	
	/*
	Template Name: Blog Page Template
	*/
	
?>
<?php get_header(); ?>
<div id="maincontent" class="container">
  <div id="content" class="row">
    <div class="col-lg"><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="post-content">
        <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
        <div class="the-date"><?php echo get_the_date(); ?></div>
        <div class="post-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div><?php the_excerpt(); ?>
      </div><?php endwhile; ?>
      <div class="navigation">
        <div class="next-posts"><?php next_posts_link(); ?></div>
        <div class="prev-posts"><?php previous_posts_link(); ?></div>
      </div><?php else : ?>
      <h1>Not Found</h1><?php endif; ?>
    </div>
  </div>
</div><?php get_footer(); ?>