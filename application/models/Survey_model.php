<?php

	class Survey_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this -> load -> database();
		}

		public function get_survey(){
			$query = $this-> db -> query("SELECT * FROM Question WHERE Surv_ID = 1");
			return $query-> result_array();
		}
	}