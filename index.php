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

        switch ($component) {
                // ELEMENTS
            case  'button':
                break;

                // COMPONENTS
            case 'Button Set':

                include 'components/components/buttonset.php';
                break;
        }
    }
}

// the_content();

?>


<?php get_footer(); ?>