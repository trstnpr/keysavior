<div class="searchresult-content">

    <section class="section-header data-img" data-bg="<?php echo base_url('build/images/headbg.png'); ?>">

    	<div class="overlay">

	    	<div class="container">

                <div class="head-content">

                    <h1 class="page-title">Search</h1>

                    <h4 class="subtitle">Search Results for "<?php echo ucwords($location); ?>"</h4>

                </div>

	    	</div>

	    </div>

    </section>

    <section class="section-searchresults">

    	<div class="container">
    		<div class="row">
	   			<div class="col-md-10 col-md-offset-1">

		    		<div class="row">

		    			<div class="col-md-8">

		    				<div class="section-content">

		    					<div class="search-inner">
		    						<?php include('parts/form-search-city.php'); ?>
		    					</div>

					    		<?php if($search_data != NULL) { ?>

						    		<div class="result-wrap">

						    		<?php foreach($search_data as $result) { ?>

						    			<div class="result-item">

							    			<div class="result-details">
												<h3 class="title"><?php echo $result->name.', '.strtoupper($result->state); ?></strong></h3>
												<small class="url"><?php echo base_url('city/'.$result->slug); ?></small>
												<div class="zip-content">
													<p>
														Areas : 
														<?php
							    							$zipcode = preg_split('/,([\s])+/', $result->zip_code);
							    							$zip_code = array();
							    							$x = 0; // Init limit
							    							foreach($zipcode as $zips) {
							    								$x++;
							    								$zip_code[] = trim('<a href="'.base_url('zip/'.$zips).'" >'.$zips.'</a>, ', ', ');
							    								if($x > 30) { break; }
							    							}
							    							$zip = trim(implode(' ',$zip_code), '/([\s])+/');
							    							echo $zip;
							    						?>
													</p>
												</div>

												<a href="tel:<?php echo $result->phone; ?>" class="btn btn-yellow cta-city"><i class="fa fa-phone"></i> CALL <?php echo $result->phone; ?></a>
												<a href="<?php echo base_url('city/'.$result->slug); ?>" class="btn btn-info  cta-city"><i class="fa fa-sign-in"></i> See All Businesses</a>

											</div>

							    		</div>

							    	<?php } ?>

						    		</div>

					    		<?php } else { ?>

					    			<h3 class="txt-center">No Results Found.</h3>

					    		<?php } ?>

		    				</div>

		    			</div>

		    			<div class="col-md-4">

		    				<div class="aside">   				

			    				<?php if($search_data != NULL) { ?>
			    				<div class="promo-wrap">
			    					<div class="border">
				    					<h4>
				    						Do you need an Emergency Locksmith Service In <span class="txt-inblock"><?php echo $promo_ad->name.', '.strtoupper($promo_ad->state); ?></span>?
				    						<br/>
											<a href="tel:<?php echo $promo_ad->phone; ?>" class="txt-inblock">CALL <?php echo $promo_ad->phone; ?></a>
										</h4>
									</div>
			    				</div>
			    				<?php } ?>

			    				<?php if($recent_blogs != 0) { ?>
		                        <div class="blogs-wrap">
		                            <div class="header">
		                                <h4>Recent Posts</h4>
		                            </div>
		                            <div class="content">
		                            <?php
		                                foreach($recent_blogs as $blog) {
		                                    $blog_thumb = ($blog->featured_image != NULL) ? base_url($blog->featured_image) : base_url('build/images/temp.jpg');
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
		                                        <p><?php echo truncate($blog->excerpt, 50); ?></p>
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
    	</div>

    </section>

</div>