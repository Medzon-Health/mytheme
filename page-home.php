<?php get_header(); ?>
    <br>
    <div class="row">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php
                    $args_cat = array(
                        'include' => '7, 8, 9'
                    );
                    $categories = get_categories( $args_cat );
                    $flag = true;
                    foreach($categories as $category):
                        $args = array(
                            'type' => 'post',
                            'posts_per_page' => 1,
                            'offset' => 0,
                            "category__in" => $category->term_id,
                        );
                        $lastBlog = new WP_Query( $args );
                        if( $lastBlog->have_posts() ): 
                            while( $lastBlog->have_posts() ): $lastBlog->the_post(); 
                                if ($flag) { $flag = false; ?>
                                    <div class="carousel-item active">
                                <?php } else { ?>
                                    <div class="carousel-item">
                                <?php } ?>
                                    <?php get_template_part( 'content-image-only' ); ?>
                                </div>
                            <?php endwhile;
                        endif; 
                        wp_reset_postdata();              
                    endforeach;             
                ?>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php 
            if( have_posts() ): 
                while( have_posts() ): the_post(); ?>

                    <?php get_template_part( 'content', get_post_format() ); ?>

                <?php endwhile;
            endif;
            ?>
        </div>
    </div>
<?php get_footer(); ?>