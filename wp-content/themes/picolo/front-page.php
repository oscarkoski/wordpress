<?php get_header() ?>
     
      <section class="row headline"><!-- Begin Headline -->
    
     	<!-- Slider Carousel
        ================================================== -->
        <div class="span8">
            <div class="flexslider">
              <ul class="slides">
                  <?php 
                  $args = array("post_type"=>"slider","orderby"=>"date","order"=>"DESC", "post_per_page"=>4);
                  $consulta = new WP_Query($args);
                  ?>
                  <?php if($consulta->have_posts()){ ?>
                    <?php while($consulta->have_posts()){ ?>
                        <?php $consulta->the_post() ?>
                        <li>
                            <?php the_post_thumbnail() ?>
                        </li>
                    <?php } ?>
                  <?php } ?>
                  <?php wp_reset_postdata() ?>
                
              </ul>
            </div>
        </div>
        
        <!-- Headline Text
        ================================================== -->
        <div class="span4">
            
            <?php
            $args = array("post_type"=>"page","page_id"=>13);
            $consulta = new WP_Query($args);
            if($consulta->have_posts()){
                $consulta->the_post(); ?>
                <h3><?php the_title() ?></h3>
                <?php if(has_excerpt()){ ?>
                
                <div class="lead"><?php the_excerpt() ?></div>
            <?php } ?>
            <?php } ?>
                <div class="lead"><?php the_excerpt() ?></div>
                <div><?php the_content() ?></div>
            <?php wp_reset_postdata() ?>
            
            
        </div>
    </section><!-- End Headline -->
    
    <div class="row gallery-row"><!-- Begin Gallery Row --> 
      
    	<div class="span12">
            <h5 class="title-bg">Recent Work 
                <small>That we are most proud of</small>
            </h5>
    	
        <!-- Gallery Thumbnails
        ================================================== -->

            <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder">

                <?php
                $args = array("post_type"=>"trabajos","orderby"=>"date","order"=>"DESC","posts_per_page"=>8);
                $consulta = new WP_Query($args);
                if($consulta->have_posts()){ ?>
                    <?php while($consulta->have_posts()){ ?>
                        <?php $consulta->the_post() ?>
                        <!-- Gallery Item 1 -->
                            <li class="span3 gallery-item" data-id="id-1" data-type="illustration">
                                <span class="gallery-hover-4col hidden-phone hidden-tablet">
                                    <span class="gallery-icons">
                                        <a href="<?php the_post_thumbnail_url() ?>" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto"></a>
                                        <a href="<?php the_permalink() ?>" class="item-details-link"></a>
                                    </span>
                                </span>
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail() ?>
                                </a>
                                <span class="project-details">
                                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                    <?php the_excerpt() ?>
                                </span>
                            </li>
                    <?php } ?>
                <?php } ?>
                <?php wp_reset_postdata() ?>
                    
                    


                    
                </ul>
                </div>
            </div>
 
    </div><!-- End Gallery Row -->
    
    
    
<?php get_footer() ?>   