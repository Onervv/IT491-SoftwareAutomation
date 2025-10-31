<?php
/**
 * The front page template file
 *
 * @package YWCC_Capstone
 */

get_header(); ?>

<!-- Hero Section with Slider -->
<section id="featured">
    <div id="main-slider" class="flexslider">
        <ul class="slides">
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/slides/capstone-hero-1.jpg" alt="Capstone Projects" />
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-caption">
                                <h3>Shape the Future of Technology</h3>
                                <p>Partner with brilliant students to solve real-world challenges<br>through innovative capstone projects</p>
                                <a href="<?php echo get_permalink(get_page_by_path('become-sponsor')); ?>" class="btn btn-theme">Become a Sponsor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/slides/capstone-hero-2.jpg" alt="Industry Partnership" />
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-caption">
                                <h3>Industry-Academic Partnership</h3>
                                <p>Connect with tomorrow's tech leaders while advancing<br>your organization's innovation goals</p>
                                <a href="<?php echo get_post_type_archive_link('project'); ?>" class="btn btn-theme">View Projects</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/slides/capstone-hero-3.jpg" alt="Innovation Hub" />
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-caption">
                                <h3>Innovation Hub</h3>
                                <p>Access cutting-edge research and development<br>through our comprehensive capstone program</p>
                                <a href="#sponsorship-benefits" class="btn btn-theme">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- Program Overview -->
<section class="callaction">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo get_template_directory_uri(); ?>/img/capstone-overview.png" alt="YWCC Capstone Program" width="100%"/>
            </div>
            <div class="col-md-8">
                <div>
                    <h1><span>YWCC Capstone Program</h1>
                    <span class="clear spacer_responsive_hide_mobile" style="height:13px;display:block;"></span>
                    <p>The YWCC Capstone Program represents the pinnacle of undergraduate education in computing, where talented students collaborate with industry partners to tackle real-world challenges. Our program bridges the gap between academic excellence and practical innovation, creating value for sponsors while preparing the next generation of technology leaders.</p>
                    <p>By sponsoring a capstone project, your organization gains access to fresh perspectives, cutting-edge research, and motivated teams eager to make a meaningful impact. Join us in shaping the future of technology while achieving your business objectives.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('about-capstone')); ?>" class="btn btn-theme">Learn About Our Program</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sponsorship Benefits -->
<section id="content" class="sponsorship-benefits">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Why Sponsor a Capstone Project?</h2>
                <p class="lead">Transform your challenges into opportunities through strategic academic partnership</p>
            </div>
        </div>
        
        <div class="row" style="margin-top: 40px;">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-lightbulb-o"></i>
                <div class="info-blocks-in">
                    <h3>Innovation & Fresh Perspectives</h3>
                    <p>Access cutting-edge solutions and innovative approaches from talented students working with the latest technologies and methodologies.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-users"></i>
                <div class="info-blocks-in">
                    <h3>Talent Pipeline</h3>
                    <p>Identify and recruit top talent before graduation. Work directly with students to assess their skills and cultural fit for your organization.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-rocket"></i>
                <div class="info-blocks-in">
                    <h3>Cost-Effective R&D</h3>
                    <p>Explore new ideas and proof-of-concepts with minimal investment. Test innovative solutions without committing full resources.</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-trophy"></i>
                <div class="info-blocks-in">
                    <h3>Corporate Social Responsibility</h3>
                    <p>Demonstrate commitment to education and community development while enhancing your organization's reputation and brand.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-flask"></i>
                <div class="info-blocks-in">
                    <h3>Research Collaboration</h3>
                    <p>Access university resources, faculty expertise, and research facilities. Co-publish findings and present at conferences.</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-handshake-o"></i>
                <div class="info-blocks-in">
                    <h3>Strategic Partnership</h3>
                    <p>Build long-term relationships with the academic community. Influence curriculum and help shape future technology professionals.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="featured-projects" style="background-color: #f8f8f8; padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Featured Capstone Projects</h2>
                <p class="lead">Discover the innovative solutions our students have developed</p>
            </div>
        </div>
        
        <div class="row" style="margin-top: 40px;">
            <?php
            $featured_projects = new WP_Query(array(
                'post_type' => 'project',
                'posts_per_page' => 3,
                'meta_query' => array(
                    array(
                        'key' => '_featured_project',
                        'value' => 'yes',
                        'compare' => '='
                    )
                ),
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($featured_projects->have_posts()) :
                while ($featured_projects->have_posts()) : $featured_projects->the_post();
                    $sponsor_id = get_post_meta(get_the_ID(), '_project_sponsor', true);
                    $technologies = get_the_terms(get_the_ID(), 'project_technology');
                    ?>
                    <div class="col-md-4">
                        <div class="project-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="project-card-image">
                                    <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
                                </div>
                            <?php endif; ?>
                            <div class="project-card-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php if ($sponsor_id) : ?>
                                    <p class="sponsor">Sponsored by: <strong><?php echo get_the_title($sponsor_id); ?></strong></p>
                                <?php endif; ?>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <?php if ($technologies && !is_wp_error($technologies)) : ?>
                                    <div class="project-technologies">
                                        <?php foreach ($technologies as $tech) : ?>
                                            <span class="tech-tag"><?php echo $tech->name; ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Display placeholder projects
                for ($i = 1; $i <= 3; $i++) :
                    ?>
                    <div class="col-md-4">
                        <div class="project-card">
                            <div class="project-card-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/project-placeholder.jpg" alt="Sample Project" class="img-responsive">
                            </div>
                            <div class="project-card-content">
                                <h3>Sample Project <?php echo $i; ?></h3>
                                <p class="sponsor">Sponsored by: <strong>Leading Tech Company</strong></p>
                                <p>This is a placeholder for an amazing capstone project that showcases student innovation and industry collaboration.</p>
                                <div class="project-technologies">
                                    <span class="tech-tag">Machine Learning</span>
                                    <span class="tech-tag">Python</span>
                                    <span class="tech-tag">Cloud Computing</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endfor;
            endif;
            ?>
        </div>
        
        <div class="row">
            <div class="col-lg-12 text-center" style="margin-top: 30px;">
                <a href="<?php echo get_post_type_archive_link('project'); ?>" class="btn btn-theme">View All Projects</a>
            </div>
        </div>
    </div>
</section>

<!-- Sponsorship Tiers -->
<section class="sponsorship-tiers" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Sponsorship Opportunities</h2>
                <p class="lead">Choose the partnership level that best suits your organization's needs</p>
            </div>
        </div>
        
        <div class="row" style="margin-top: 40px;">
            <div class="col-md-4">
                <div class="sponsorship-tier">
                    <h3 class="text-center">Silver Sponsor</h3>
                    <div class="text-center">
                        <h4>$5,000 - $10,000</h4>
                    </div>
                    <ul>
                        <li>Sponsor one capstone project</li>
                        <li>Direct collaboration with student team</li>
                        <li>Company logo on project materials</li>
                        <li>Invitation to capstone showcase event</li>
                        <li>Access to project deliverables</li>
                        <li>Recruitment opportunities</li>
                    </ul>
                    <div class="text-center">
                        <a href="<?php echo get_permalink(get_page_by_path('become-sponsor')); ?>?tier=silver" class="btn btn-theme">Get Started</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="sponsorship-tier featured">
                    <h3 class="text-center">Gold Sponsor</h3>
                    <div class="text-center">
                        <h4>$10,000 - $25,000</h4>
                    </div>
                    <ul>
                        <li><strong>All Silver benefits plus:</strong></li>
                        <li>Sponsor multiple projects</li>
                        <li>Priority project selection</li>
                        <li>Company presentation opportunity</li>
                        <li>Featured placement at events</li>
                        <li>Dedicated faculty liaison</li>
                        <li>Guest lecture opportunities</li>
                    </ul>
                    <div class="text-center">
                        <a href="<?php echo get_permalink(get_page_by_path('become-sponsor')); ?>?tier=gold" class="btn btn-theme">Most Popular</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="sponsorship-tier">
                    <h3 class="text-center">Platinum Sponsor</h3>
                    <div class="text-center">
                        <h4>$25,000+</h4>
                    </div>
                    <ul>
                        <li><strong>All Gold benefits plus:</strong></li>
                        <li>Strategic partnership status</li>
                        <li>Input on curriculum development</li>
                        <li>Exclusive networking events</li>
                        <li>Co-branded research opportunities</li>
                        <li>Executive advisory board seat</li>
                        <li>Custom benefits package</li>
                    </ul>
                    <div class="text-center">
                        <a href="<?php echo get_permalink(get_page_by_path('become-sponsor')); ?>?tier=platinum" class="btn btn-theme">Premium Partnership</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Current Sponsors -->
<section class="current-sponsors" style="background-color: #f8f8f8; padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Our Industry Partners</h2>
                <p class="lead">Join these leading organizations in supporting student innovation</p>
            </div>
        </div>
        
        <div class="row" style="margin-top: 40px;">
            <?php
            $sponsors = new WP_Query(array(
                'post_type' => 'sponsor',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));
            
            if ($sponsors->have_posts()) :
                while ($sponsors->have_posts()) : $sponsors->the_post();
                    if (has_post_thumbnail()) :
                        ?>
                        <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                            <div class="sponsor-logo text-center">
                                <?php the_post_thumbnail('medium', array('class' => 'img-responsive', 'style' => 'max-height: 100px; width: auto; margin: 0 auto;')); ?>
                            </div>
                        </div>
                    <?php
                    endif;
                endwhile;
                wp_reset_postdata();
            else :
                // Display placeholder logos
                $placeholder_sponsors = array('Microsoft', 'Google', 'Amazon', 'IBM', 'Oracle', 'Intel', 'Adobe', 'Salesforce');
                foreach ($placeholder_sponsors as $sponsor) :
                    ?>
                    <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                        <div class="sponsor-logo text-center" style="background: #ddd; padding: 30px; border-radius: 8px;">
                            <h4><?php echo $sponsor; ?></h4>
                        </div>
                    </div>
                <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>What Our Partners Say</h2>
                <p class="lead">Hear from sponsors about their capstone experience</p>
            </div>
        </div>
        
        <div class="row" style="margin-top: 40px;">
            <?php
            $testimonials = new WP_Query(array(
                'post_type' => 'testimonial',
                'posts_per_page' => 2,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'testimonial_type',
                        'field' => 'slug',
                        'terms' => 'sponsor',
                    ),
                ),
            ));
            
            if ($testimonials->have_posts()) :
                while ($testimonials->have_posts()) : $testimonials->the_post();
                    $author_name = get_post_meta(get_the_ID(), '_testimonial_author_name', true);
                    $author_position = get_post_meta(get_the_ID(), '_testimonial_author_position', true);
                    $author_company = get_post_meta(get_the_ID(), '_testimonial_author_company', true);
                    ?>
                    <div class="col-md-6">
                        <div class="testimonial-box">
                            <p><i class="fa fa-quote-left"></i> <?php the_content(); ?> <i class="fa fa-quote-right"></i></p>
                            <div class="testimonial-author">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/avatar.png" alt="<?php echo esc_attr($author_name); ?>">
                                <?php endif; ?>
                                <div>
                                    <strong><?php echo esc_html($author_name); ?></strong><br>
                                    <?php echo esc_html($author_position); ?><br>
                                    <?php echo esc_html($author_company); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Display sample testimonials
                ?>
                <div class="col-md-6">
                    <div class="testimonial-box">
                        <p><i class="fa fa-quote-left"></i> Working with YWCC capstone students has been an incredible experience. Their fresh perspective and technical expertise helped us solve a challenge we'd been struggling with for months. We not only got a great solution but also recruited two talented developers from the team. <i class="fa fa-quote-right"></i></p>
                        <div class="testimonial-author">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/avatar.png" alt="John Smith">
                            <div>
                                <strong>John Smith</strong><br>
                                CTO<br>
                                Tech Innovations Inc.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimonial-box">
                        <p><i class="fa fa-quote-left"></i> The capstone program provided us with an opportunity to explore emerging technologies without the risk of a full R&D investment. The students' enthusiasm and dedication exceeded our expectations, and the final product became the foundation for a new product line. <i class="fa fa-quote-right"></i></p>
                        <div class="testimonial-author">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/avatar.png" alt="Sarah Johnson">
                            <div>
                                <strong>Sarah Johnson</strong><br>
                                VP of Innovation<br>
                                Global Solutions Corp.
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-sponsor">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Ready to Become a Sponsor?</h2>
                <p class="lead">Join us in shaping the future of technology education</p>
                <a href="<?php echo get_permalink(get_page_by_path('become-sponsor')); ?>" class="btn btn-lg">Start Your Sponsorship Journey</a>
                <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-lg" style="margin-left: 20px;">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events -->
<section class="upcoming-events" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="block-heading-two">
                    <h3><span>Upcoming Events</span></h3>
                </div>
                <?php
                $events = new WP_Query(array(
                    'post_type' => 'event',
                    'posts_per_page' => 3,
                    'meta_key' => '_event_date',
                    'orderby' => 'meta_value',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => '_event_date',
                            'value' => date('Y-m-d'),
                            'compare' => '>=',
                            'type' => 'DATE'
                        )
                    )
                ));
                
                if ($events->have_posts()) :
                    echo '<div class="event-calendar">';
                    while ($events->have_posts()) : $events->the_post();
                        $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                        $event_time = get_post_meta(get_the_ID(), '_event_time', true);
                        $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                        ?>
                        <div class="event-item">
                            <span class="event-date">
                                <?php echo $event_date ? date('M d, Y', strtotime($event_date)) : ''; ?>
                                <?php echo $event_time ? ' at ' . date('g:i A', strtotime($event_time)) : ''; ?>
                            </span>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php if ($event_location) : ?>
                                <p><i class="fa fa-map-marker"></i> <?php echo esc_html($event_location); ?></p>
                            <?php endif; ?>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                    <?php
                    endwhile;
                    echo '</div>';
                    wp_reset_postdata();
                else :
                    ?>
                    <p>No upcoming events scheduled. Check back soon!</p>
                <?php endif; ?>
            </div>
            
            <div class="col-md-5">
                <div class="latest-post-wrap">
                    <h3><span>Latest News</span></h3>
                    <?php
                    $news = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 3
                    ));
                    
                    if ($news->have_posts()) :
                        while ($news->have_posts()) : $news->the_post();
                            ?>
                            <div class="post-item-wrap">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive post-author-img')); ?>
                                <?php endif; ?>
                                <div class="post-content1">
                                    <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    <div class="post-meta-top">
                                        <ul>
                                            <li><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
                                            <li><p><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <p>No news articles yet. Check back for updates!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
