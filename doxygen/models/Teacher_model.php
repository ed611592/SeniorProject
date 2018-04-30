<?php

	class Teacher_model extends CI_Model{


		 /**
        * 
        * This method loads the database
        *
        */
		public function __construct(){
			parent::__construct();
			$this -> load -> database();
		}

		 /**
        * @param $S_ID
        * @return array containing student information
        * This method makes a query to the database and gets the Response the specific student made to the bullied question.
        *
        */
		public function get_kids_bullied($S_ID){
			$query = $this -> db -> query("SELECT Responses.Student_Answer,  Responses.Q_ID, Responses.S_ID FROM Responses WHERE Q_ID = 7 AND S_ID = $S_ID");
			return $query -> result_array();
		}

		/**
        * @param $S_ID
        * @return array containing student information
        * This method makes a query to the database and gets the Response the specific student made to the question about if the student likes school or not. 
        *
        */
		public function get_kids_likeschool($S_ID){
			$query = $this -> db -> query("SELECT Responses.Student_Answer,  Responses.Q_ID, Responses.S_ID FROM Responses WHERE Q_ID = 6 AND S_ID = $S_ID");
			return $query -> result_array();
		}

		/**
        *
        * @return the Fav_Subject table
        * This method returns the entire fav_subject table.
        *
        */
		public function get_all_fav_subjects(){
			return $this->db->get('Fav_Subject')->result();
		}


		/**
        *
        * @return the Least_Fav_Subject table
        * This method returns the entire Least_fav_subject table.
        *
        */
		public function get_all_least_fav_subjects(){
			return $this->db->get('Least_Fav_Subject')->result();
		}


		/**
        * @param $S_ID
        * @param $Q_ID
        * @return array containing student information
        * This method returns the specific student's favorite class.
        *
        */
		public function get_fav_class($Q_id, $S_ID){
			$query = $this -> db -> query("SELECT Responses.Student_Answer,  Responses.Q_ID, Responses.S_ID FROM Responses WHERE Q_ID = $Q_id AND S_ID = $S_ID");
			return $query -> result_array();
		}


		/**
        * @param $id
        * @return array containing student information
        * This method gets all the students under the entered teacher ID.
        *
        */
		public function get_Class($id){
			$query = $this-> db -> query("SELECT Student.S_ID, Student.fname, Student.lname, Student.AVG_Grade, Student.teach_ID FROM Student WHERE teach_ID = $id");
			return $query-> result_array();
		}

		/**
        * @param $id
        * @return array containing student information
        * This method gets all of the responses for one student.
        *
        */
		public function get_Answers($id){
			$query = $this -> db -> query("SELECT Responses.Student_Answer,  Responses.Q_ID, Responses.S_ID, Responses.R_ID, Responses.Surv_ID FROM Responses WHERE S_ID = $id");
			return $query -> result_array();
		}

		/**
        * @param $Q_ID, $S_ID
        * @return array containing student information
        * This method returns the response for a specific question and student.
        *
        */
		public function get_Question($Q_ID, $S_ID){
			$query = $this -> db -> query("SELECT Responses.Student_Answer, Responses.Q_ID, Responses.S_ID, Responses.R_ID, Responses.Surv_ID FROM Responses WHERE Q_ID = $Q_ID AND S_ID = $S_ID");
			return $query -> row_array();
		}

		/**
        * @param $one
        * @return array containing a string of text
        * This method returns the text of the question called.
        *
        */
		public function get_Q($one){
			$query = $this -> db -> query("SELECT question.Q_text FROM `question` WHERE Q_ID = $one");
			return $query -> row_array();
		}

		/**
        * @param $id
        * @return array containing student information
        * This method returns a specific student's grade.
        *
        */

		public function get_Grade($id){
			$query = $this-> db -> query("SELECT Student.AVG_Grade FROM Student WHERE S_ID = $id");
			return $query -> result_array();
		}

		/**
        * @param $enc_password
        * @return the database call to insert a Teacher
        * This method gets called by the controller and registers the Teacher into the db.
        *
        */
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

		/**
        * @param $enc_password
        * @return the database call to insert a Student
        * This method gets called by the controller and registers the Student into the db.
        *
        */
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

		/**
        * @param $username, $password
        * @return the database call to get the Teacher table
        * This method gets called by the controller and finds the teacher with this specific username and password in the database and returns it.
        *
        */
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

		/**
        * @param $username
        * @return booleean
        * This method checks to see if the teacher username exists in the database. 
        *
        */
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