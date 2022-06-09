<?php

/**
 * The main template file.
 *
 * @package kivvi
 */

get_header(); ?>

<?php
echo 'kjkljekwrj';
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
        if (!$thisRow) {
            break;
        }
    ?>
        <section class="kivvi_section">
            <div class="kivvi_section_content">
                <?php
                foreach ($thisRow as $component => $thisComponentData) {
                    kivvi_get_component_template($component, $thisComponentData);
                }
                ?>
            </div>
        </section>
<?php
    }


endif;



?>


<?php get_footer(); ?>