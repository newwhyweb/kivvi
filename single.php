<?php

/**
 * The main post file.
 *
 * @package kivvi
 */


get_header();
?>
<section class="section">
    <div class="section-content">
        <h1><?php the_title(); ?></h1>
    </div>
</section>
<section class="section">
    <div class="section-content kivvi_simple_content">
        <?php
        the_content();
        ?>
    </div>
</section>

<?php
get_footer();
