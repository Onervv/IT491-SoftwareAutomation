<?php
/**
 * Template part for displaying posts
 *
 * @package YWCC_Capstone
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <span class="posted-on">
                    <i class="fa fa-calendar"></i>
                    <?php echo get_the_date(); ?>
                </span>
                <span class="byline">
                    <i class="fa fa-user"></i>
                    <?php the_author_posts_link(); ?>
                </span>
                <?php if (has_category()) : ?>
                    <span class="cat-links">
                        <i class="fa fa-folder-open"></i>
                        <?php the_category(', '); ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </header>

    <?php if (has_post_thumbnail() && !is_singular()) : ?>
        <div class="entry-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
            
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ywcc-capstone'),
                'after'  => '</div>',
            ));
        else :
            the_excerpt();
            ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-theme btn-sm">Read More</a>
        <?php endif; ?>
    </div>

    <footer class="entry-footer">
        <?php
        if ('post' === get_post_type() && has_tag()) :
            ?>
            <span class="tags-links">
                <i class="fa fa-tags"></i>
                <?php the_tags('', ', '); ?>
            </span>
        <?php endif; ?>
    </footer>
</article>
