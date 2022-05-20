<?php

/**
 * The main template file.
 *
 * @package kivvi
 */

get_header(); ?>

<?php

if (!get_field("section_1")) :
?>
    <section class="kivvi_section">
        <div class="kivvi_section_content">
            <?php the_content(); ?>
        </div>
    </section>
    <?php else :
    for ($i = 1; $i < 999; $i++) {
        $thisRow = get_field("section_" . $i);
        // kivvi_pre($thisRow);
        if (!$thisRow) {
            break;
        }
        // echo '<h3>NOBREAK</h3>';
        foreach ($thisRow as $component => $thisComponentData) {
            // TOP HTML
    ?>
            <section class="kivvi_section">
                <div class="kivvi_section_content">
                    <?php
                    if (locate_template('template-parts/components/' . $component . '.php')) {
                        get_template_part('template-parts/components/' . $component, '', $thisComponentData);
                    } else {
                        $clone = false;
                        foreach ($thisComponentData as $key => $data) {
                            if (substr($key, -4) == "_tab") {
                                $clone = substr($key, 0, -4);

                                break;
                            }
                        }
                        if ($clone && locate_template('template-parts/components/' . $clone . '.php')) {

                            get_template_part('template-parts/components/' . $clone, '', $thisComponentData);
                        }
                        // kivvi_pre($thisComponentData);
                    }

                    // get_template_part('template-parts/components',  $component, array($thisComponentData));
                    // $renderComponent = new kivviComponent($component, $thisComponentData);
                    // $renderComponent->render();
                    ?>
                </div>
            </section>
<?php
        }
    }

endif;



?>


<?php get_footer(); ?>