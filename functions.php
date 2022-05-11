<?php

/**
 * kivvi functions and definitions
 *
 * @package kivvi
 */

$kivvi_includes = array(
  'lib/setup.php',
  'lib/utils.php',
  'lib/acf/acf.php',
  // 'lib/admin.php',
  // 'lib/config.php',
  'lib/scripts.php',
  'lib/media.php',
  'lib/widgets.php',
  // 'lib/shortcodes.php',
  // 'lib/template-tags.php',
  // 'lib/users.php',
  'lib/cpt/cpt.php',
  // 'lib/extras.php',
  // 'lib/woocommerce.php',
  // 'lib/jetpack.php',
  // 'lib/facetwp.php',
  // 'lib/mail.php',
  // 'lib/search.php',

);

foreach ($kivvi_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'kivvi'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
