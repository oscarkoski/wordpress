<?php get_header() ?>
     
    <!-- Blog Content
    ================================================== --> 
    <div class="row">

        <!-- Blog Posts
        ================================================== --> 
        <div class="span8 blog">

            <?php
            if(have_posts()){
             while(have_posts()){
                 the_post(); ?>
                <article class="clearfix">
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail() ?>
                    </a>
                    <h4 class="title-bg">
                        <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                    </h4>
                        <?php the_excerpt() ?>
                        <a href="<?php the_permalink() ?>" class="btn btn-mini btn-inverse" >
                            Read more
                        </a>
                        <div class="post-summary-footer">
                            <ul class="post-data-3">
                                <li><i class="icon-calendar"></i> <?php the_date() ?></li>
                                <li><i class="icon-user"></i> <?php the_author() ?></li>
                                <li><i class="icon-comment"></i> <a href="<?php the_permalink() ?>"><?php comments_number() ?> Comments</a></li>
                                <li><i class="icon-tags"></i><?php the_category() ?></li>
                            </ul>
                        </div>
                </article>
             <?php }   
            }            
            ?>
            
            

            

            <!-- Pagination -->
            <div class="pagination">
                <ul>
                <li class="active"><a href="#">Prev</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>

        <!-- Blog Sidebar
        ================================================== --> 
        <?php get_sidebar() ?>

    </div>
    
        
<?php get_footer() ?>    