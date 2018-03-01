<?php

	class Survey_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this -> load -> database();
		}

		public function get_survey($id = 1){
			$query = $this-> db -> query("SELECT * FROM Question WHERE Surv_ID = $id");
			return $query-> result_array();
		}

		public function add_response(){

			//user data array
			$data = array(
				'Student_Answer' => $this -> input->post('answer'),
				'Q_ID' => $this -> input->post('Q_ID'),
				'S_ID' => $this -> input ->post('S_ID'),
				'Surv_ID' => $this -> input->post('Surv_ID')
			);

			//insert student user
			return $this -> db -> insert('Responses', $data);
		}

	}