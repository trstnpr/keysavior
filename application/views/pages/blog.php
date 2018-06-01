<div class="blogs-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/headbg.png'); ?>">

    	<div class="overlay">

	    	<div class="container">

                <div class="head-content">

                    <h1 class="page-title">Blog</h1>

                    <h4 class="subtitle">News, Stories & Tips</h4>

                </div>

	    	</div>

	    </div>

    </section>

    <section class="section-blogs-wrap">

    	<div class="container">

			<div class="row">

    			<div class="col-md-8 col-md-offset-2">

    				<div class="section-content">

                        <div class="blogs-wrap">

            				<?php
            				if($blogs->result() != 0) {
            					foreach($blogs->result() as $blog) {
                                    $blog_thumb = ($blog->featured_image != NULL) ? base_url($blog->featured_image) : base_url('build/images/temp.jpg');
            				?>
            					
            					<div class="blog-item">

            						<div class="blog-head">

                                        <small class="blog-info">Posted on <?php echo date_proper($blog->created_at); ?> by <?php echo $blog->author; ?></small>

            							<h4 class="blog-title">
            								<a href="<?php echo base_url($blog->slug); ?>">
            									<?php echo $blog->title; ?>
            								</a>		
            							</h4>

            							
            						</div>
                                    <?php if($blog->featured_image != NULL) { ?>
                                    <div class="blog-thumb">
                                        <img class="img-responsive" src="<?php echo $blog_thumb; ?>" alt="<?php echo $blog->title; ?>" title="<?php echo $blog->title; ?>" />   
                                    </div>
                                    <?php } ?>

            						<p class="blog-excerpt">
                                        <?php
                                            if($blog->excerpt != NULL) {
                                                echo $blog->excerpt;
                                            } else {
                                                echo truncate($blog->content, 300);
                                            }
                                        ?>    
                                    </p>

            						<div class="blog-category">
            							
          								<?php
        				            		if(unserialize($blog->category) != NULL) {
        				            			$data = array();
        					            		foreach(unserialize($blog->category) as $category) {
        					            			$data[] = '<span class="label label-warning">'.$category.'</span> ';
        					            		}
        					            		$category = trim(join(' ', $data), ' ');
        					            		echo $category;
        					            	}
        				            	?>

            						</div>

            					</div>

            				<?php
            					}

                                if (strlen($pagination)) {
                                    echo $pagination;
                                }
            				} else { ?>

                            <div class="well">
                                <h2>No Blog Posts Available</h2>
                            </div>

                            <?php } ?>

                        </div>

                        <div class="promo-wrap">
                            <div class="promo-item">
                                <div class="promo-details">
                                    <h3>
                                        If You Need A 24 Hour Locksmith In <span class="txt-inblock"><?php echo $promo_ad->name.', '.strtoupper($promo_ad->state); ?></span>
                                        <br/>
                                        <a href="tel:<?php echo $promo_ad->phone; ?>" class="txt-inblock">CALL <?php echo $promo_ad->phone; ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>

    				</div>

    			</div>

    		</div>

    	</div>

   	</section>

</div>