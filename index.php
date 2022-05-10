<?php

/**
 * The main template file.
 *
 * @package kivvi
 */

get_header(); ?>

<?php
for ($i = 1; $i < 999; $i++) {
    $thisRow = get_field("Row " . $i);
    if (!$thisRow) {
        break;
    }

    foreach ($thisRow as $component => $thisComponentData) {
        // TOP HTML
?>
        <div class="kivvi_row">
            <?php
            get_template_part('template-parts/components/' . $component, '', $thisComponentData);
            // get_template_part('template-parts/components',  $component, array($thisComponentData));
            // $renderComponent = new kivviComponent($component, $thisComponentData);
            // $renderComponent->render();
            ?>
        </div>
<?php
    }
}

// the_content();

?>


<?php get_footer(); ?>