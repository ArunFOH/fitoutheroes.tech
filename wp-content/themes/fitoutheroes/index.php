<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package FitOutHeroes
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <?php if (have_posts()) : ?>

        <?php if (is_home() && !is_front_page()) : ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <?php
        /* Start the Loop */
        while (have_posts()) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    if (is_singular()) :
                        the_title('<h1 class="entry-title">', '</h1>');
                    else :
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    endif;

                    if ('post' === get_post_type()) :
                        ?>
                        <div class="entry-meta">
                            <span class="posted-on">
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="byline">
                                <?php esc_html_e('by', 'fitoutheroes'); ?> 
                                <span class="author vcard">
                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <?php echo esc_html(get_the_author()); ?>
                                    </a>
                                </span>
                            </span>
                        </div>
                        <?php
                    endif;
                    ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    if (is_singular()) {
                        the_content();
                    } else {
                        the_excerpt();
                    }

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'fitoutheroes'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    if ('post' === get_post_type()) {
                        $categories_list = get_the_category_list(esc_html__(', ', 'fitoutheroes'));
                        if ($categories_list) {
                            printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'fitoutheroes') . '</span>', $categories_list);
                        }

                        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'fitoutheroes'));
                        if ($tags_list) {
                            printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'fitoutheroes') . '</span>', $tags_list);
                        }
                    }

                    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
                        echo '<span class="comments-link">';
                        comments_popup_link(
                            sprintf(
                                wp_kses(
                                    __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'fitoutheroes'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            )
                        );
                        echo '</span>';
                    }
                    ?>
                </footer>
            </article>

            <?php
        endwhile;

        the_posts_navigation();

    else :
        ?>

        <section class="no-results not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Nothing here', 'fitoutheroes'); ?></h1>
            </header>

            <div class="page-content">
                <?php if (is_home() && current_user_can('publish_posts')) : ?>

                    <p><?php
                        printf(
                            wp_kses(
                                __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fitoutheroes'),
                                array(
                                    'a' => array(
                                        'href' => array(),
                                    ),
                                )
                            ),
                            esc_url(admin_url('post-new.php'))
                        );
                        ?></p>

                <?php elseif (is_search()) : ?>

                    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fitoutheroes'); ?></p>
                    <?php get_search_form(); ?>

                <?php else : ?>

                    <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fitoutheroes'); ?></p>
                    <?php get_search_form(); ?>

                <?php endif; ?>
            </div>
        </section>

        <?php
    endif;
    ?>

</main>

<?php
get_sidebar();
get_footer();