<div class="app-content">

    <section class="section-banner parallax" data-parallax="scroll" data-image-src="<?php echo base_url('build/images/banner-bg-5.jpg'); ?>">
      
		<div class="overlay">

			<div class="container">

				<div class="row">

					<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">

						<div class="homesearch-wrap">

							<h1 class="form-title"><?php echo the_config('tag_line'); ?></h1>

							<div class="search-panel">

								<?php include('parts/form-search.php'); ?>

							</div>

						</div>

					</div>

				</div>  

			</div>

		</div>

	</section>


    <section class="section-featsvc">

		<div class="container">
	    
		    <div class="section-title">
		      <h2>Featured Services</h2>
		      <span class="line center-block"></span>
		    </div>

			<div class="featsvc-wrap">

				<?php if($bbb_count >= 4) { ?>
				<div class="row">

					<?php
				    	foreach($bbb as $result) {

				    		$phone = ($result->Phones != NULL) ? reset($result->Phones) : NULL;
							$map_endpoint = 'https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=450x450&scale=2&maptype=roadmap&sensor=false&language=en&markers=color:red|';
							$address = preg_replace(strip_address(), '', $result->Address);
							$static_params = $address.' '.$result->City.' '.$result->StateProvince.' '.$result->PostalCode;
				    ?>
				
					<div class="col-md-3 col-sm-6">
						<div class="svc-item"> 
							<div class="svc-wrap reveal">
								<div class="thumb">
									<div class="locate">
										<a href="https://maps.google.com/?q=<?php echo $static_params; ?>" title="locate" target="_blank">
											<i class="fa fa-location-arrow" aria-hidden="true"></i>
										</a>
									</div>
									<img src="<?php echo $map_endpoint.$static_params.'&key='.static_map_key(); ?>" class="img-responsive" alt="<?php echo $result->OrganizationName; ?>" title="<?php echo $result->OrganizationName; ?>">
								</div>
								<div class="post-content">
									<div class="feat-badge">Featured</div>
									<h1 class="title"><?php echo $result->OrganizationName; ?></h1>
									<h2 class="category"><?php echo $result->PrimaryCategory; ?></h2>
									<ul class="fa-ul description">
										<li><i class="fa fa-li fa-map-marker"></i> <?php echo $result->City.', '.$result->StateProvince; ?></li>
										<li><i class="fa fa-li fa-phone"></i> <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<?php } ?>
					
				</div>
				<?php } ?>

			</div>

		</div>

	</section>

	<!-- <section class="section-featsvc">

		<div class="container">
	    
		    <div class="section-title">
		      <h2>Featured Services</h2>
		      <span class="line center-block"></span>
		    </div>

			<div class="featsvc-wrap">
				<?php //if($bbb_count >= 4) { ?>
				<div class="row">

					<?php
				   //  	foreach($bbb as $result) {

				   //  		$phone = ($result->Phones != NULL) ? reset($result->Phones) : NULL;
							// $map_endpoint = 'https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=450x450&scale=2&maptype=roadmap&sensor=false&language=en&markers=color:red|';
							// $address = preg_replace(strip_address(), '', $result->Address);
							// $static_params = $address.' '.$result->City.' '.$result->StateProvince.' '.$result->PostalCode;
				    ?>
				
					<div class="col-md-3 col-sm-6">

						<div class="yelp-svc-item">
							<div class="svc-thumbnail hidden-xs">
								<a href="https://maps.google.com/?q=<?php //echo $static_params; ?>" target="_blank" rel="nofollow">
									<img src="<?php //echo $map_endpoint.$static_params.'&key='.static_map_key(); ?>" alt="<?php //echo $result->OrganizationName; ?>" title="<?php //echo $result->OrganizationName; ?>" />
								</a>
							</div>
							<div class="svc-info">
								<div class="svc-details">
									<h3 class="svc-title"><?php //echo $result->OrganizationName; ?></h3>
									<ul class="list-default">
										<li><?php //echo $result->PrimaryCategory; ?></li>
										<li><?php //echo $result->City.', '.$result->StateProvince; ?></li>
										<li><?php //echo $phone; ?></li>
									</ul>

								</div>
							</div>
						</div>

					</div>

					<?php //} ?>

			    </div>
			    <?php //}
			    	//if($business_count >= 1) {
			    ?>
				<div class="row">
			    <?php //foreach($local_business as $bus) { ?>
			    	<div class="col-md-3 col-sm-6">
						<div class="svc-item">
							<div class="svc-thumbnail hidden-xs">
								
								<img src="<?php //echo base_url($bus->photo); ?>" alt="<?php //echo $bus->name; ?>" title="<?php //echo $bus->name; ?>" />
								
							</div>
							<div class="svc-info">
								<div class="svc-details">
									<h3 class="svc-title"><?php //echo $bus->name; ?></h3>
									<ul class="fa-ul">
										<li><i class="fa fa-li fa-puzzle-piece"></i> Locks & Locksmiths</li>
										<li><i class="fa fa-li fa-map-marker"></i> <?php //echo $bus->city; ?>, <?php //echo $bus->zip; ?></li>
										<li><i class="fa fa-li fa-puzzle-piece"></i> <a href="tel:<?php //echo $bus->contact; ?>"><?php //echo $bus->contact; ?></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php //} ?>

				</div>
				<?php //} ?>

			</div>

		</div>

	</section> -->

	<?php if($blogs >= 2) { ?>

	<section class="section-blog">
		<div class="container">

			<div class="section-title">
				<h2>Blog</h2>
				<span class="line center-block"></span>
		    </div>

		    <div class="blogs-wrap">
		        <div class="row-page row">
		            <div class="col-page col-sm-8 col-md-6">
		            	<?php $lblog_thumb = ($lblog->featured_image != NULL) ? base_url($lblog->featured_image) : base_url('build/images/temp.jpg'); ?>
		                <a href="<?php echo base_url($lblog->slug); ?>" class="main blog-item">
		                    <div class="main-thumb">
		                        <img class="blog-img" src="<?php echo $lblog_thumb; ?>" title="<?php echo $lblog->title; ?>" />
		                    </div>
		                    <div class="main-content">
		                    	<p class="pubdate"><?php echo date_proper($lblog->created_at); ?></p>
		                        <h3 class="title"><?php echo truncate($lblog->title, 50); ?></h3>
		                        <p class="excerpt"><?php echo truncate($lblog->excerpt, 200); ?></p>
		                        <?php
				            		if(unserialize($lblog->category) != NULL) {
				            			$data = array();
					            		foreach(unserialize($lblog->category) as $category) {
					            			$data[] = '<span class="label category">'.$category.'</span> ';
					            		}
					            		$category = trim(join(' ', $data), ' ');
					            		echo $category;
					            	}
				            	?>
		                    </div>
		                    <div class="action">
		                        <span>Read</span>
		                    </div>
		                </a>
		            </div>

		            <?php
		            	foreach($blogs as $blog) {
		            		$blog_thumb = ($blog->featured_image != NULL) ? base_url($blog->featured_image) : base_url('build/images/temp.jpg');
		            ?>
		            <div class="col-page col-sm-4 col-md-3">

		                <a href="<?php echo base_url($blog->slug); ?>" class="blog-item">
		                    <div class="thumb">
		                        <img class="blog-img" src="<?php echo $blog_thumb; ?>" alt="<?php echo $blog->title; ?>" title="<?php echo $blog->title; ?>" />
		                    </div>
		                    <div class="content">
		                    	<p class="pubdate"><?php echo date_proper($blog->created_at); ?></p>
		                        <h3 class="title"><?php echo truncate($blog->title, 30); ?></h3>
		                        <p class="excerpt"><?php echo truncate($blog->title, 150); ?></p>
		                        <?php
				            		if(unserialize($blog->category) != NULL) {
				            			$data = array();
					            		foreach(unserialize($blog->category) as $category) {
					            			$data[] = '<span class="label category">'.$category.'</span> ';
					            		}
					            		$category = trim(join(' ', $data), ' ');
					            		echo $category;
					            	}
				            	?>
		                    </div>
		                    <div class="action">
		                        <span>Read</span>
		                    </div>
		                </a>
		            </div>
		            <?php } ?>
		        </div>
		    </div>
		</div>
	</section>

	<?php } ?>

	<section class="section-majorcity parallax" id="section_majorcity" data-parallax="scroll" data-image-src="<?php echo base_url('build/images/headbg.png'); ?>">

		<div class="overlay">

			<div class="container">

				<div class="section-title">
			    	<h2>Main Areas</h2>
			    </div>

			    <?php if ($popular_city['result'] == 'success') { ?>
						
				<div class="popcity-wrap">

				    <ul class="row">

				    <?php foreach ($popular_city['data'] as $popcity) { ?>

				    	<li class="col-md-2 col-sm-4 col-xs-6"><a href="<?php echo base_url('city/'.$popcity->slug); ?>"><?php echo $popcity->name; ?></a></li>

				    <?php } ?>
				    
				    </ul>

				</div>

				<?php } else { echo '<p>'.$popular_city['message'].'</p>'; } ?>

			</div>

		</div>

	</section>

	
</div>