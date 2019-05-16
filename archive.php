
<?php 
	
	/*
	Template Name: Archive Page Template
	*/
	
?>
<?php get_header(); ?>
<div id="maincontent" class="container">
  <div id="content" class="row">
    <div class="col-lg">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <a class="the-date" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
      <div class="post-thumbnail"><?php the_post_thumbnail(); ?></div><?php the_content(); ?>
      <?php endwhile; ?>
      <div class="navigation">
        <div class="next-posts"><?php next_posts_link(); ?></div>
        <div class="prev-posts"><?php previous_posts_link(); ?></div>
      </div><?php else : ?>
      <h1>Not Found</h1><?php endif; ?>
    </div>
  </div>
</div><?php get_footer(); ?>