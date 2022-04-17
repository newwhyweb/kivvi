<?php
require_once(__DIR__ . '/vendor/autoload.php');

/**
 * kivvi functions and definitions
 *
 * @package kivvi
 */

$kivvi_includes = array(
  'lib/utils.php',
  'lib/acf/acf.php',
  // 'lib/admin.php',
  // 'lib/config.php',
  'lib/scripts.php',
  'lib/media.php',
  // 'lib/widgets.php',
  // 'lib/shortcodes.php',
  // 'lib/template-tags.php',
  // 'lib/users.php',
  'lib/cpt/cpt.php',
  // 'lib/extras.php',
  // 'lib/woocommerce.php',
  // 'lib/jetpack.php',
  // 'lib/toolbox.php',
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



add_filter('use_block_editor_for_post', 'yourtheme_hide_editor', 10, 2);
function yourtheme_hide_editor($use_block_editor, $post_type)
{
  remove_post_type_support('page', 'editor'); // disable standard editor
  return false; // and disable gutenberg   
}

$timber = new Timber\Timber();
add_filter('timber/loader/loader', function ($loader) {
  $loader->addPath(__DIR__ . "/components/elements", "elements");
  return $loader;
});
