<?php

?><!doctype html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<?php if (get_locale() == 'en_US') : ?>
        <!-- Metadatos para la versión en inglés -->
        <meta name="description" content="We are translating our discoveries on galectins and their ligands into new opportunities to target therapies for cancer, autoimmunity, and chronic inflammatory diseases." />
		<meta property="og:image" content="https://galtec.ar/wp-content/uploads/2023/11/Galtec-OG_v2_EN.jpg" />
    <?php else : ?>
        <!-- Metadatos para la versión en español -->
        <meta name="description" content="Traducimos descubrimientos basados en galectinas y sus ligandos en nuevas oportunidades terapéuticas para pacientes con cáncer, autoinmunidad y enfermedades inflamatorias crónicas." />
		<meta property="og:image" content="https://galtec.ar/wp-content/uploads/2023/11/Galtec-OG_v2_ES.jpg" />
    <?php endif; ?>
	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>

</head>

<body <?php body_class('body-classes-holder'); ?> id="<?php the_id(); ?>">

<div id="page" class="site">

	<div >
		<header>
			<div class="logo-menu">
				<?php if ( get_theme_mod( 'm1_logo' ) ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" class="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				<?php endif; ?>

<nav class="nav-menu">
    <?php
    wp_nav_menu(array(
        'menu' => 'Main Menu',
        'theme_location' => 'header-menu'
    ));

    // Código del filtro wp_nav_menu_items
    function agregar_idioma_opuesto_al_menu($items, $args) {
        if ($args->theme_location == 'header-menu') {
            $current_language = pll_current_language(); // Obtener el idioma actual
            $opposite_language = ($current_language == 'es') ? 'en' : 'es'; // Obtener el idioma opuesto

            $current_page_id = get_the_ID(); // Obtener el ID de la página actual

            // Obtener la URL de la página en el idioma opuesto
            $opposite_page_id = pll_get_post($current_page_id, $opposite_language);
            $opposite_page_url = get_permalink($opposite_page_id);

            // Construir el nuevo elemento del menú
            $nuevo_item = '<li id="switch-lang" class="menu-item"><a href="' . esc_url($opposite_page_url) . '">' . strtoupper($opposite_language) . '</a></li>';

            // Agregar el nuevo elemento justo antes del cierre del menú
            $items .= $nuevo_item;
        }

        return $items;
    }

    add_filter('wp_nav_menu_items', 'agregar_idioma_opuesto_al_menu', 10, 2);
    ?>
</nav>

				<div class="burguer-holder">
					<div class="menu-opener">
						<span class="line-burguer"></span>
					</div>
				</div>
			</div>
			
			<?php if (get_locale() == 'en_US') : ?>
				<?php if(is_page('home')) : ?>
					<a href="#contact" class="contact-btn hashed">Contact us</a>
				<?php else : ?>
					<a href="/home/#contact" class="contact-btn hashed">Contact us</a>
				<?php endif ?>
			<?php else : ?>
				<a href="/#contacto" class="contact-btn hashed">Contacto</a>
			<?php endif; ?>

		</header>

		<div id="content" <?php body_class('page-class-holder site-content'); ?>>

