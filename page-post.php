<?php
get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="header-post-blog">
        </section>

        <?php
        // Obtén el ID del post (puedes cambiar 123 con el ID deseado)
        $post_id = 160;

        // Obtiene los datos de la publicación usando el ID
        $post = get_post($post_id);

        // Verifica si se encontró la publicación
        if ($post) :
            setup_postdata($post);
            ?>
            <section class="blog-post-content">
                <div class="container">
                    <div class="blog-superior">
                        By <span><?php the_author(); ?></span> | <?php the_date(); ?>
                    </div>
                    <h1><?php the_title(); ?></h1>

                    <?php the_content(); ?>

                </div>
            </section>
            <?php
            wp_reset_postdata();
        else :
            // Mostrar algún mensaje si la publicación no se encuentra
            echo 'Publicación no encontrada.';
        endif;
        ?>
    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
?>