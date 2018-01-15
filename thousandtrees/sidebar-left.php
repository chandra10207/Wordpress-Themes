<?php 

/* Sidebar left*/?>
  <div class="blog-sidebar">
                      <!--   <div class="search-form sidebar-content">
                            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
                              <div class="box">
                                  <div class="container-1">
                                    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search ..." />
                                      <button type="submit" id="searchsubmit" />
                                      <span class="icon"><i class="fa fa-search"></i></span>   
                                      </button>
                                    </div>
                              </div>
                            </form>
                          </div> -->


                          <div class="sidebar-recentpost sidebar-content">
                            <h3 class="sidebar-title">Recent Posts</h3>
                            <?php                    
                              $args = array(
                              'post_type' => 'post',
                              'posts_per_page' => 3
                              );
                              $query = new WP_Query( $args );
                                if ( $query->have_posts() ) {
                                   while ( $query->have_posts() ) {
                                          $query->the_post(); ?>  
                            <div class="side-recent-post clearfix">
                              <div class="recent-thumbnail">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium'); ?></a>
                              </div>
                              <div class="recent-thumbnail-post">
                                <a href="<?php the_permalink();?>"><h4 class="sidebar-page-title"><?php the_title();?></h4>
                                Read more</a>
                                
                                </div>
                              </div>
                                 <?php
                                  }
                                  }
                      wp_reset_postdata(); ?>
                              
                            </div>
                            <div class="sidebar-categories sidebar-content">
                            <h3 class="sidebar-title">Categories</h3>
 
                            <?php wp_list_categories( array(
                                  'orderby'    => 'name',
                                  'show_count' => true,
                                  'show_count' => 0,
                                  'title_li'  => false,
                                  'style'     => '',
                                  'exclude'   => '1'

                              ) ); ?>
 
                          </div>
                          <div class="sidebar-tags sidebar-content">
                            <?php
                              $tags = get_tags( array( 'hide_empty' => true ) );
                                  if ($tags) {
                                    echo '<h3 class="sidebar-title">Tags</h3>';
                                    foreach ($tags as $tag) {
                                      if ( 0 < $tag->count ) {
                                        echo '<dt style="display:inline; float:left; padding-right:5px;"><strong>';
                                            if ( has_tag( $tag->slug ) ) {
                                              echo '<><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . ' style="text-decoration:none;">' . $tag->name.'</a>';
                                              } 
                                            else {
                                                  echo $tag->name;
                                              }
                                        echo '</strong></dt><dd style="margin-bottom:20px;">' . $tag->description . '</dd>';
                                        }
                                    }     
                                  }
                              ?>
                          </div>
                       
</div>