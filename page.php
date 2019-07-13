<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
            
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php the_breadcrumb(); ?>
					
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!--end header.entry-header-->
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
        </main><!--end #main-->
    </div><!--end #primary-->
</div><!--end .wrap-->

<?php get_footer(); ?>