<?php

	class App extends CI_Controller {

		public function __construct()
        {
            parent::__construct();

            $this->load->helper('bbb');
            $this->load->helper('general');
			$this->load->model('State_model');
			$this->load->model('City_model');
			$this->load->model('Business_model');
			$this->load->model('Page_model');
			$this->load->model('Configuration_model');
        }

		public function index($page = 'home') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {

				$data['title'] = the_config('site_title');
				$data['term'] = 'locksmith';
				$data['location'] = '';

				$params = array(
					'PageSize' => 8,
					'StateProvince' => 'CA',
				);

				$bbb = search($params);
				$data['bbb_count'] = $bbb->TotalResults;
				if($data['bbb_count'] != 0) {
					$data['bbb'] = $bbb->SearchResults;
				} else {
					$bbb['bbb'] = 0;
				}

				$business = $this->Business_model->get_verified_business();
				$data['business_count'] = count($business);
				if($business != 0) {
					$data['local_business'] = $business;
				} else {
					$data['local_business'] = 0;
				}


				// Big Blog Thumb
				$latest = $this->Page_model->get_home_blog(1, 0);
				if($latest != 0) {
					$data['lblog'] = $latest[0];
				} else {
					$data['lblog'] = 0;
				}
				
				// Other Blog Thumb 6 items
				$blogs = $this->Page_model->get_home_blog(6, 1);
				if($blogs != 0) {
					$data['blogs'] = $blogs;
				} else {
					$data['blogs'] = 0;
				}

				// META
				$data['meta_title'] = the_config('meta_title');
				// $data['meta_keyword'] = the_config('meta_keyword');
				$data['meta_description'] = the_config('meta_description');

				$popular_cities = $this->City_model->get_popular_city();
				if($popular_cities != 0) {
					$data['popular_city'] = array('result' => 'success', 'message' => 'Has Popular City', 'data' => $popular_cities);
				} else {
					$data['popular_city'] = array('result' => 'error', 'message' => 'No Popular City');
				}
				
				$this->load->view('templates/header', $data);
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');
			}

		}

		public function states($page='states') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {

				$data['title'] = 'Search Locksmiths Expert By '.ucwords($page).' | '.the_config('site_name');

				$data['states'] = $this->State_model->get_states();
				$data['location'] = 'United States';

				$rand_pop_city = $this->City_model->get_random_popular_city();
				$data['promo_ad'] = $rand_pop_city[0];

				$popular_cities = $this->City_model->get_popular_city();
				if($popular_cities != 0) {
					$data['popular_city'] = array('result' => 'success', 'message' => 'Has Popular City', 'data' => $popular_cities);
				} else {
					$data['popular_city'] = array('result' => 'error', 'message' => 'No Popular City');
				}

				// META
				$data['meta_title'] = $data['title'];
				// $data['meta_keyword'] = '24 Hour Emergency Locksmith, Residential Locksmith Service, Commercial Locksmith Service, Automotive Locksmith Service, Emergency Locksmith Service, Industrial Locksmith Service';
				$data['meta_description'] = 'Wherever you are in the US, KeySavior lets you search for the best lock and key expert by state.';

				$this->load->view('templates/header', $data);
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');

			}
			
		}

		public function state($page = 'state') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {

				$data['abbrev'] = $this->uri->segment(2, 0);

				$data['state_arr'] = $this->State_model->get_state_from_abbrev($data['abbrev']);

				if ($data['state_arr'] != 0) {

					$data['cities'] = $this->City_model->get_city_from_state(strtolower($data['abbrev']));

					$data_state = $data['state_arr'][0];

					$rand_int = array_rand(range(1,12), 1);
					$data['banner_img'] = 'build/images/random/'.$rand_int.'.jpg';
					$data['ads_img'] = 'build/images/thumb-ad/'.$rand_int.'.jpg';

					$data['title'] = 'Find A 24 Hour Locksmith Within Your State Of '.$data_state->state.' | '.the_config('site_name');

					$popular_cities = $this->City_model->get_popular_city();
					if($popular_cities != 0) {
						$data['popular_city'] = array('result' => 'success', 'message' => 'Has Popular City', 'data' => $popular_cities);
					} else {
						$data['popular_city'] = array('result' => 'error', 'message' => 'No Popular City');
					}

					$rand_city = $this->City_model->get_rand_city_from_state($data_state->abbrev);
					$data['promo_ad'] = $rand_city[0];

					// META
					$data['meta_title'] = $data['title'];
					// $data['meta_keyword'] = '24 hour emergency locksmith in '.$data_state->state.', residential locksmith service in '.$data_state->state.', commercial locksmith service in '.$data_state->state.', automotive locksmith service in '.$data_state->state.', emergency locksmith service in '.$data_state->state.', industrial locksmith service in '.$data_state->state;
					$data['meta_description'] = 'KeySavior lets you search for the best lock and key expert nearest your state.';
					
					$this->load->view('templates/header', $data);
					$this->load->view('pages/'.$page, $data);
					$this->load->view('templates/footer');
				} else {

					header('Location: '.base_url('states'));

				}
			}
		}

		public function city($page = 'city') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {
				
				$slug = $this->uri->segment(2, 0);

				$city_data = $this->City_model->get_city_from_slug($slug);

				// Major City Data
				$popular_cities = $this->City_model->get_popular_city();
				if($popular_cities != 0) {
					$data['popular_city'] = array('result' => 'success', 'message' => 'Has Popular City', 'data' => $popular_cities);
				} else {
					$data['popular_city'] = array('result' => 'error', 'message' => 'No Popular City');
				}

				if($city_data != 0) {

					$data['city_data'] = $city_data[0];
					$city = $data['city_data']->name;
					$state_abbrev = strtoupper($data['city_data']->state);
					$state = $this->State_model->get_state_from_abbrev($state_abbrev);
					$data['state'] = $state[0];
					
					$data['location'] = $city.', '.$data['state']->abbrev;

					// Recent Blog Data
					$blogs = $this->Page_model->get_published_post();
					if($blogs != 0) {
						$data['recent_blogs'] = $blogs;
					} else {
						$data['recent_blogs'] = 0;
					}

					$params = array(
						'City' => $city,
					    'StateProvince' => $data['state']->abbrev,
					);

					$data['bbb'] = search($params);
					if($data['bbb']->TotalResults > 0) {

						foreach($data['bbb']->SearchResults as $res) {
							$i = 0;
							if($res->City == $city AND $res->StateProvince == $state_abbrev) {
								$i = $i + 1;
							} else {
								$i = 0;
							}
							$exact[] = $i;
						}
						$bbb_count = (array_sum($exact) != 0) ? array_sum($exact).' Exact Results' : count($data['bbb']).' Suggestions';

						$bizname = array();
						foreach($data['bbb']->SearchResults as $biz) {
							$bizname[] = $biz->OrganizationName;
						}
						$business = join(', ', $bizname);

						$data['business'] = $data['bbb']->SearchResults;
						$title = 'Professional Locksmith Expert in '.$city.', '.$state_abbrev.' | '.$bbb_count.' | As of '.recent_my().' - '.the_config('site_name');
						$meta_description = 'Expert Locksmith Services in '.$city.', '.$state_abbrev.' - '.$business;

					} else {
						$data['business'] = 0;
						$title = 'Professional Locksmith Experts In '.$city.', '.$state_abbrev.' | As of '.recent_my().' - '.the_config('site_name');
						$meta_description = '';
					}

					// META
					$data['title'] = $title;
					$data['meta_title'] = $data['title'];
					// $data['meta_keyword'] = '24 hour emergency locksmith in '.$city.', '.$state_abbrev.', residential locksmith service in '.$city.', '.$state_abbrev.', commercial locksmith service in '.$city.', '.$state_abbrev.', automotive locksmith service in '.$city.', '.$state_abbrev.', emergency locksmith service in '.$city.', '.$state_abbrev.', industrial locksmith service in '.$city.', '.$state_abbrev;
					$data['meta_description'] = $meta_description;
					
					$this->load->view('templates/header', $data);
					$this->load->view('pages/'.$page, $data);
					$this->load->view('templates/footer');
				} else {

					show_404();

				}
			}			

		}

		public function zip($page = 'zip') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {

				$data['zip'] = $this->uri->segment(2, 0);

				$rand_int = array_rand(range(1,12), 1);
				$data['banner_img'] = 'build/images/random/'.$rand_int.'.jpg';
				$data['ads_img'] = 'build/images/thumb-ad/'.$rand_int.'.jpg';

				$popular_cities = $this->City_model->get_popular_city();
				if($popular_cities != 0) {
					$data['popular_city'] = array('result' => 'success', 'message' => 'Has Popular City', 'data' => $popular_cities);
				} else {
					$data['popular_city'] = array('result' => 'error', 'message' => 'No Popular City');
				}

				// Recent Blog Data
				$blogs = $this->Page_model->get_published_post();
				if($blogs != 0) {
					$data['recent_blogs'] = $blogs;
				} else {
					$data['recent_blogs'] = 0;
				}

				if(is_numeric($data['zip']) AND strlen($data['zip']) == 5) {

					$city_data = $this->City_model->get_city_from_zip($data['zip']);

					if($city_data != 0) {

						$data['city_data'] = $city_data[0];
						$data['state'] = $this->State_model->get_state_from_abbrev($data['city_data']->state)[0];
						$data['location'] = $data['city_data']->name.', '.strtoupper($data['city_data']->state).' '.$data['zip'];

						$params = array(
							'City' => $data['city_data']->name,
						    'StateProvince' => $data['city_data']->state,
						    'PostalCode' => $data['zip']
						);

						$data['bbb'] = search($params);

						if($data['bbb']->TotalResults > 0) {

							foreach($data['bbb']->SearchResults as $res) {
								$i = 0;
								if($res->City == $data['city_data']->name AND $res->StateProvince == $data['city_data']->state) {
									$i = $i + 1;
								} else {
									$i = 0;
								}
								$exact[] = $i;
							}
							$bbb_count = (array_sum($exact) != 0) ? array_sum($exact).' Exact Results' : count($data['bbb']).' Suggestions';

							$bizname = array();
							foreach($data['bbb']->SearchResults as $biz) {
								$bizname[] = $biz->OrganizationName;
							}
							$business = join(', ', $bizname);

							$data['business'] = $data['bbb']->SearchResults;
							$title = 'Leading Locksmith Services in '.$data['city_data']->name.', '.strtoupper($data['city_data']->state).' '.$data['zip'].' | '.$bbb_count.' | As of '.recent_my().' - '.the_config('site_name');
							$meta_description = 'Finest Locksmith in '.$data['city_data']->name.', '.strtoupper($data['city_data']->state).' '.$data['zip'].' - '.$business;

						} else {
							$data['business'] = 0;
							$title = 'Leading Locksmith Services in '.$data['city_data']->name.', '.strtoupper($data['city_data']->state).' '.$data['zip'].' | As of '.recent_my().' - '.the_config('site_name');
							$meta_description = '';
						}

						// META
						$data['title'] = $title;
						$data['meta_title'] = $data['title'];
						// $data['meta_keyword'] = '24 hour emergency locksmith in '.$data['city_data']->name.', '.strtoupper($data['city_data']->state).', residential locksmith service in '.$data['city_data']->name.', '.strtoupper($data['city_data']->state).', commercial locksmith service in '.$data['city_data']->name.', '.strtoupper($data['city_data']->state).', automotive locksmith service in '.$data['city_data']->name.', '.strtoupper($data['city_data']->state).', emergency locksmith service in '.$data['city_data']->name.', '.strtoupper($data['city_data']->state).', industrial locksmith service in '.$data['city_data']->name.', '.strtoupper($data['city_data']->state);
						$data['meta_description'] = $meta_description;
						
						$this->load->view('templates/header', $data);
						$this->load->view('pages/'.$page, $data);
						$this->load->view('templates/footer');

					} else {
						show_404();
					}

				} else {
					show_404();
				}
			}			

		}

		public function contactProcess() {

			$mdata = $this->input->post();
			$gr_data = gr_keys();
			$site_key = $gr_data['site_key'];
			$secret_key = $gr_data['secret_key'];
			$site_verify = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$mdata['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];
			$response = file_get_contents($site_verify);
			$g_response = json_decode($response);

			if($g_response->success == 1) {

				$emailConfig = mail_config();

		        $from = array(
		            'email' => $mdata['email'],
		            'name' => strtoupper($mdata['name']).' - '.the_config('site_name').' Contact Us'
		        );
		       
		        $to = $emailConfig['smtp_user'];
		        $subject = $mdata['subject'];
		      	$message = $mdata['message'];
		        $this->load->library('email', $emailConfig);
		        $this->email->set_newline("\r\n");
		        $this->email->from($from['email'], $from['name']);
		        $this->email->to($to);
		        $this->email->subject($subject);
		        $this->email->message($message);
		        if (!$this->email->send()) {
		            $response = json_encode(array('result' => 'error', 'message' => 'Oops! Please try again later.'));
		        } else {
		            $response = json_encode(array('result' => 'success', 'message' => 'Message successfully sent!'));
		        }

			} else {
				$response = json_encode(array('result' => 'error', 'message' => 'Invalid Captcha!'));
			}

	        echo $response;

		}

		
	}

