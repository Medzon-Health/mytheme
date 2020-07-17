<?php 
    if( has_post_thumbnail() ): 
        the_post_thumbnail('post-thumbnail', ['class' => 'd-block w-100 img-fluid', 'title' => 'Feature image']);
    endif; 
?>