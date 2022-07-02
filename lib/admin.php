<?php
add_action('admin_head', 'kivvi_dashboard_preloader');
function kivvi_dashboard_preloader()
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
        <div id="kivvi-flex-loader">

            <div class='loader'></div>

        </div>
<?php
    endif;
}
