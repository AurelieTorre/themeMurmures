<?php /* Template Name: Liste de tout ; url :  */ ?>

<?php get_header() ?>
<?php
  wp_nav_menu(array(
    'menu' => 'main-menu', // Name of the menu
    'container' => 'nav',
    'container_class' => 'header_menu',
    'menu_class' => 'listemenu'
  ));
?>
<h1 class="header__h1"><?php the_title(); ?></h1>
<p class="content__p><?php the_content(); ?></p>

<?php get_footer(); ?>