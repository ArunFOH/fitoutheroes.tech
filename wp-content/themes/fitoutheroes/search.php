<?php
/**
 * Template for displaying search results
 *
 * @package FitOutHeroes
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if (have_posts()) : ?>

        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(
                    /* translators: %s: search query. */
                    esc_html__('Search Results for: %s', 'fitoutheroes'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php
        /* Start the Loop */
        while (have_posts()) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

                    <?php if ('post' === get_post_type()) : ?>
                        <div class="entry-meta">
                            <span class="posted-on"><?php echo get_the_date(); ?></span>
                            <span class="byline">
                                <?php esc_html_e('by', 'fitoutheroes'); ?> 
                                <span class="author vcard">
                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <?php echo esc_html(get_the_author()); ?>
                                    </a>
                                </span>
                            </span>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>

                <footer class="entry-footer">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more">
                        <?php esc_html_e('Read More', 'fitoutheroes'); ?>
                    </a>
                </footer>
            </article>

            <?php
        endwhile;

        the_posts_navigation();

    else :
        ?>

        <section class="no-results not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Nothing Found', 'fitoutheroes'); ?></h1>
            </header>
            
            <div class="page-content">
                <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fitoutheroes'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </section>

        <?php
    endif;
    ?>

</main>

<?php
get_sidebar();
get_footer();