<div class="contactus-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/headbg.png'); ?>">

    	<div class="overlay">

	    	<div class="container">

	    		<div class="head-content">

	    			<h1 class="page-title"><?php echo $page->title; ?></h1>
	    			<h4 class="subtitle">Any Concerns & Suggestions?</h4>

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
		    				<div class="content">
								<?php echo $page->content; ?>
							</div>

							<br/>

							<div class="form-wrap">

								<form class="form-horizontal form-contact" method="post" action="<?php echo base_url('contact/send'); ?>">
									<div class="form-group">
										<label class="col-sm-2 control-label">Name *</label>
										<div class="col-sm-10">
											<input type="text" class="form-control name" name="name" placeholder="Your Name ..." required />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Email *</label>
										<div class="col-sm-10">
											<input type="email" class="form-control email" name="email" placeholder="Your Email ..." required />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Subject *</label>
										<div class="col-sm-10">
											<input type="text" class="form-control subject" name="subject" placeholder="Your Subject ..." required />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Message *</label>
										<div class="col-sm-10">
											<textarea type="text" class="form-control message" name="message" rows="5" placeholder="Your Message ..." required ></textarea>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-2">
											<div class="g-recaptcha" data-sitekey="<?php echo $gr_data['site_key']; ?>"></div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-yellow btn-send">Send <i class="fa fa-paper-plane"></i></button>
										</div>
									</div>
								</form>

							</div>

		    			</div>

					</div>

				</div>

			</div>

		</div>

    </section>

</div>