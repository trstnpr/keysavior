<div class="page-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/headbg.png'); ?>">

    	<div class="overlay">

	    	<div class="container">

	    		<div class="head-content">

	    			<h1 class="page-title"><?php echo $page->title; ?></h1>

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
		    				
	    					<?php echo $page->content; ?>

		    			</div>

	    			</div>

    			</div>


    			<!-- <div class="col-md-4">

    				<div class="aside">

	    				<?php if($blogs != 0) { ?>
	    				<div class="blogs-wrap">
	    					<div class="header">
	    						<h4>Recent Posts</h4>
	    					</div>
	    					<div class="content">
	    					<?php foreach($blogs as $blog) { ?>

	    						<div class="blog-item">
	    							<small><?php echo date_format(date_create($blog->created_at), 'M j, Y'); ?></small>
	    							<p class="blog-title"><?php echo $blog->title; ?><p>
	    							<a class="btn btn-xs btn-warning" href="<?php echo base_url($blog->slug); ?>">Read more</a>
	    						</div>

	    					<?php } ?>
	    					</div>
	    				</div>
	    				<?php } ?>
	    				
	    				<div class="promo-wrap">
	    					<h4>
	    						<i class="fa fa-thumbs-up hidden-xs"></i> Need Emergency Locksmith Near<br>
	    						<strong><?php echo $promo_ad->name.', '.strtoupper($promo_ad->state); ?></strong>?
	    						<hr>
								<a href="tel:<?php echo $promo_ad->phone; ?>">CALL <?php echo $promo_ad->phone; ?></a>
							</h4>
	    				</div>

	    			</div>

    			</div> -->

    		</div>

    	</div>

    </section>

</div>