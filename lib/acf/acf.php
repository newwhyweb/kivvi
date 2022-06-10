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

  foreach ($kivvi_custom_fields as $field) {

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
