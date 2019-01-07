<?php get_header() ?>
     
    <!-- Page Content
    ================================================== --> 
    <div class="row">

        <!-- Gallery Items
        ================================================== --> 
        <div class="span12 gallery">

            <div class="row clearfix">
                <ul class="gallery-post-grid holder">

                    <?php if(have_posts()){ ?>
                    <?php while(have_posts()){ ?>
                        <?php the_post() ?>
                    
                    <!-- Gallery Item 1 -->
                    <li  class="span3 gallery-item" data-id="id-1" data-type="illustration">
                        <span class="gallery-hover-4col hidden-phone hidden-tablet">
                            <span class="gallery-icons">
                                <a href="<?php the_post_thumbnail_url() ?>" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto"></a>
                                <a href="<?php the_permalink() ?>" class="item-details-link"></a>
                            </span>
                        </span>
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a>
                        <span class="project-details">
                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            <?php the_excerpt() ?></span>
                    </li>

                    <?php } ?>
                    <?php } ?>
                    

                    


                </ul>
            </div>


        </div><!-- End gallery list-->

        
<?php get_footer() ?>  