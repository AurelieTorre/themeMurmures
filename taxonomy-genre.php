<?php get_header() ?>

<h1 class="header__h1"><?php single_term_title(); ?></h1>

<div class="genre">
    <?php if(have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <a class="genre__a" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                <div class="genre__a_cover" style="background-image:url('<?php the_field('book__cover'); ?>'); background-repeat: no-repeat; background-size: contain;"></div>
            </a>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
    

<?php get_footer() ?>

