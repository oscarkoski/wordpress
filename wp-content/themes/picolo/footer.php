</div> <!-- End Container -->

    <!-- Footer Area
        ================================================== -->

	<div class="footer-container"><!-- Begin Footer -->
    	<div class="container">
        	<div class="row footer-row">
                <div class="span9 footer-col">
                    <!--Mostramos zona en la que se añadirán los widgets-->
                    <?php dynamic_sidebar('Zona footer left') ?>
                </div>
                <div class="span3 footer-col">
                    <!--Mostramos zona en la que se añadirán los widgets-->
                    <?php dynamic_sidebar('Zona footer right') ?>
                </div>
                
            </div>

            <div class="row"><!-- Begin Sub Footer -->
                <div class="span12 footer-col footer-sub">
                    <div class="row no-margin">
                        <div class="span6">
                            <span class="left">Copyright 2012 Piccolo Theme. All rights reserved.</span>
                        </div>
                        <div class="span6">
                            <!--Hacemos que aquí se muestre lo asignado a la zona en el panel de admin-->
                            <?php wp_nav_menu(array(
                                "theme_location"=>"zona_footer",
                                "container"=>"span",
                                "container_class"=>"right",
                                "items_wrap"=>'<ul class="nav">%3$s</ul>'
                            ))  ?>
                        </div>
                    </div>
                </div>
            </div><!-- End Sub Footer -->

        </div>
    </div><!-- End Footer --> 
    
    <!-- Scroll to Top -->  
    <div id="toTop" class="hidden-phone hidden-tablet">Back to Top</div>
    
</body>
</html>
