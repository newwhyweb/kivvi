<?php

/**
 * The main template file.
 *
 * @package kivvi
 */

get_header(); ?>

<?php
for ($i = 1; $i < 999; $i++) {
    $thisRow = get_field("Section " . $i);
    if (!$thisRow) {
        break;
    }

    foreach ($thisRow as $component => $thisComponentData) {
        // TOP HTML
?>
        <section class="kivvi_section">
            <div class="kivvi_section_content">
                <?php
                get_template_part('template-parts/components/' . $component, '', $thisComponentData);
                // get_template_part('template-parts/components',  $component, array($thisComponentData));
                // $renderComponent = new kivviComponent($component, $thisComponentData);
                // $renderComponent->render();
                ?>
            </div>
        </section>
<?php
    }
}

// the_content();

?>


<?php get_footer(); ?>