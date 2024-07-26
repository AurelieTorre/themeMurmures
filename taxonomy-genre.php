<?php /* Template Name: Liste des genres ; url : /genres */ ?>

<?php get_header() ?>

<?php
		$home_id = get_option('page_on_front'); // Récupérer l'ID de la page d'accueil
		$image_url = get_field('home__header_wallpaper', $home_id); // Récupérer l'image de fond de la page d'accueil
?>

<header class="header" style="background-image:url('<?php echo $image_url; ?>'); background-position: center; "> <!-- echo sert à écrire l'url dans la valeur de l'attribut -->
	<?php
		wp_nav_menu(array(
			'menu' => 'main-menu', // Name of the menu
			'container' => 'nav',
			'container_class' => 'header_menu',
			'menu_class' => 'listemenu'
		));
	?>    
	<h1 class="header__h1"><?php single_term_title(); ?></h1>
</header>

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

