<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else : ?>
                    <div class="widget">
                        <h5 class="widgetheading">Our Contact</h5>
                        <address>
                            <strong><?php bloginfo('name'); ?></strong><br>
                            New Jersey Institute of Technology<br>
                            323 Dr Martin Luther King Jr Blvd<br>
                            Newark, NJ 07102
                        </address>
                        <p>
                            <i class="icon-phone"></i> <br>
                            <i class="icon-envelope-alt"></i> harshchalamani@gmail.com
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else : ?>
                    <div class="widget">
                        <h5 class="widgetheading">Quick Links</h5>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class' => 'link-list',
                            'container' => false,
                            'fallback_cb' => false,
                            'depth' => 1,
                        ));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else : ?>
                    <div class="widget">
                        <h5 class="widgetheading">Latest Projects</h5>
                        <ul class="link-list">
                            <?php
                            $recent_projects = new WP_Query(array(
                                'post_type' => 'project',
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            ));
                            
                            if ($recent_projects->have_posts()) :
                                while ($recent_projects->have_posts()) : $recent_projects->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<li>No projects found</li>';
                            endif;
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3">
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <?php dynamic_sidebar('footer-4'); ?>
                <?php else : ?>
                    <div class="widget">
                        <h5 class="widgetheading">Upcoming Events</h5>
                        <ul class="link-list">
                            <?php
                            $upcoming_events = new WP_Query(array(
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
                            
                            if ($upcoming_events->have_posts()) :
                                while ($upcoming_events->have_posts()) : $upcoming_events->the_post();
                                    $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title();
                                    if ($event_date) {
                                        echo ' - ' . date('M j, Y', strtotime($event_date));
                                    }
                                    echo '</a></li>';
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<li>No upcoming events</li>';
                            endif;
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="social-network">
                        <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<?php wp_footer(); ?>
</body>
</html>
