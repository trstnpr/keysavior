		
		<div class="modal fade" id="major_cities" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Main Areas</h4>
					</div>
					<div class="modal-body">

						<?php if ($popular_city['result'] == 'success') { ?>
						
						<div class="popcity-wrap">

						    <ul class="row">

						    <?php foreach ($popular_city['data'] as $popcity) { ?>

						    	<li class="col-md-4 col-sm-6 col-xs-6"><a href="<?php echo base_url('city/'.$popcity->slug); ?>"><?php echo $popcity->name; ?></a></li>

						    <?php } ?>
						    
						    </ul>

						</div>

						<?php } else { echo '<p>'.$popular_city['message'].'</p>'; } ?>

					</div>
				</div>
			</div>
		</div>

		</main>

		<footer class="footer">

			<div class="footer-top">

				<div class="container">

					<div class="footer-social">

						<ul class="social-btn social-wrap">

							<li>
								<a href="<?php echo the_config('facebook_link'); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="<?php echo the_config('twitter_link'); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="<?php echo the_config('googleplus_link'); ?>" target="_blank" title="Google Plus"><i class="fa fa-google-plus"></i></a>
							</li>

						</ul>

					</div>
						
					<div class="footer-nav">

						<ul class="nav-menu">

							<li><a href="<?php echo base_url(); ?>">Home</a></li>

							<li><a href="<?php echo base_url('/states'); ?>">States</a></li>

							<li><a href="#major_cities" data-toggle="modal">Main Areas</a></li>

							<li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>

							<li><a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></li>

							<li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>

							<li><a href="<?php echo base_url('submit-your-business'); ?>">Submit Business</a></li>

						</ul>

					</div>

				</div>

			</div>

			<div class="footer-bottom">

				<div class="container">

					<p>© <?php echo date('Y'); ?> Copyright <?php echo the_config('site_name'); ?>. <br class="visible-xs"/>All Rights Reserved.</p>

				</div>

			</div>

		</footer>

        <script type="text/javascript" src="<?php echo base_url('build/js/master-scripts.js?v=1'); ?>"></script>
        <script src="http://maps.google.com/maps/api/js?key=<?php echo the_config('gmap_apikey'); ?>" 
            type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('build/js/scripts.js?v=1'); ?>"></script>

        <script type="text/javascript">



        	// START Google Map Loads
        	<?php
                if(!empty($search_data)) {
                $cities = array();
					foreach($search_data as $result) {
						$cities[] = '"'.$result->name.', '.strtoupper($result->state).'"';
					}
					$city = '['.join(',', $cities).']';
					
					?>
					
			var map;
			var elevator;
			var myOptions = {
				zoom: 3,
				center: new google.maps.LatLng(39, -95),
				mapTypeId: 'terrain'
			};
			map = new google.maps.Map($('#search-map-overlay')[0], myOptions);

			var addresses = <?php echo $city; ?>;

			for (var x = 0; x < addresses.length; x++) {
				$.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
					var p = data.results[0].geometry.location
					var latlng = new google.maps.LatLng(p.lat, p.lng);
					new google.maps.Marker({
						position: latlng,
						map: map
					});
				});
			}
        	<?php } ?>
        	

        </script>

    </body>

</html>