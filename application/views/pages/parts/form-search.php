<form class="search-directory" method="GET" action="<?php echo base_url('search'); ?>" data-validate="<?php echo base_url('search/validate?location='); ?>">

	<div class="row">

		<div class="col-md-8">

			<!-- <div class="form-group">

				<input type="text" class="form-control input-lg keyword" name="location" placeholder="Type your City or Zipcode ..." onKeyUp="strip_char()" id="keyword" data-suggest="<?php echo base_url('search/suggest'); ?>" required />

			</div> -->

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon search-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
					<input type="text" class="form-control input-lg keyword" name="location" placeholder="Type your City or Zipcode ..." onKeyUp="strip_char()" id="keyword" data-suggest="<?php echo base_url('search/suggest'); ?>" required />
				</div>
			</div>

		</div>

		<div class="col-md-4">

			<div class="form-group">
				<button class="btn btn-lg btn-block search-btn" type="submit">Search</button>
			</div>

		</div>

	</div>

</form>