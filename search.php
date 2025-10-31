<?php
/**
 * The template for displaying search results pages
 *
 * @package YWCC_Capstone
 */

get_header(); ?>

<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Search Results</h2>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if (have_posts()) : ?>
                    <h3><?php printf(__('Search Results for: %s', 'ywcc-capstone'), '<span>' . get_search_query() . '</span>'); ?></h3>
                    
                    <?php while (have_posts()) : the_post(); ?>
                        <article <?php post_class('search-result'); ?>>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p class="meta">
                                <?php 
                                $post_type = get_post_type();
                                $post_type_obj = get_post_type_object($post_type);
                                echo $post_type_obj->labels->singular_name . ' | ';
                                echo get_the_date();
                                ?>
                            </p>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-theme">Read More</a>
                        </article>
                        <hr>
                    <?php endwhile; ?>
                    
                    <!-- pagination -->
                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => __('« Previous', 'ywcc-capstone'),
                            'next_text' => __('Next »', 'ywcc-capstone'),
                        ));
                        ?>
                    </div>
                    
                <?php else : ?>
                    
                    <article>
                        <h3><?php _e('No Results Found', 'ywcc-capstone'); ?></h3>
                        <p><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'ywcc-capstone'); ?></p>
                        
                        <h4>Search Suggestions:</h4>
                        <ul>
                            <li>Check your spelling</li>
                            <li>Try more general keywords</li>
                            <li>Try fewer keywords</li>
                        </ul>
                        
                        <h4>Try searching again:</h4>
                        <?php get_search_form(); ?>
                        
                        <h4>Or browse our content:</h4>
                        <p>
                            <a href="<?php echo get_post_type_archive_link('project'); ?>" class="btn btn-theme">View Projects</a>
                            <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn-theme">View Events</a>
                            
                            <a href="<?php echo home_url('/'); ?>" class="btn btn-theme">Go to Homepage</a>
                        </p>
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
