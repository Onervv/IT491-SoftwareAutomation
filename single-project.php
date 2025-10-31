<?php
/**
 * The template for displaying single project
 *
 * @package YWCC_Capstone
 */

get_header(); ?>

<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">
                    <a href="<?php echo get_post_type_archive_link('project'); ?>">Projects</a> | 
                    <?php the_title(); ?>
                </h2>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <?php while (have_posts()) : the_post(); 
            $sponsor_id = get_post_meta(get_the_ID(), '_project_sponsor', true);
            $team_members = get_post_meta(get_the_ID(), '_project_team_members', true);
            $mentor = get_post_meta(get_the_ID(), '_project_mentor', true);
            $outcome = get_post_meta(get_the_ID(), '_project_outcome', true);
            $impact = get_post_meta(get_the_ID(), '_project_impact', true);
            $categories = get_the_terms(get_the_ID(), 'project_category');
            $technologies = get_the_terms(get_the_ID(), 'project_technology');
        ?>
        <div class="row">
            <div class="col-lg-8">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="project-featured-image">
                        <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                    </div>
                <?php endif; ?>
                
                <article>
                    <h1><?php the_title(); ?></h1>
                    
                    <div class="project-meta" style="margin-bottom: 30px;">
                        <?php if ($sponsor_id) : ?>
                            <p><strong>Industry Sponsor:</strong> 
                                <?php 
                                $sponsor_link = get_permalink($sponsor_id);
                                echo '<a href="' . $sponsor_link . '">' . get_the_title($sponsor_id) . '</a>';
                                ?>
                            </p>
                        <?php endif; ?>
                        
                        <?php if ($categories && !is_wp_error($categories)) : ?>
                            <p><strong>Category:</strong> 
                                <?php
                                $category_list = array();
                                foreach ($categories as $category) {
                                    $category_list[] = $category->name;
                                }
                                echo implode(', ', $category_list);
                                ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    
                    <h3>Project Overview</h3>
                    <?php the_content(); ?>
                    
                    <?php if ($outcome) : ?>
                        <h3>Project Outcome</h3>
                        <p><?php echo wpautop($outcome); ?></p>
                    <?php endif; ?>
                    
                    <?php if ($impact) : ?>
                        <h3>Industry Impact</h3>
                        <p><?php echo wpautop($impact); ?></p>
                    <?php endif; ?>
                </article>
            </div>
            
            <div class="col-lg-4">
                <div class="widget" style="background: #f8f8f8; padding: 20px;">
                    <h4>Project Details</h4>
                    
                    <?php if ($team_members) : ?>
                        <h5>Team Members</h5>
                        <p><?php echo wpautop($team_members); ?></p>
                    <?php endif; ?>
                    
                    <?php if ($mentor) : ?>
                        <h5>Faculty Mentor</h5>
                        <p><?php echo esc_html($mentor); ?></p>
                    <?php endif; ?>
                    
                    <?php if ($technologies && !is_wp_error($technologies)) : ?>
                        <h5>Technologies Used</h5>
                        <div class="project-technologies">
                            <?php foreach ($technologies as $tech) : ?>
                                <span class="tech-tag"><?php echo $tech->name; ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div style="margin-top: 30px;">
                        <h5>Interested in Sponsoring?</h5>
                        <p>Learn how your organization can sponsor exciting projects like this one.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('become-sponsor')); ?>" class="btn btn-theme btn-block">Become a Sponsor</a>
                    </div>
                </div>
                
                <!-- Related Projects -->
                <?php
                $related_args = array(
                    'post_type' => 'project',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand',
                );
                
                // If sponsor exists, prioritize projects from same sponsor
                if ($sponsor_id) {
                    $related_args['meta_query'] = array(
                        array(
                            'key' => '_project_sponsor',
                            'value' => $sponsor_id,
                            'compare' => '='
                        )
                    );
                }
                
                $related_projects = new WP_Query($related_args);
                
                if ($related_projects->have_posts()) : ?>
                    <div class="widget" style="margin-top: 30px;">
                        <h4>Related Projects</h4>
                        <ul class="link-list">
                            <?php while ($related_projects->have_posts()) : $related_projects->the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
