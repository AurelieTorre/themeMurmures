<?php /* Template Name: Liste des articles ; url : /blog */ ?>

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

<div class="blog">
		<h2 class="blog__h2"><?php the_field('blog__title'); ?></h2>

		<div class="blog__articles">

			<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order' => 'DESC',
				);
			?>

			<?php $the_query = new WP_Query($args); ?>

			<?php if ($the_query->have_posts()) : ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
		
					<div class="blog__articles_item">
						<a class="blog__articles_item_a" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <div class="blog__articles_item_p"><?php the_content(); ?></div>
          </div>

				<?php endwhile; ?>
			<?php endif; ?>

			<?php wp_reset_query(); ?>
			<?php wp_reset_postdata(); ?>    
		</div>

	</div>

<?php get_footer(); ?>