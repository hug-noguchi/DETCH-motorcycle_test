<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php remove_filter ('the_content', 'wpautop'); ?>
<?php the_content('続きを読む'); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>