<?php

$kivvi_custom_fields = array();

$kivvi_acf_includes = array(
  'lib/acf/kivviACFField.class.php',
  'lib/acf/kivviACFGroup.class.php',
  'lib/acf/kivviACFUtils.class.php',
  'lib/acf/theme_options.php',

  'lib/acf/components/standalones.php',

  'lib/acf/components/elements/headertag.php',
  'lib/acf/components/components/admin.php',
  'lib/acf/components/elements/button.php',
  'lib/acf/components/components/headertext.php',
  'lib/acf/components/components/card.php',
  'lib/acf/components/components/cardset.php',
  'lib/acf/components/components/buttonset.php',
  'lib/acf/components/components/accordion.php',
  'lib/acf/components/components/modalvideo.php',
  'lib/acf/components/components/timeline.php',
  'lib/acf/components/components/blogroll.php',
  'lib/acf/components/components/hero.php',
  'lib/acf/components/components/twoup.php',
  'lib/acf/components/components/testimonial.php',
  'lib/acf/components/components/cta.php',
  'lib/acf/components/components/tabs.php',



  'lib/acf/templates/pages/buttons.php',


);

foreach ($kivvi_acf_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'kivvi'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}


unset($file, $filepath);

function kivvi_register_custom_fields()
{
  global $kivvi_custom_fields, $kivvi_custom_standalone_fields;

  foreach ($kivvi_custom_fields as $key => $field) {

    // REGISTER TABS LATER TO USE GROUPS AS DEFINED LATER IN THE PROCESS
    // IT'S REGISTERED BELOW
    if ($key == "kivvi_tabs") {
      continue;
    }

    $field = new kivviACFGroup($field);
    $field->registerFieldGroup();
  }
  foreach ($kivvi_custom_standalone_fields as $field) {
    acf_add_local_field(
      $field
    );
  }
}
add_action('acf/init', 'kivvi_register_custom_fields', 50);



$kivvi_flex_page_ignore_groups = array(
  'kivvi_admin',
  'kivvi_theme_options',
  'kivvi_standalone_fields',
);


$kivvi_layouts_in_use = array();
$kivvi_flex_page_active = true;
$kivvi_flex_page_override = false;
add_action("acf/init", 'kivvi_flex_page_field_groups', 51);
function kivvi_flex_page_field_groups()
{
  global $kivvi_flex_page_ignore_groups, $kivvi_flex_page_active, $kivvi_flex_page_override, $kivvi_layouts_in_use;
  // IF THE THEME IS OVERRIDING THE FLEX PAGE, OR NOT USING IT, DO NOT DO THIS FUNCTION

  if ($kivvi_flex_page_override || !$kivvi_flex_page_active) {
    return;
  }

  $field_groups = acf_get_field_groups();

  $layouts = array();
  foreach ($field_groups as $field_group) {
    // if (!in_array($field_group["key"], $kivvi_flex_page_ignore_groups) &&  $field_group['location'][0][0]['value'] == 'kivvi-components-hidden') {
    if (!in_array($field_group["key"], $kivvi_flex_page_ignore_groups)) {
      $layouts['layout_' . $field_group['key']] = array(
        'key' => 'layout_' . $field_group['key'],
        'name' => 'layout_' . $field_group['key'],
        'label' => $field_group['title'],
        'sub_fields' => array(
          array(
            'key' => 'flex_' . $field_group['key'],
            'label' => $field_group['title'],
            'name' => 'flex_' . $field_group['key'],
            'type' => 'clone',
            'display' => 'group',
            'clone' => array(
              0 => $field_group['key'],
            ),
          )
        )
      );
    }
  }
  $kivvi_layouts_in_use = $layouts;
}



add_action("acf/init", 'kivvi_add_tab_layouts', 52);
function kivvi_add_tab_layouts()
{

  global $kivvi_custom_fields, $kivvi_layouts_in_use;
  if ($kivvi_custom_fields["kivvi_tabs"]) {
    $layoutFields = $kivvi_layouts_in_use;
    // DON'T ALLOW FOR TAB NESTING -> POTENTIAL FOR INFINITE LOOP
    unset($layoutFields["layout_kivvi_tabs"]);

    $kivvi_custom_fields["kivvi_tabs"]["fields"]["kivvi_tabs_items"]["sub_fields"]["kivvi_tabs_item_content"]["layouts"] = $layoutFields;
    $kivvi_layouts_in_use["layout_kivvi_tabs"] = array(
      'key' => 'layout_kivvi_tabs',
      'name' => 'layout_kivvi_tabs',
      'label' => 'Tabs',
      'sub_fields' => array(
        array(
          'key' => 'flex_kivvi_tabs',
          'label' => 'Tabs',
          'name' => 'flex_kivvi_tabs',
          'type' => 'clone',
          'display' => 'group',
          'clone' => array(
            0 => 'kivvi_tabs',
          ),
        )
      )
    );


    $field = new kivviACFGroup($kivvi_custom_fields["kivvi_tabs"]);
    $field->registerFieldGroup();
  }
}

add_action("acf/init", 'kivvi_register_flex_page_group', 53);
function kivvi_register_flex_page_group()
{
  global $kivvi_layouts_in_use;
  if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
      'key' => 'kivvi_wireframes_flex',
      'title' => 'Wireframe Flex Fields',

      'fields' => array(
        array(
          'key' => 'kivvi_display_wordpress_page_title',
          'label' => 'Display WordPress Page Title?',
          'name' => 'kivvi_display_wordpress_page_title',
          'type' => 'true_false',
          'instructions' => 'Set this to false if you are incorporating the page title into a component',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'message' => '',
          'default_value' => 1,
          'ui' => 1,
          'ui_on_text' => '',
          'ui_off_text' => '',
        ),
        array(
          'key' => 'kivvi_flex_sections',
          'label' => 'Sections',
          'name' => 'kivvi_flex_sections',
          'type' => 'repeater',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'collapsed' => '',
          'min' => 0,
          'max' => 0,
          'layout' => 'block',
          'button_label' => 'Add New Section',
          'sub_fields' => array(
            array(
              'key' => 'kivvi_components_parent',
              'label' => 'Components',
              'name' => 'kivvi_components_parent',
              'type' => 'tab',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'placement' => 'top',
              'endpoint' => 0,
            ),
            array(
              'key' => 'kivvi_flex_components',
              'label' => 'Components',
              'name' => 'kivvi_flex_components',
              'type' => 'flexible_content',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'layouts' => $kivvi_layouts_in_use,
              'button_label' => 'Add Component To This Section',
              'min' => '',
              'max' => '',
            ),

            array(
              'key' => 'kivvi_section_settings',
              'label' => 'Section Settings',
              'name' => '',
              'type' => 'tab',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'placement' => 'top',
              'endpoint' => 0,
            ),
            array(
              'key' => 'kivvi_section_admin_name',
              'label' => 'Section Admin Name',
              'name' => 'kivvi_section_admin_name',
              'type' => 'text',
              'instructions' => 'Administrative name for this section - will only show up in the admin',

            ),
            array(
              'key' => 'kivvi_section_full_width',
              'label' => 'Force Full Width',
              'name' => 'kivvi_section_full_width',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'kivvi_section_background_type',
              'label' => 'Background',
              'name' => 'kivvi_section_background_type',
              'type' => 'radio',
              'choices' => array(
                'image' => 'Image',
                'color' => 'Color',
              ),
              'layout' => 'horizontal',
              'return_format' => 'value',
              'default_value' => 'image',

            ),
            array(
              'key' => 'kivvi_section_background',
              'label' => 'Background Image',
              'name' => 'kivvi_section_background',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'array',
              'preview_size' => 'medium',
              'library' => 'all',
              'min_width' => 0,
              'min_height' => 0,
              'min_size' => 0,
              'max_width' => 0,
              'max_height' => 0,
              'max_size' => 0,
              'mime_types' => '',
              'conditional_logic' => array(
                array(
                  array(
                    'field' => 'kivvi_section_background_type',
                    'operator' => '==',
                    'value' => 'image',
                  ),
                ),
              ),
            ),
            array(
              'key' => 'kivvi_section_background_color',
              'label' => 'Background Color',
              'name' => 'kivvi_section_background_color',
              'type' => 'color_picker',
              'conditional_logic' => array(
                array(
                  array(
                    'field' => 'kivvi_section_background_type',
                    'operator' => '==',
                    'value' => 'color',
                  ),
                ),
              ),
            ),
            array(
              'key' => 'kivvi_section_classes',
              'label' => 'Section Classes',
              'name' => 'kivvi_section_classes',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
            array(
              'key' => 'kivvi_section_id',
              'label' => 'Section ID',
              'name' => 'kivvi_section_id',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ),
          ),
        ),
      ),

      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-flex.php',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => true,
      'description' => '',
      'show_in_rest' => 0,
    ));

  endif;
}



add_filter('theme_page_templates', 'kivvi_remove_page_templates', 51);
function kivvi_remove_page_templates($page_templates)
{
  global $kivvi_flex_page_active;
  if (!$kivvi_flex_page_active) {
    unset($page_templates['page-flex.php']);
  }
  return $page_templates;
}
