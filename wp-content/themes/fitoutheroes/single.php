<?php
/**
 * Template for displaying single posts
 *
 * @package FitOutHeroes
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                <?php if ('post' === get_post_type()) : ?>
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
                <?php endif; ?>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'fitoutheroes'),
                    'after'  => '</div>',
                ));
                ?>
            </div>

            <footer class="entry-footer">
                <?php
                $categories_list = get_the_category_list(esc_html__(', ', 'fitoutheroes'));
                if ($categories_list) {
                    printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'fitoutheroes') . '</span>', $categories_list);
                }

                $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'fitoutheroes'));
                if ($tags_list) {
                    printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'fitoutheroes') . '</span>', $tags_list);
                }
                ?>
            </footer>
        </article>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

</main>

<?php
get_sidebar();
get_footer();