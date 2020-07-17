<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Theme</title>
    <?php wp_head(); ?>
</head>

<?php 
    if( is_front_page() ):
        $mytheme_classes = array( 'mytheme-home' );
    else:
        $mytheme_classes = array( 'mytheme-nonhome' );
    endif;
?>

<body <?php body_class( $mytheme_classes ); ?>>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xs-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="/">MyTheme</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php wp_nav_menu( array( 
                            'theme_location'=>'primary', 
                            'container'=>false,
                            'menu_class' => 'navbar-nav ml-auto',
                            'list_item_class' => 'nav-link text-white'
                            ) 
                        ); ?>
                    </div>
                </nav>
            </div>
        </div>
        <?php if( header_image() ): ?>
            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="header image background" />
        <?php endif; ?>            

