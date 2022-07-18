<?php

$pageID = get_the_ID();

if (get_field('kivvi_display_wordpress_page_title')) :
?>
    <section class="section section-title">
        <div class="section-content">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>
<?php
endif;

if ($sections = get_field('kivvi_flex_sections', $pageID)) :
    foreach ($sections as $section) :

        $sectionClass = new kivviFlexSection($section);
        echo $sectionClass->getHeader();

        $thisRow = $section["kivvi_flex_components"];
        if (!$thisRow) {
            break;
        }

        foreach ($thisRow as $key => $row) {
            foreach ($row as $component => $thisComponentData) {
                // kivvi_pre($thisComponentData);
                kivvi_get_component_template($component, $thisComponentData);
            }
        }
        echo $sectionClass->getFooter();

    endforeach;

endif;
