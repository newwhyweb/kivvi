<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kivvi
 * 
 */
?>


</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php get_template_part('template-parts/footer/footer-widgets'); ?>
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
    if (document.getElementById("page-transition")) {
        document.getElementById("page-transition").classList.remove('active');
        pageTransitioning = false;
        setPendingActives();
    }
</script>


</body>

</html>