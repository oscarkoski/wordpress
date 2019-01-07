<?php get_header() ?>
     
    <!-- Page Content
    ================================================== --> 
    <div class="row">
        
        <div id="bread">
            <?php dimox_breadcrumbs() ?>
        </div>
        
        <?php the_post() ?>
        <!-- Gallery Items
        ================================================== --> 
        <div class="span8 gallery-single">

            <article>
               <h3 class="title-bg"><?php the_title() ?></h3>
            <div class="post-content">
                
                <?php if(has_post_thumbnail()){ ?>
                    <?php the_post_thumbnail('large') ?>
                <?php } ?>
                
                

                <div class="post-body">
                    <?php the_content(); ?>

                    <?php $custom_fields = get_post_custom(get_the_ID()) ?>
                    <div class="row">
                        <div class="span3">
                            <h6 class="title-bg">
                                <i class="icon-users"></i>Cliente: 
                                <small><?= $custom_fields['trabajo_cliente'][0] ?></small>
                            </h6>
                        </div>

                        <div class="span2">
                            <h6 class="title-bg">
                                <i class="icon-share-alts"></i>Ver: 
                                <small>
                                    <a href="<?= $custom_fields['trabajo_url'][0] ?>" target="_blank">Ver proyecto</a>
                                </small>
                            </h6>
                        </div>

                        <div class="span2">
                            <h6 class="title-bg">
                                <i class="icon-calendar"></i>Fecha: 
                                <small><?= $custom_fields['trabajo_year'][0] ?></small>
                            </h6>
                        </div>
                    </div>

                    <div class="row">
                        <ul class="post-data-3">
                            <li>
                                <i class="icon-calendar"></i> <?php the_date() ?>
                            </li>
                            <li>
                                <i class="icon-user"></i> <?php the_author() ?>
                            </li>
                            <li>
                                <i class="icon-comment"></i> 
                                <a href=""><?php comments_number() ?> Comments</a>
                            </li>
                            <li>
                                <?php $terms=wp_get_post_terms(get_the_ID(),"genre", array("fields" => "names")) ?>
                                <i class="icon-tags"></i> 
                                <?php foreach($terms as $term){?>
                                <a href="<?= get_term_link($term,"genre") ?>"><?=$term?></a>
                                <?php } ?>
                                
                            </li>

                        </ul>
                    </div>
                    
                </div>
           
        </article> 
</div>
            <?php get_sidebar() ?>
        <!-- End gallery-single-->
</div>
        
<?php get_footer() ?>   