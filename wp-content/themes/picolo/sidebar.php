<!-- Blog Sidebar PAGE
        ================================================== --> 
        <div class="span4 sidebar page-sidebar"><!-- Begin sidebar column -->

            <?php if(is_home()){ ?> 
                <?php dynamic_sidebar('Zona sidebar Blog') ?>
            <?php }else if(is_singular('trabajos')){ ?>
             <?php dynamic_sidebar('Zona sidebar Trabajos') ?>
            <?php }else{ ?> 
                <?php dynamic_sidebar('Zona sidebar') ?>
            <?php } ?> 
            
        </div><!-- End sidebar column -->
        
        
        