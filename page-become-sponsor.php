<?php
/**
 * Template Name: Become a Sponsor
 * Description: Page template for sponsor application
 *
 * @package YWCC_Capstone
 */

get_header(); ?>

<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle"><?php the_title(); ?></h2>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article>
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; ?>
                
                <!-- Sponsor Application Form -->
                <div class="sponsor-application-form" style="margin-top: 40px;">
                    <h3>Sponsor Interest Form</h3>
                    <p>Please fill out this form and we'll contact you to discuss sponsorship opportunities.</p>
                    
                    <form id="sponsor-form" class="contact-form" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name">Company Name *</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industry">Industry Sector *</label>
                                    <select class="form-control" id="industry" name="industry" required>
                                        <option value="">Select Industry</option>
                                        <option value="technology">Technology</option>
                                        <option value="finance">Finance</option>
                                        <option value="healthcare">Healthcare</option>
                                        <option value="retail">Retail</option>
                                        <option value="manufacturing">Manufacturing</option>
                                        <option value="government">Government</option>
                                        <option value="nonprofit">Non-Profit</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_name">Contact Name *</label>
                                    <input type="text" class="form-control" id="contact_name" name="contact_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_position">Position/Title *</label>
                                    <input type="text" class="form-control" id="contact_position" name="contact_position" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_email">Email Address *</label>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_phone">Phone Number *</label>
                                    <input type="tel" class="form-control" id="contact_phone" name="contact_phone" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="sponsorship_level">Preferred Sponsorship Level *</label>
                            <select class="form-control" id="sponsorship_level" name="sponsorship_level" required>
                                <option value="">Select Level</option>
                                <option value="silver">Silver ($5,000 - $10,000)</option>
                                <option value="gold">Gold ($10,000 - $25,000)</option>
                                <option value="platinum">Platinum ($25,000+)</option>
                                <option value="custom">Custom Package</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="project_interest">Project Interest Areas</label>
                            <p class="help-block">Select all areas your organization is interested in</p>
                            <div class="checkbox-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="project_areas[]" value="ai_ml"> AI/Machine Learning
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="project_areas[]" value="web_mobile"> Web/Mobile Development
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="project_areas[]" value="cybersecurity"> Cybersecurity
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="project_areas[]" value="data_analytics"> Data Analytics
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="project_areas[]" value="cloud"> Cloud Computing
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="project_areas[]" value="iot"> IoT
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="project_areas[]" value="other"> Other
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="project_description">Project Description</label>
                            <p class="help-block">Briefly describe any specific challenges or projects you'd like students to work on</p>
                            <textarea class="form-control" id="project_description" name="project_description" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="additional_info">Additional Information</label>
                            <textarea class="form-control" id="additional_info" name="additional_info" rows="3"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="checkbox">
                                <input type="checkbox" name="newsletter" value="yes"> 
                                Subscribe to YWCC Capstone newsletter
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-theme">Submit Sponsor Application</button>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Sponsorship Benefits Summary -->
                <div class="widget" style="background: #f8f8f8; padding: 20px;">
                    <h4>Sponsorship Benefits</h4>
                    <ul class="link-list">
                        <li><i class="fa fa-check" style="color: #C22731;"></i> Access to talented student teams</li>
                        <li><i class="fa fa-check" style="color: #C22731;"></i> Innovative solutions to real challenges</li>
                        <li><i class="fa fa-check" style="color: #C22731;"></i> Recruitment pipeline for top talent</li>
                        <li><i class="fa fa-check" style="color: #C22731;"></i> Corporate social responsibility</li>
                        <li><i class="fa fa-check" style="color: #C22731;"></i> Research collaboration opportunities</li>
                        <li><i class="fa fa-check" style="color: #C22731;"></i> Brand visibility on campus</li>
                    </ul>
                </div>
                
                <!-- Process Timeline -->
                <div class="widget" style="margin-top: 30px;">
                    <h4>Sponsorship Process</h4>
                    <div class="timeline">
                        <div class="timeline-item">
                            <strong>1. Initial Contact</strong>
                            <p>Submit your interest form</p>
                        </div>
                        <div class="timeline-item">
                            <strong>2. Consultation</strong>
                            <p>Discuss your needs and objectives</p>
                        </div>
                        <div class="timeline-item">
                            <strong>3. Project Definition</strong>
                            <p>Define scope and requirements</p>
                        </div>
                        <div class="timeline-item">
                            <strong>4. Team Assignment</strong>
                            <p>Match student team to your project</p>
                        </div>
                        <div class="timeline-item">
                            <strong>5. Project Kickoff</strong>
                            <p>Begin collaboration</p>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="widget" style="margin-top: 30px; background: #C22731; color: #fff; padding: 20px;">
                    <h4 style="color: #fff;">Need More Information?</h4>
                    <p>Contact our sponsorship team:</p>
                    <p>
                        <i class="fa fa-phone"></i> (123) 456-7890<br>
                        <i class="fa fa-envelope"></i> harshchalamani@gmail.com
                    </p>
                    <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-default">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
