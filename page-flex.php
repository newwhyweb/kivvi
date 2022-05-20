<?php
/*
Template Name: Flex Page
*/

get_header();

$pageID = get_the_ID();
if ($sections = get_field('kivvi_flex_sections', $pageID)) :
    // kivvi_pre($sections);
    foreach ($sections as $section) :
?>
        <section class="kivvi_section">
            <div class="kivvi_section_content">
                <?php
                $thisRow = $section["kivvi_flex_components"];
                if (!$thisRow) {
                    break;
                }
                foreach ($thisRow as $key => $row) {
                    foreach ($row as $component => $thisComponentData) {
                        kivvi_get_component_template($component, $thisComponentData);
                    }
                }

                ?>

            </div>
        </section>
<?php
    endforeach;

endif;


get_footer();
