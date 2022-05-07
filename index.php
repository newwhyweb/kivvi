<?php

/**
 * The main template file.
 *
 * @package kivvi
 */


get_header(); ?>

<?php
$context = Timber::context();
for ($i = 1; $i < 999; $i++) {
    $thisRow = get_field("Row " . $i);
    if (!$thisRow) {
        break;
    }

    foreach ($thisRow as $component => $thisComponentData) {
        // TODO: TURN INTO CLASS
        // TOP HTML
?>
        <div class="kivvi_row">
            <?php
            switch ($component) {

                    // ELEMENTS
                case  'kivvi_button':
                    include 'components/elements/button.php';
                    break;

                    // COMPONENTS
                case 'kivvi_buttonset':

                    include 'components/components/buttonset.php';
                    break;
            }
            ?>
        </div>
<?php
    }
}

// the_content();

?>


<?php get_footer(); ?>