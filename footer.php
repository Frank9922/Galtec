<?php

?>



			<footer class="site-footer">
				<div class="footer-first">

					<div class="img">
						<?php if (get_locale() == 'en_US') : ?>
						<a href="https://galtec.ar/en/home">
						<?php else : ?>
						<a href="https://galtec.ar/">
						<?php endif ?>
							<img src="https://galtec.ar/wp-content/uploads/2023/10/logo-footer.png">
						</a>	
					</div>
					<div class="links">
						<?php if (get_locale() == 'en_US') : ?>
					<ul>
						<li><strong>Company</strong></li>		
						<li><a href="https://galtec.ar/en/home/#about-us">About us</a></li>	
						<li><a href="https://galtec.ar/en/home/#our-team">Our team</a></li>	
					</ul>
					<ul>
						<li><strong>Publications</strong></li>		
						<li><a href="https://galtec.ar/en/selected-publications/">Selected</a></li>	
						<li><a href="https://galtec.ar/en/publications-all/">Publications</a></li>	
					</ul>
					<ul>
						<!--<li><strong><a href="">Products</a></strong></li>-->
						<!--<li><strong><a href="">Blog</a></strong></li>-->
						<li><strong><a href="https://galtec.ar/en/home/#contact">Contact</a></strong></li>	
					</ul>
					<?php else : ?>
					<ul>
						<li><strong>Empresa</strong></li>		
						<li><a href="https://galtec.ar/#nosotros">Sobre Nosotros</a></li>	
						<li><a href="https://galtec.ar/#equipo">Nuestro Equipo</a></li>	
					</ul>
					<ul>
						<li><strong>Publicaciones</strong></li>		
						<li><a href="https://galtec.ar/publicaciones-seleccionadas/">Seleccionadas</a></li>	
						<li><a href="https://galtec.ar/publicaciones-todas/">Todas</a></li>
					</ul>
					<ul>
						<!--<li><strong><a href="">Programas</a></strong></li>-->	
						<!--<li><strong><a href="">Noticias</a></strong></li>-->
						<li><strong><a href="https://galtec.ar/#contacto">Contacto</a></strong></li>	
					</ul>

					<?php endif ?>
					</div>
				</div>
					<div class="footer-mobile">
						<p>Vuelta de Obligado 2490, Ciudad de Buenos Aires, Argentina</p>
						<p>info@galtec.ar</p>
					</div>
				<div class="footer-row last-row">
					<div class="container">
						<?php if (get_locale() == 'en_US') : ?>
							<p>Developed by <a href="https://thet.com.ar/" target="_blank">THET Studio</a></p>
							<p>Photography by <span>Verónica Tello</span></p>
						<?php else : ?>
							<p>Desarrollado por <a href="https://thet.com.ar/" target="_blank">THET Studio</a></p>
							<p>Fotografía por <span>Verónica Tello</span></p>
						<?php endif; ?>
					</div>
				</div>
			</footer>

		</div>
	</div><!-- body_class -->
</div>

	<?php wp_footer(); ?>

	</body>
</html>

	<?php

