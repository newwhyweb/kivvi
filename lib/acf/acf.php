<?php

$kivvi_custom_fields = array();

$kivvi_acf_includes = array(
  'lib/acf/kivviACFField.class.php',
  'lib/acf/kivviACFGroup.class.php',
  'lib/acf/kivviACFUtils.class.php',
  'lib/acf/theme_options.php',

  'lib/acf/components/components/admin.php',
  'lib/acf/components/elements/button.php',
  'lib/acf/components/components/card.php',
  'lib/acf/components/components/buttonset.php',
  'lib/acf/components/components/accordion.php',
  'lib/acf/components/components/modalvideo.php',



  'lib/acf/templates/pages/buttons.php',


);

foreach ($kivvi_acf_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'kivvi'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}


unset($file, $filepath);
