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

add_action('admin_head', 'dashboard_preloader');
function dashboard_preloader()
{
  if (basename(get_page_template()) == "page-flex.php") :
?>
    <script type="text/javascript">
      jQuery(document).ready(function() {
        jQuery('body').css('overflow', 'hidden');
      });
      jQuery(window).load(function() { // makes sure the whole site is loaded
        jQuery('#status').fadeOut(); // will first fade out the loading animation
        jQuery('#kivvi-flex-loader').fadeOut('slow'); // will fade out the white DIV that covers the website.
        jQuery('body').delay(350).css({
          'overflow': 'visible'
        });


      });
    </script>
    <div style="top: 0px; bottom: 0px; position: fixed; left: 0px; right: 0px; background-color: rgb(255, 255, 255); z-index: 9999;" id="kivvi-flex-loader">

      <div class='loader'></div>

    </div>
<?php
  endif;
}
