<?php /* Template Name: Liste des livres ; url : /livres */ ?>

<?php get_header() ?>

<?php
$home_id = get_option('page_on_front'); // Récupérer l'ID de la page d'accueil
$image_url = get_field('home__header_wallpaper', $home_id); // Récupérer l'image de fond de la page d'accueil
?>

<header class="header" style="background-image:url('<?php echo $image_url; ?>'); background-position: center; ">
	<?php
		wp_nav_menu(array(
			'menu' => 'main-menu', // Name of the menu
			'container' => 'nav',
			'container_class' => 'header_menu',
			'menu_class' => 'listemenu'
		));
	?>
  <h1 class="header__h1"><?php the_title(); ?></h1>
</header>

<?php
	$args = array(
		'post_type' => 'livre',
		'posts_per_page' => -1 // Retrieve all livres
	);
?>	

<?php	$livres = new WP_Query($args); ?>

<?php	if ($livres->have_posts())  : ?>
	<?php	while ($livres->have_posts()) : $livres->the_post(); ?>

		<div class="content">
			<a class="content__a" href="<?php the_permalink(); ?>">
				<h2 class="content__h2"><?php get_field('book__title'); ?></h2>
				<p class="content__p"><?php get_field('book__author'); ?></p>
				<p class="content__p"><?php get_field('book__author'); ?></p>
				<div class="content__img" style="background-image:url('<?php the_field('book__cover'); ?>'); background-repeat: no-repeat; background-size: contain;"></div>
			</a>
		</div>

	<?php endwhile; ?>
<?php else : ?>
	<p class="content__p">Aucun livre n'est encore sorti... Restez à l'affût !</p>
<?php endif; ?>

<?php wp_reset_query(); ?>
<?php wp_reset_postdata(); ?> 

<?php get_footer(); ?>