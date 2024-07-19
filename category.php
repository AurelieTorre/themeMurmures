<?php /* Template Name: Catégories ; url :  */ ?>

<?php get_header() ?>

<?php
$home_id = get_option('page_on_front'); // Récupérer l'ID de la page d'accueil
$image_url = get_field('home__header_wallpaper', $home_id); // Récupérer l'image de fond de la page d'accueil
?>

<header class="header" style="background-image:url('<?php echo $image_url; ?>'); background-position: center; ">
  <h1 class="header__h1">Liste des catégories d'articles</h1>
</header>

<?php get_footer(); ?>