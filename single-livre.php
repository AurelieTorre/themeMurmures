<?php get_header() ?>

<article>

    <?php
        $home_id = get_option('page_on_front'); // Récupérer l'ID de la page d'accueil
        $image_url = get_field('home__header_wallpaper', $home_id); // Récupérer l'image de fond de la page d'accueil
    ?>

    <header class="header" style="background-image:url('<?php echo $image_url; ?>'); background-position: center; "> <!-- echo sert à écrire l'url dans la valeur de l'attribut -->
        <h1 class="header__h1"><?php the_title(); ?></h1>
    </header>

    <div class="book">
        <div class="book__left">
            <p class="book__left_p"><?php the_field('book__author'); ?></p>
            <div class="book__left_cover" style="background-image:url('<?php the_field('book__cover'); ?>'); background-repeat: no-repeat; background-size: cover;"></div>        
        </div>

        <div class="book__right">

            <!-- Récupérer la disponibilité du livre et lui associer une classe (avec un nom normé) selon son état -->
            <p class="book__right_p"><span class="dispo-<?php $dispo = get_field('book__dispo'); echo sanitize_title($dispo); ?>"><?php the_field('book__dispo'); ?></span></p>
            
            <?php
            // Récupérer les genres du livre (taxonomie)
            $genres = get_the_terms(get_the_ID(), 'genre');

            // Vérifier si des termes ont été trouvés
            if ($genres && !is_wp_error($genres)) {
                // Compter le nombre de termes
                $count_genres = count($genres);

                // Déterminer le libellé correct en fonction du nombre de termes
                $genre_label = $count_genres > 1 ? 'Genres : ' : 'Genre : ';

                // Collecter les noms et les liens des genres
                $genre_links = array();
                foreach ($genres as $genre) {
                    $genre_links[] = '<a href="' .  get_term_link($genre->term_id) . '">' . esc_html($genre->name) . '</a>';
                }

                // Afficher les genres (cliquables)
                echo '<p class="book__right_p">' . $genre_label . ' ' . implode(', ', $genre_links) . '</p>';
                }
            ?>
            <p class="book__right_p"><?php the_field('book__extract'); ?></p>
            <p class="book__right_p">Date de parution : <?php the_field('book__date'); ?></p>
            <p class="book__right_p">Prix : <?php the_field('book__price'); ?> €</p>
        </div>
    </div>

</article>

<?php get_footer() ?>