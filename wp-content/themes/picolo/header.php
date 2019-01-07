<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" lang="<?php bloginfo('language') ?>">
<head>
<meta charset="<?php bloginfo('charset') ?>" />
<title><?php bloginfo('name') ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<!-- CSS
================================================== -->
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/css/bootstrap.css"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/css/bootstrap-responsive.css"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/css/prettyPhoto.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/css/flexslider.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>"/>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'/>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/style-ie.css"/>
<![endif]--> 

<!-- Favicons

================================================== -->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory') ?>/img/favicon.ico"/>
<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory') ?>/img/apple-touch-icon.png"/>
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('stylesheet_directory') ?>/img/apple-touch-icon-72x72.png"/>
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory') ?>/img/apple-touch-icon-114x114.png"/>

<!-- JS
================================================== -->
<script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/js/bootstrap.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/js/jquery.prettyPhoto.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/js/jquery.flexslider.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/js/jquery.custom.js"></script>
<script type="text/javascript">
$(document).ready(function () {

    $("#btn-blog-next").click(function () {
      $('#blogCarousel').carousel('next')
    });
     $("#btn-blog-prev").click(function () {
      $('#blogCarousel').carousel('prev')
    });

     $("#btn-client-next").click(function () {
      $('#clientCarousel').carousel('next')
    });
     $("#btn-client-prev").click(function () {
      $('#clientCarousel').carousel('prev')
    });
    
});

 $(window).load(function(){

    $('.flexslider').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
    });  
});

</script>

<!--Función necesaria para que acciones externas se implementen en la cabecera-->
<?php wp_head() ?>

</head>

<body <?php body_class() ?> >
    <!-- Color Bars (above header)-->
    <div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>

    <div class="container">
    
      <header class="row header"><!-- Begin Header -->
      
        <!-- Logo
        ================================================== -->
        <div class="span5 logo">
            <a href="<?php bloginfo('url') ?>"><?php the_custom_logo() ?></a>
            <h5><?php bloginfo('description') ?></h5>
        </div>
        
        <!-- Main Navigation
        ================================================== -->
        <div class="span7 navigation">
            

                <!--Hacemos que aquí se muestre lo asignado a la zona en el panel de admin-->
                <?php wp_nav_menu(array(
                    "theme_location"=>"zona_header",
                    "container"=>"div",
                    "container_class"=>"navbar",
                    "items_wrap"=>'<ul class="nav">%3$s</ul>'
                ))  ?>

            
        </div>
        
      </header><!-- End Header -->