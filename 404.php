<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package YWCC_Capstone
 */

get_header(); ?>

<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">404 - Page Not Found</h2>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 style="font-size: 120px; color: #C22731;">404</h1>
                <h2>Page Not Found</h2>
                <p class="lead">The page you're looking for doesn't exist or has been moved.</p>
                
                <div style="margin: 40px 0;">
                    <p>Here are some helpful links to get you back on track:</p>
                    <a href="<?php echo home_url('/'); ?>" class="btn btn-theme">Go to Homepage</a>
                    <a href="<?php echo get_post_type_archive_link('project'); ?>" class="btn btn-theme">View Projects</a>
                    <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-theme">Contact Us</a>
                </div>
                
                <div style="margin-top: 40px;">
                    <h3>Or try searching:</h3>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
