<?php get_header(); ?>

<main class="wrap">
    <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
    
    <div class="inner-wrapper">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php the_breadcrumb(); ?>

        <div class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </div><!--end header.entry-header-->
        <div class="entry-content">
            <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">Pages:',
                'after' => '</div>',
            ) );
            ?>
        </div><!--end .entry-content-->
        </article><!--end #post-##-->

        <?php endwhile; else: ?>
            <p>Sorry, no posts matched your criteria</p>
        <?php endif; ?>
        
    </div>
    
</main><!--end main.wrap-->

<?php get_footer(); ?>