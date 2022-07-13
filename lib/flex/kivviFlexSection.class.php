<?php

class kivviFlexSection
{
    public $section = false;
    public function __construct($section = false, $type = 'flex')
    {
        $this->section = $section;
        $this->type = $type;
    }

    public function getHeader()
    {
        if (!$this->section) {
            return;
        }
        $html = '';
        $section = $this->section;
        $components = $section['kivvi_' . $this->type . '_components'];


        $componentStylesArray = array();
        foreach ($components as $component) {
            if ($component["acf_fc_layout"]) {
                $componentStylesArray[] = $component["acf_fc_layout"];
            }
        }
        $componentStyles = implode(" ", $componentStylesArray);
        $sectionStyles = '';
        $sectionClasses = " " . $componentStyles;
        if ($section["kivvi_section_classes"]) {
            $sectionClasses .= ' ' . $section["kivvi_section_classes"];
        }

        $sectionID = '';
        if ($section["kivvi_section_id"]) {
            $sectionID .= ' id="' . trim($section["kivvi_section_id"]) . '"';
        }
        if ($section['kivvi_section_full_width']) {
            if ($section["kivvi_section_background_keep_image_mobile"]) {
                $sectionClasses .= ' kivvi-section-background-keep-image-mobile';
            }
            if ($section['kivvi_section_background'] && $section["kivvi_section_background_type"] == "image") {
                $sectionStyles .= 'background-image: url(' . $section['kivvi_section_background']['url'] . ');';
            }
            if ($section["kivvi_section_background_color"] && $section["kivvi_section_background_type"] == "color") {
                $sectionStyles .= 'background-color: ' . $section["kivvi_section_background_color"] . ';';
            }
            $html .= '<div class="section-group full-width' . $sectionClasses . '" style="' . $sectionStyles . '" ' . $sectionID . '>';
        }
        $html .= '<section class="kivvi_section';
        if (!$section['kivvi_section_full_width']) {
            $html .= $sectionClasses;
        }
        $html .= '"';
        if (!$section['kivvi_section_full_width']) {
            $html .= ' ' . $sectionID;
        }
        $html .= '>';
        $html .= '<div class="kivvi_section_content">';

        return $html;
    }

    public function getFooter()
    {
        if (!$this->section) {
            return;
        }
        $section = $this->section;
        $html = '
        </div>
        </section>';

        if ($section['kivvi_section_full_width']) {
            $html .= '</div>'; // GROUP
        }
        return $html;
    }
}
