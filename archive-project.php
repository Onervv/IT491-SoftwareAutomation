<?php
/**
 * The template for displaying project archive
 *
 * @package YWCC_Capstone
 */

get_header(); ?>

<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Capstone Projects Showcase</h2>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Filter Controls -->
                <ul class="portfolio-categ filter">
                    <li class="all active"><a href="#" data-filter="*">All Projects</a></li>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'project_category',
                        'hide_empty' => true,
                    ));
                    
                    foreach ($categories as $category) {
                        echo '<li><a href="#" data-filter=".cat-' . $category->slug . '">' . $category->name . '</a></li>';
                    }
                    ?>
                </ul>
                
                <div class="clearfix"></div>
                
                <!-- Projects Grid -->
                <div class="row">
                    <section id="projects">
                        <ul id="thumbs" class="portfolio">
                            <?php
                            if (have_posts()) :
                                while (have_posts()) : the_post();
                                    $categories = get_the_terms(get_the_ID(), 'project_category');
                                    $category_classes = '';
                                    if ($categories && !is_wp_error($categories)) {
                                        foreach ($categories as $category) {
                                            $category_classes .= ' cat-' . $category->slug;
                                        }
                                    }
                                    
                                    $sponsor_id = get_post_meta(get_the_ID(), '_project_sponsor', true);
                                    $technologies = get_the_terms(get_the_ID(), 'project_technology');
                                    ?>
                                    <li class="item-thumbs col-lg-4 col-md-4 col-sm-6<?php echo $category_classes; ?>">
                                        <div class="project-card">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <a href="<?php the_permalink(); ?>" class="hover-wrap fancybox">
                                                    <span class="overlay-img"></span>
                                                    <span class="overlay-img-thumb"><i class="icon-info-blocks fa fa-search"></i></span>
                                                    <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
                                                </a>
                                            <?php endif; ?>
                                            <div class="project-card-content">
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <?php if ($sponsor_id) : ?>
                                                    <p class="sponsor"><strong>Sponsor:</strong> <?php echo get_the_title($sponsor_id); ?></p>
                                                <?php endif; ?>
                                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                                <?php if ($technologies && !is_wp_error($technologies)) : ?>
                                                    <div class="project-technologies">
                                                        <?php foreach ($technologies as $tech) : ?>
                                                            <span class="tech-tag"><?php echo $tech->name; ?></span>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-theme" style="margin-top: 10px;">View Details</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                endwhile;
                            else :
                                ?>
                                <li class="col-lg-12">
                                    <p>No projects found. Check back soon for exciting capstone projects!</p>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </section>
                </div>
                
                <!-- Pagination -->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => __('« Previous', 'ywcc-capstone'),
                            'next_text' => __('Next »', 'ywcc-capstone'),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
