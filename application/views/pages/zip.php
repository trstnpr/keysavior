<?php
	$key = static_map_key();
	$rgx_pattern = strip_address();
?>
<section class="zip-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/headbg.png'); ?>">

    	<div class="overlay">

	    	<div class="container">

                <div class="head-content">

                    <h1 class="page-title">
						Need 24 Hour Locksmith Experts In <span class="txt-inblock"><?php echo $city_data->name.', '.strtoupper($city_data->state).' '.$zip; ?></span>?
						<br/>
						<a href="tel:<?php echo $city_data->phone; ?>" class="txt-inblock">CALL <?php echo $city_data->phone; ?></a>
					</h1>

                </div>

	    	</div>

	    </div>

    </section>

    <section class="section-zip-wrap">

   		<div class="container">

   			<div class="row">

   				<div class="col-md-10 col-md-offset-1">

		    		<div class="row">

		    			<div class="col-md-8">

		    				<div class="section-content">

		    					<div class="search-inner">
		    						<?php include('parts/form-search-city.php'); ?>
		    					</div>

					    		<?php if($business != 0) { ?>

					    		<div class="panel-group svc-item-wrap" id="accordion" role="tablist" aria-multiselectable="true">

					    			<?php
								    	foreach($business as $biz) {
								    		$phone = ($biz->Phones != NULL) ? reset($biz->Phones) : NULL;
											$map_endpoint = 'https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=450x200&scale=2&maptype=roadmap&sensor=false&language=en&markers=color:red|';
											$address = preg_replace($rgx_pattern, '', $biz->Address);
											$static_params = $address.' '.$biz->City.' '.$biz->StateProvince.' '.$biz->PostalCode;
					    			?>

								    <div class="panel item">
								        <div class="panel-heading" role="tab" id="headingOne">
								            <h4 class="panel-title">
								                <a role="button" class="trigger-collpase" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $biz->BusinessId; ?>" aria-expanded="true" aria-controls="collapseOne">
								                <span class="fa fa-check-circle hidden-xs"></span>
								                <?php echo $biz->OrganizationName; ?> <small class="txt-inblock"><?php echo $biz->City.', '.$biz->StateProvince; ?></small>
								                </a>
								            </h4>
								        </div>
								        <div id="<?php echo $biz->BusinessId; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								            <div class="row">
								                <div class="col-md-6 col-md-push-6">
								                	<div class="map">
								                		<a href="https://maps.google.com/?q=<?php echo $static_params; ?>" target="_blank" rel="nofollow">
								                			<img class="img-responsive" src="<?php echo $map_endpoint.$static_params.'&key='.$key; ?>" alt="<?php echo $biz->OrganizationName; ?>" title="<?php echo $biz->OrganizationName; ?>" />
								                		</a>
								                	</div>
								                </div>
								                <div class="col-md-6 col-md-pull-6">
								                	<div class="details">
									                	<ul class="fa-ul">
									                		<li><i class="fa fa-li fa-map-marker"></i> <?php echo $biz->Address; ?></li>
									                		<li><i class="fa fa-li fa-location-arrow"></i> <?php echo $biz->PostalCode.' '.$biz->City.', '.$biz->StateProvince; ?></li>
									                		<li><i class="fa fa-li fa-puzzle-piece"></i> <?php echo $biz->PrimaryCategory; ?></li>
									                		<li><i class="fa fa-li fa-phone"></i> <?php echo $phone; ?></li>
									                	</ul>
									                </div>
								                </div>

								            </div>
								        </div>
								    </div>

								    <?php } ?>

								</div>

					    		<?php } else { ?>

					    		<div class="well">
					    			
					    			<h2 class="txt-center">No Business Available</h2>

					    		</div>

					    		<?php } ?>

					    		<div class="zip-promo-wrap">

						    		<div class="promo-item">

						    			<div class="promo-details">
											<h3>
												If you're seeking a Reliable Locksmith Company In <span class="txt-inblock"><?php echo ucwords($location); ?></strong>
												<br/>
												<a href="tel:<?php echo $city_data->phone; ?>">CALL <?php echo $city_data->phone; ?></a>
											</h3>
										</div>

						    		</div>

					    		</div>

					    	</div>

		    			</div>

		    			<div class="col-md-4">
		    				
		    				<div class="aside">
		    					
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

			    				<div class="weather-wrap">
			    					<div class="weather-widget" data-weather="<?php echo ucwords($location); ?>" ></div>
			    				</div>

			    				<div class="promo-wrap">
			    					<div class="border">
				    					<h4>
				    						If You Need A 24 Hour Locksmith In <span class="txt-inblock"><?php echo ucwords($location); ?></span>?
				    						<br/>
											<a href="tel:<?php echo $city_data->phone; ?>" class="txt-inblock">CALL <?php echo $city_data->phone; ?></a>
										</h4>
									</div>
			    				</div>

		    				</div>

		    			</div>

		    		</div>

		    	</div>

		    </div>

    	</div>

    </section>

</section>