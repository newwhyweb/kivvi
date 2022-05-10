<?php
$kivvi_component_includes = array(
    'components/elements/kivviComponent.class.php',
    'components/elements/button.class.php',
    'components/components/buttonset.class.php',

);

foreach ($kivvi_component_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'kivvi'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}

unset($file, $filepath);
