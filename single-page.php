
<?php 
	
	/*
	Template Name: Single Page Template
	*/
	
?>
<?php get_header(); ?>
<div id="maincontent" class="container">
  <div id="productmenu" class="row">
    <div class="col-lg">
      <div class="zipfel-wrapper">
        <div id="zipfel-links"></div>
      </div>
      <div class="zipfel-wrapper">
        <div id="zipfel-rechts"></div>
      </div><?php wp_nav_menu(array('theme_location'=>'secondary_menu')); ?>
    </div>
  </div>
  <div id="content" class="row content-padding">
    	<?php if (have_posts()) : ?>
    		<?php while (have_posts()) : ?>
    	    	<?php the_post(); ?>
    	    		<!--<h2><?php the_title(); ?></h2>-->
    	        	<?php the_content(); ?>
    		<?php endwhile; ?>
    	<?php endif; ?>
  </div>
</div><?php get_footer(); ?>