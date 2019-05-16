
<?php 
	
	/*
	Template Name: Start Page Template
	*/
	
?>
<?php get_header(); ?>
<div id="maincontent" class="container">
  <div id="content" class="row">
    <div class="col-lg">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php endwhile; ?>
      <?php else : ?>
      <h1>Not Found</h1><?php endif; ?>
    </div>
  </div>
</div><?php get_footer(); ?>