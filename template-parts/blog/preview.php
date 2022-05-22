<div class="blog-item">
    <a href="<?php the_permalink(); ?>"><span class="imgwrapper">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full');
            } else {
                echo '<img src="/wp-content/themes/ncs-theme/images/empty.jpg" />';
            }


            ?>

        </span>
        <h2><?php the_title(); ?></h2>
        <p class="item-date"></p>
        <p>

            <?php the_excerpt(); ?>
        </p>
        <p class="post-link">
            Read this post
        </p>
    </a>
</div>