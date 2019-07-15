<?php /* Template Name: Search Page */ ?>

<?php get_header(); ?>

<main class="wrap">

    <?php if (have_posts()) : ?>
    
    <div class="inner-wrapper">
        <h2><?php printf( esc_html__( 'Search results for: %s' ), '<span>"' . get_search_query() . '"</span>' ); ?></h2>
        <?php while (have_posts()) : the_post(); ?>
            <div <?php post_class("search-result") ?>>
                <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt();?></p>
                <small><?php the_time('l, F jS, Y') ?></small>
                <small class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?></small>
            </div>
        <?php endwhile; ?>
        <div class="navigation">
            <div><?php next_posts_link('&laquo; Older Entries') ?></div>
            <div><?php previous_posts_link('Newer Entries &raquo;') ?></div>
        </div>
        <h3>Not what you were looking for? Try a different search:</h3>
        <?php get_search_form(); ?>
        <?php else : ?>
            <p>No posts found. Try a different search:</p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>

</main><!--end .wrap-->

<?php get_footer(); ?>
