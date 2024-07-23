<?php /* Template Name: Accueil ; url : (rien après l'adresse du site) */ ?>
<?php get_header() ?>

<header class="header" style="background-image:url('<?php the_field('home__header_wallpaper'); ?>'); background-position: center; ">
	<?php
		wp_nav_menu(array(
			'menu' => 'main-menu', // Name of the menu
			'container' => 'nav',
			'container_class' => 'header_menu',
			'menu_class' => 'listemenu'
		));
	?>	
	
	<h1 class="header__h1"><?php the_field('home__header_title'); ?></h1>

	<?php if (get_field('home__header_subtitle')) : ?>
		<p class="header__p"><?php the_field('home__header_subtitle'); ?></p>
	<?php endif; ?>
</header>

<main>
	<div class="container">
		<h2 class="container__h2"><?php the_field('home__books_title'); ?></h2>

		<div class="container__publications"> 
			<?php if(have_rows('home__books')) : ?>
				<?php while (the_repeater_field('home__books')) : ?>
				
					<a class="container__publications_a" href="<?php the_sub_field('permalink'); ?>">
						<div class="container__publications_a_book">
							<p class="container__publications_a_book_title"><?php the_sub_field('name'); ?></p>
							<p class="container__publications_a_book_author"><?php the_sub_field('author'); ?></p>
							<div class="container__publications_a_book_cover" style="background-image:url('<?php the_sub_field('cover'); ?>'); background-repeat: no-repeat; background-size: contain;"></div>
					</div>
					</a>
					
				<?php endwhile; ?>
			<?php else : ?>
				<p class="container__publications_a_book_title">Aucun livre n'est encore sorti... Restez à l'affût !</p>
			<?php endif; ?>
		</div>
	</div>

	<div class="container">
		<h2 class="container__h2"><?php the_field('home__articles_title'); ?></h2>

		<div class="container__articles">

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
		
					<div class="container__articles_item">
						<a class="container__articles_item_a" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>

			<?php wp_reset_query(); ?>
			<?php wp_reset_postdata(); ?>    
		</div>

	</div>
</main>

<?php get_footer() ?>