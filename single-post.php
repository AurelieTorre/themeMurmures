<?php get_header() ?>

<article>

	<?php
		$home_id = get_option('page_on_front'); // Récupérer l'ID de la page d'accueil
		$image_url = get_field('home__header_wallpaper', $home_id); // Récupérer l'image de fond de la page d'accueil
	?>

	<header class="header" style="background-image:url('<?php echo $image_url; ?>'); background-position: center; ">
		<h1 class="header__h1"><?php the_title(); ?></h1>
	</header>

    <div class="book">
			<div class="book__left">
				<?php if (get_field('post__image')): ?>
					<div class="book__left_cover" style="background-image:url('<?php the_field('post__image'); ?>'); background-repeat: no-repeat; background-size: contain;"></div>
				<?php endif; ?>
					
				<?php if (get_field('post__gallery')): ?>
					<div class="book__left_cover" style="background-image:url('<?php the_field('post__gallery'); ?>'); background-repeat: no-repeat; background-size: contain;"></div>
				<?php endif; ?>
			</div>

			<div class="book__right">
				<p class="book__right_p"><?php the_field('post__text'); ?></p>
						
				<?php 
					$date = get_field('post__date');
					$date_end = get_field('post__date_end');
					if (!empty($date) || !empty($date_end)) {
						?>
						<p class="book__right_p">Date de l'événement : 
							<?php echo $date; ?>
							<?php if (!empty($date_end)) { echo ' - ' . $date_end; } ?>
						</p>
						<?php
					}
				?>

			<?php
			// Récupérer les catégories de l'article
			$post_categories = get_the_category();

			// Vérifier si des catégories ont été trouvées
			if (! empty( $post_categories ) ) {
				// Compter le nombre de catégories
				$count_categories = count($post_categories);

				// Déterminer le libellé correct en fonction du nombre de catégories
				$category_label = $count_categories > 1 ? 'Catégories : ' : 'Catégorie : ';

				// Collecter les noms et les liens des catégories
				$category_links = array();
				foreach ($post_categories as $category) {
					$category_links[] = '<a href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . '</a>';
				}

				// Afficher les catégories (cliquables)
				echo '<p class="book__right_p">' . $category_label . ' ' . implode(', ', $category_links) . '</p>';
				}
			?>
		</div>

        
	</div>

</article>

<?php get_footer() ?>