<?php

	class User_model extends CI_Model {

	    protected $table = 'users';
		protected $key = 'id';

	    function __construct()
	    {
	        parent::__construct();
	    }

	    public function get_users()
	    {

            $this->db->select('*');
			$this->db->from($this->table);

            $dataset = $this->db->get();

			if($dataset->num_rows()){
				return $dataset->result();
			} else {
				return FALSE;
			}
	    }

	    public function resolve_user_login($user, $password) {

	    	$this->db->select('password');
			$this->db->from($this->table);
			$this->db->where('username', $user);
			$this->db->where('password', $password);

			return $this->db->get()->row();

   //          $dataset = $this->db->get();

			// if($dataset->num_rows()){
			// 	return $dataset->result();
			// } else {
			// 	return FALSE;
			// }

	    }

	    public function get_user_id_from_username($username) {
		
			$this->db->select('id');
			$this->db->from($this->table);
			$this->db->where('username', $username);

			return $this->db->get()->row('id');

			// $dataset = $this->db->get();

			// if($dataset->num_rows()){
			// 	return $dataset->result();
			// } else {
			// 	return FALSE;
			// }
			
		}

		public function get_user($user_id) {
		
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('id', $user_id);
			return $this->db->get()->row();

			// $dataset = $this->db->get();
			
			// if($dataset->num_rows()){
			// 	return $dataset->result();
			// } else {
			// 	return FALSE;
			// }
			
		}

	}