<form class="search-directory" method="GET" action="<?php echo base_url('search'); ?>" data-validate="<?php echo base_url('search/validate?location='); ?>">
	<label>Search For Locksmiths</label>
	<div class="row">
	
		<div class="col-md-9">

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon search-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
					<input type="text" class="form-control keyword" name="location" placeholder="Type your City or Zipcode ..." onKeyUp="strip_char()" id="keyword" data-suggest="<?php echo base_url('search/suggest'); ?>" required />
				</div>
			</div>

		</div>

		<div class="col-md-3">

			<div class="form-group">
				<button class="btn btn-block search-btn" type="submit">Search</button>
			</div>

		</div>

	</div>

</form>