<?php
/**
 * The main template file
 *
 * @package YWCC_Capstone
 */

get_header(); ?>

<?php if (is_home() && !is_front_page()) : ?>
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle"><?php single_post_title(); ?></h2>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', get_post_format());
                    endwhile;
                    
                    // Pagination
                    ?>
                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => __('« Previous', 'ywcc-capstone'),
                            'next_text' => __('Next »', 'ywcc-capstone'),
                        ));
                        ?>
                    </div>
                    <?php
                else :
                    ?>
                    <article>
                        <h2><?php _e('Nothing Found', 'ywcc-capstone'); ?></h2>
                        <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ywcc-capstone'); ?></p>
                        <?php get_search_form(); ?>
                    </article>
                <?php endif; ?>
            </div>
            
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
