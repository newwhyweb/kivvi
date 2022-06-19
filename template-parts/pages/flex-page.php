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
        $components = $section['kivvi_flex_components'];

        $componentStylesArray = array();
        foreach ($components as $component) {
            if ($component["acf_fc_layout"]) {
                $componentStylesArray[] = $component["acf_fc_layout"];
            }
        }
        $componentStyles = implode(" ", $componentStylesArray);
        $sectionStyles = '';
        if ($section['kivvi_section_full_width']) {
            if ($section['kivvi_section_background']) {
                $sectionStyles .= 'background-image: url(' . $section['kivvi_section_background']['url'] . ');';
            }
            echo '<div class="section-group full-width ' . $componentStyles . '" style="' . $sectionStyles . '">';
        }

        $sectionClasses = ' ' . $componentStyles;
        if ($section["kivvi_section_classes"]) {
            $sectionClasses .= ' ' . $section["kivvi_section_classes"];
        }

        $sectionID = '';
        if ($section["kivvi_section_id"]) {
            $sectionID .= ' id="' . trim($section["kivvi_section_id"]) . '"';
        }



    ?>
        <section class="kivvi_section<?php echo $sectionClasses; ?>" <?php echo $sectionID; ?>>
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
        if ($section['kivvi_section_full_width']) {
            echo '</div>'; // GROUP
        }

    endforeach;

endif;
