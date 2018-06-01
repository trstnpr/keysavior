<div class="states-content">

    <section class="section-header data-img" data-bg="<?php echo base_url('build/images//headbg.png'); ?>">

    	<div class="overlay">

	    	<div class="container">

	    		<div class="head-content">

		    		<h1 class="page-title">States</h1>

		    		<h4 class="subtitle">Local US Areas</h4>

		    	</div>

	    	</div>

	    </div>

    </section>

    <section class="section-states">

    	<div class="container">
    		
    		<div class="row">

    			<div class="col-md-8 col-md-offset-2">

    				<div class="section-content">    				

	    				<div class="states-wrap">
		    				<ul class="row">

		    					<?php

			    					foreach($states as $state) {

			    				?>

		    					<li class="col-md-4 col-sm-6">
		    						<a href="<?php echo base_url('state/'.strtolower($state->abbrev)); ?>">
		    							<?php echo $state->state; ?>
		    						</a>
		    					</li>

		    					<?php } ?>

		    				</ul>
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