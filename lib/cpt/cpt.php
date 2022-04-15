<?php

$kivvi_cpt_includes = array(
    'lib/cpt/buttons/buttons.php'
   
  );
  
  foreach ($kivvi_cpt_includes as $file) {
    if (!$filepath = locate_template($file)) {
      trigger_error(sprintf(__('Error locating %s for inclusion', 'kivvi'), $file), E_USER_ERROR);
    }
    require_once $filepath;
  }
  
  unset($file, $filepath);