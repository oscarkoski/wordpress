<?php get_header() ?>
     
    <!-- Blog Content
    ================================================== --> 
    <div class="row"><!--Container row-->
        <?php the_post() ?>
        <!-- Blog Full Post
        ================================================== --> 
        <div class="span8 blog">

            <!-- Blog Post 1 -->
            <article>
                <h3 class="title-bg"><?php the_title() ?></h3>
                <div class="post-content">
                    <?php the_post_thumbnail() ?>

                    <div class="post-body">
                        <?php the_content() ?>
                    </div>

                    <div class="post-summary-footer">
                        <ul class="post-data">
                            <li><i class="icon-calendar"></i><?php the_date() ?></li>
                            <li><i class="icon-user"></i> <?php the_author() ?></li>
                            <li><i class="icon-comment"></i> <?php comments_number() ?> Comentarios</li>
                            <li><i class="icon-tags"></i> <?php the_category() ?></li>
                        </ul>
                    </div>
                </div>
            </article>

            

        <!-- Post Comments
        ================================================== --> 
            <section class="comments">
                <h4 class="title-bg"><a name="comments"></a><?= get_comments_number(get_the_ID()) ?> Comentarios</h4>
               <ul>
                   <?php 
                   $args= array("status"=>"approve","post_id"=> get_the_ID());
                   $comments_query = new WP_Comment_Query;
                   $comments = $comments_query->query($args);
                   ?>
                   <?php if($comments){ ?>
                    <?php foreach($comments as $comment){ ?>
                    <li>
                        <img src="<?= get_avatar_url($comment->user_id) ?>" alt="Image" />
                         <span class="comment-name"><?=$comment->comment_author?></span>
                         <span class="comment-date"><?=$comment->comment_date?> <a href="#">Reply</a></span>
                         <div class="comment-content"><?=$comment->comment_content?></div>
                     </li>
                    <?php } ?>
                   <?php } ?>
                    
                    
               </ul>
            
                <!-- Comment Form -->
                <div class="comment-form-container">
                    <?php comment_form() ?>
                </div>
        </section><!-- Close comments section-->

        </div><!--Close container row-->

        <!-- Blog Sidebar
        ================================================== --> 
        <?php get_sidebar() ?>

    </div>
    
        
<?php get_footer() ?>    