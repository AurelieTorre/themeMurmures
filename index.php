<!-- template général par défaut -->

<?php get_header(); ?>
<?php
  wp_nav_menu(array(
    'menu' => 'main-menu', // Name of the menu
    'container' => 'nav',
    'container_class' => 'header_menu',
    'menu_class' => 'listemenu'
  ));
?>
<h1 class="header__h1">Salutation, mortels !<h1>
<p class="header__p">Il semble que vous soyez perdus dans les vastes plaines brumeuses de Faërie...</p>

<?php if(have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>