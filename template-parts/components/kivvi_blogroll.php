<?php

$headerInfo = $args["kivvi_blogroll_header_text"];
$headerInfo["kivvi_component"] = "kivvi_header_text";
$html = '';
$html .= kivvi_admin_opening_html('kivvi_blogroll', $args);
$html .= kivvi_get_template_part('template-parts/components/kivvi_header_text', $headerInfo);



$posts = isset($args["kivvi_blogroll_number"]) ? $args["kivvi_blogroll_number"] : 3;
$postargs = array("posts_per_page" => $posts);
query_posts($postargs);
$numposts = 0;
if (have_posts()) :
    $html .= '<div class="blogroll">';
    while (have_posts()) : the_post();

        $args['numposts'] = $numposts;
        $html .= kivvi_get_template_part('template-parts/blog/preview', $args);

        if ($numposts < 9) {
            $numposts++;
        }
    endwhile;
    $html .= '</div>';
endif;
wp_reset_query();
$html .= '</div>
<div><a href="' . get_permalink(get_option('page_for_posts')) . '" class="button" role="button">
        <span class="button-text">View All News</span>
    </a>
</div>';
echo $html;
