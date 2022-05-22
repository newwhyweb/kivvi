<?php
/*
Template Name: Flex Page
*/

get_header();

$pageID = get_the_ID();

if (get_field('kivvi_display_wordpress_page_title')) :
?>
    <section class="section section-title">
        <div class="section-content">
            <h1 class="slideuptext" data-inviewport><?php the_title(); ?></h1>
        </div>
    </section>
    <?php
endif;

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
