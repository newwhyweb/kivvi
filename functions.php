<?php

/**
 * kivvi functions and definitions
 *
 * @package kivvi
 */
if (!defined('KIVVI_PARENT_THEME_DIR')) {
  define('KIVVI_PARENT_THEME_DIR', plugin_dir_path(__FILE__));
}

$kivvi_includes = array(
  'lib/setup.php',
  'lib/utils.php',
  'lib/acf/acf.php',
  // 'lib/admin.php',
  // 'lib/config.php',
  'lib/scripts.php',
  'lib/media.php',
  'lib/widgets.php',
  'lib/shortcodes.php',
  'lib/template-functions.php',
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
  $filepath = KIVVI_PARENT_THEME_DIR . '/' . $file;

  if (!file_exists($filepath)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'kivvi'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
