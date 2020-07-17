<h1><?php the_title(); ?></h1>
<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a') ?></small>
<hr>
<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
<p><?php the_content(); ?></p>
<hr>