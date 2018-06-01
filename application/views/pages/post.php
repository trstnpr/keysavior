<div class="post-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/headbg.png'); ?>">

    	<div class="overlay">
	    	<div class="container">

	    		<div class="head-content">

		    		<h5 class="page-meta">Posted on <?php echo date_proper($page->created_at); ?> by <?php echo $page->author; ?></h5>
		    		<h1 class="page-title"><?php echo $page->title; ?></h1>
		    		<?php
	            		if(unserialize($page->category) != NULL) {
	            			$data = array();
		            		foreach(unserialize($page->category) as $category) {
		            			$data[] = '<span class="label category">'.$category.'</span> ';
		            		}
		            		$category = trim(join(' ', $data), ' ');
		            		echo $category;
		            	}
	            	?>

	            </div>

	    	</div>
	    </div>

    </section>

    <section class="section-page">

    	<div class="container">
    		
    		<div class="row">

    			<div class="col-md-8 col-md-offset-2">

    				<div class="section-content">

	    				<div class="content-wrap">

	    					<?php
	    						if($page->featured_image != NULL) {
	    							$page_thumb = ($page->featured_image != NULL) ? base_url($page->featured_image) : base_url('build/images/temp.jpg');
	    					?>
	    					<div class="page-thumb">

	    						<img class="img-responsive" src="<?php echo $page_thumb ; ?>" alt="<?php echo $page->title; ?>" title="<?php echo $page->title; ?>" />

	    					</div>
	    					<?php } ?>
		    				
	    					<?php echo $page->content; ?>

		    			</div>

		    			<div class="promo-wrap">
			    			<div class="promo-item">
				    			<div class="promo-details">
									<h3>
										If you're seeking a Reliable Locksmith Company In <span class="txt-inblock"><?php echo $promo_ad->name.', '.strtoupper($promo_ad->state); ?></span>
										<br/>
										<a href="tel:<?php echo $promo_ad->phone; ?>" class="txt-inblock">CALL <?php echo $promo_ad->phone; ?></a>
									</h3>
								</div>

				    		</div>
			    		</div>

			    		<div class="suggested-blogs">
		    				<?php if($blogs != 0) { ?>
	                        <div class="blogs-wrap">
	                            <div class="header">
	                                <h4>More Articles</h4>
	                            </div>
	                            <div class="content">
	                            <?php
	                                foreach($blogs as $blog) {
	                                    $blog_thumb = ($blog->featured_image != NULL) ? base_url($blog->featured_image) : base_url('build/images/temp.jpg');
	                                    $excerpt = ($blog->excerpt != NULL) ? $blog->excerpt : truncate($blog->content, 200);
	                            ?>

	                                <div class="media blog-item">
	                                	<?php if($blog->featured_image != NULL) { ?>
	                                    <div class="media-left">
	                                        <a href="<?php echo base_url($blog->slug); ?>">
	                                            <img class="media-object blog-thumb" src="<?php echo $blog_thumb; ?>" alt="<?php echo $blog->title; ?>" title="<?php echo $blog->title; ?>">
	                                        </a>
	                                    </div>
	                                    <?php } ?>
	                                    <div class="media-body">
	                                        <h4 class="media-heading blog-title"><?php echo $blog->title; ?></h4>
	                                        <small>Posted on <?php echo date_proper($blog->created_at); ?></small>
	                                        <p><?php echo $excerpt; ?></p>
	                                        <a class="btn btn-xs btn-warning" href="<?php echo base_url($blog->slug); ?>">Read more</a>
	                                    </div>
	                                </div>

	                            <?php } ?>
	                            </div>
	                        </div>
	                        <?php } ?>
	                    </div>

	    			</div>

    			</div>

    		</div>

    	</div>

    </section>

</div>