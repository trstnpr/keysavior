<div class="localbizreq-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/headbg.png'); ?>">

    	<div class="overlay">

	    	<div class="container">

	    		<div class="head-content">

	    			<h1 class="page-title"><?php echo $page->title; ?></h1>

	    			<h4 class="subtitle">Business Enlisting</h4>

	    		</div>

	    	</div>

	    </div>

    </section>

    <section class="section-localbizreq-page">

    	<div class="container">

    		<div class="row">

    			<div class="col-md-8 col-md-offset-2">

					<div class="section-content">

						<div class="content-wrap">
		    				<div class="content">
								<p>Submit your business to for inclusion in the most comprehensive lists of locksmith companies on LocksmitHub Local Locksmith Directory.</p>
							</div>

							<br/>

							<div class="form-wrap">

								<form class="submit-biz" method="post" action="<?php echo base_url('business/post/process'); ?>" enctype="multipart/form-data">

									<div class="row">

										<div class="col-md-12">
											<div class="form-group">
												<label for="exampleInputFile">Business Photo</label>
												<input type="file" class="biz_photo" name="photo" accept=".jpg, .jpeg, .png" onchange="readURL(this);" required />
												<p class="help-block">Format .jpg .jpeg and .png only.</p>
												<button type="button" class="btn btn-xs btn-warning remove-preview" style="display:none;">Remove</button>
												<img class="img-responsive preview" src="" />
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label>Business Name *</label>
												<input type="text" class="form-control biz_name" name="name" placeholder="Business Name" required/>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>City *</label>
												<input type="text" class="form-control biz_city" name="city" placeholder="City" required/>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>State *</label>
												<input type="text" class="form-control biz_state" name="state" placeholder="State Abbreviation" maxlength="2" required/>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>Zip Code *</label>
												<input type="text" class="form-control biz_zip" name="zip" placeholder="Zip Code" maxlength="5" required/>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Email Address *</label>
												<input type="email" class="form-control biz_email" name="email" placeholder="Email Address" required/>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Contact Number *</label>
												<input type="text" class="form-control biz_contact" name="contact" placeholder="Contact Number" required/>
											</div>
										</div>

									</div>

									<div class="g-recaptcha" data-sitekey="<?php echo $gr_data['site_key']; ?>"></div>

									<br/>

									<button type="submit" class="btn btn-yellow submit-biz-btn">Submit <i class="fa fa-paper-plane"></i></button>

								</form>

							</div>

		    			</div>

					</div>

				</div>
				
			</div>

		</div>

    </section>

</div>