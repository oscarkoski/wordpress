<?php get_header() ?>
     
    <!-- Page Content
    ================================================== --> 
    <?php the_post() ?>
    
    
    <!-- Title Header -->
    <div class="row">
        <div class="span12">
            <h2><?php the_title() ?></h2>
            
            <?php if(has_excerpt()){ ?>
                    <div class="lead"><?php the_excerpt() ?></div>
            <?php } ?>
            
            <div class="row">
                
                <?php $class="span12" ?>
                <?php if(has_post_thumbnail()){ ?>
                    <div class="span6">
                        <?php the_post_thumbnail() ?>
                    </div>
                    <?php $class="span6" ?>
                <?php } ?>
                
                <div class="<?=$class?>">
                    <?php the_content() ?>
                </div>

            </div>

            

        </div> 
    </div>
    
        
<?php get_footer() ?>    