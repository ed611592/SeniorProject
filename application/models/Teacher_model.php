<?php

	class Teacher_model extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this -> load -> database();
		}

		public function get_kids_bullied($S_ID){
			$query = $this -> db -> query("SELECT Responses.Student_Answer,  Responses.Q_ID, Responses.S_ID FROM Responses WHERE Q_ID = 7 AND S_ID = $S_ID");
			return $query -> result_array();
		}

		public function get_kids_likeschool($S_ID){
			$query = $this -> db -> query("SELECT Responses.Student_Answer,  Responses.Q_ID, Responses.S_ID FROM Responses WHERE Q_ID = 6 AND S_ID = $S_ID");
			return $query -> result_array();
		}

		public function get_all_fav_subjects(){
			return $this->db->get('Fav_Subject')->result();
		}

		public function get_all_least_fav_subjects(){
			return $this->db->get('Least_Fav_Subject')->result();
		}

		public function get_fav_class($Q_id, $S_ID){
			$query = $this -> db -> query("SELECT Responses.Student_Answer,  Responses.Q_ID, Responses.S_ID FROM Responses WHERE Q_ID = $Q_id AND S_ID = $S_ID");
			return $query -> result_array();
		}

		public function get_Class($id){
			$query = $this-> db -> query("SELECT Student.S_ID, Student.fname, Student.lname, Student.AVG_Grade, Student.teach_ID FROM Student WHERE teach_ID = $id");
			return $query-> result_array();
		}

		public function get_Answers($id){
			$query = $this -> db -> query("SELECT Responses.Student_Answer, Responses.value, Responses.Q_ID, Responses.S_ID, Responses.R_ID, Responses.Surv_ID FROM Responses WHERE S_ID = $id");
			return $query -> result_array();
		}

		public function get_Question($Q_ID, $S_ID){
			$query = $this -> db -> query("SELECT Responses.Student_Answer, Responses.value, Responses.Q_ID, Responses.S_ID, Responses.R_ID, Responses.Surv_ID FROM Responses WHERE Q_ID = $Q_ID AND S_ID = $S_ID");
			return $query -> row_array();
		}

		public function get_Grade($id){
			$query = $this-> db -> query("SELECT Student.AVG_Grade FROM Student WHERE S_ID = $id");
			return $query -> result_array();
		}

		public function register($enc_password){
			//user data array
			$data = array(
				'name' => $this -> input->post('name'),
				'username' => $this -> input->post('username'),
				'password' => $enc_password
			);

			//insert teacher user
			return $this -> db -> insert('Teacher', $data);
		}	

		public function register_student($enc_password){
			//user data array
			$data = array(
				'S_name' => $this -> input->post('S_name'),
				'S_username' => $this -> input->post('S_username'),
				'S_password' => $enc_password
			);

			//insert teacher user
			return $this -> db -> insert('Student', $data);
		}	

		//Log teacher in
		public function login($username, $password){
			//Validate
			$this -> db -> where('username', $username);
			$this -> db -> where('password', $password);

			$result = $this -> db -> get('Teacher');


			if ($result -> num_rows() == 1){
				return $result -> row(0)-> teach_ID;
			}else{
				return false;
			}
		}

		//check username exists
		public function check_username_exists($username){

			$query = $this ->db ->get_where('Teacher', array('username'=>$username));

			if(empty($query -> row_array())){
				return true;
			}
			else{
				return false;
			}

		}

	}