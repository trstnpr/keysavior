<?php
	$state = $state_arr[0];
?>

<div class="state-content">

    <section class="section-header data-img" data-bg="<?php echo base_url('build/images//headbg.png'); ?>">

    	<div class="overlay">

	    	<div class="container">

	    		<div class="head-content">

		    		<h1 class="page-title"><?php echo $state->state; ?></h1>

		    		<h4 class="subtitle">Areas In California</h4>

		    	</div>

	    	</div>

	    </div>

    </section>

    <section class="section-state-wrap">

    	<div class="container">

    		<div class="row">

    			<div class="col-md-8 col-md-offset-2">

    				<div class="section-content">

			    		
			    		<div class="cities-wrap">

	    					<div class="city-list">

	    					<?php if(!empty($cities)) { ?>

		    					<ul class="row">

		    						<?php

		    							foreach($cities as $city) {
		    								$state_abbrev = $city->state;
		    								$city_name = strtolower(str_replace(' ', '-', $city->name));
			    							$city_url =  base_url('city/'.$city_name.'-'.$state_abbrev);
		    						?>

		    						<li class="col-md-4 col-sm-6">
		    							<a href="<?php echo $city_url; ?>"><?php echo $city->name; ?></a>
		    						</li>

		    						<?php } ?>


		    					</ul>

		    				<?php } ?>

		    				</div>
				    		
			    		</div>

			    		<?php include('parts/weather.php'); ?>

			    		<div class="promo-wrap">
			    			<div class="promo-item">

				    			<div class="promo-details">
									<h3>
										Need 24 Hour Locksmith Experts In <span class="txt-inblock"><?php echo $promo_ad->name.', '.strtoupper($promo_ad->state); ?></span>?
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