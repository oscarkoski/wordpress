<?php /*Template Name: página con sidebar*/ ?>
<?php get_header() ?>
     
    <!-- Page Content
    ================================================== --> 
    <?php the_post() ?>
    
    
    <!-- Title Header -->
    <div class="row">
        <div class="span8">
            <h2><?php the_title() ?></h2>
            
            <?php if(has_excerpt()){ ?>
                    <div class="lead"><?php the_excerpt() ?></div>
            <?php } ?>
            
            <div class="row">
                
                <?php $class="span8" ?>
                <?php if(has_post_thumbnail()){ ?>
                    <div class="span4">
                        <?php the_post_thumbnail() ?>
                    </div>
                    <?php $class="span4" ?>
                <?php } ?>
                
                <div class="<?=$class?>">
                    <?php the_content() ?>
                </div>

            </div>

            

        </div> 
        
        <?php get_sidebar() ?>
        
    </div>
    
        
<?php get_footer() ?>    