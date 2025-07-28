<?php
/**
 * Template for displaying 404 pages (Not Found)
 *
 * @package FitOutHeroes
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'fitoutheroes'); ?></h1>
        </header>

        <div class="page-content">
            <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'fitoutheroes'); ?></p>

            <?php get_search_form(); ?>

            <div class="widget">
                <h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'fitoutheroes'); ?></h2>
                <ul>
                    <?php
                    wp_list_categories(array(
                        'orderby'    => 'count',
                        'order'      => 'DESC',
                        'show_count' => 1,
                        'title_li'   => '',
                        'number'     => 10,
                    ));
                    ?>
                </ul>
            </div>

            <?php
            /* translators: %1$s: smiley */
            $fitoutheroes_archive_content = '<p>' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'fitoutheroes'), convert_smilies(':)')) . '</p>';
            the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$fitoutheroes_archive_content");

            the_widget('WP_Widget_Tag_Cloud');
            ?>

        </div>
    </section>

</main>

<?php
get_footer();