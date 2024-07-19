<?php wp_footer(); ?>

		<footer class="footer">
			<?php
				// Obtenir l'URL de la page avec le slug "about"
				$about_page_url = get_permalink(get_page_by_path('about'));
			?>
			<a href="<?php echo esc_url($about_page_url); ?>">À propos de nous</a>

			<p>© Murmures à la Lune éditions, 2024</p>
		</footer>

		<script></script>
	</body>
</html>