<?php get_header(); ?>   

<div class="wrap">
	<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><div id="theGrid" class="entry main">
			<?php the_content('Read the rest of this entry &raquo;'); ?>
	</div><!--end .entry--><?php endwhile; ?>

	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>

	<?php else : ?>

	<h2 class="center">Not Found</h2>
	<p class="center">Sorry, but you are looking for something that isn't here.</p>
	<?php get_search_form(); ?>

	<?php endif; ?>

</div><!--end .wrap-->

<?php get_footer(); ?>