<?php

	class Student_model extends CI_Model{
		
		public function register($enc_password, $teach_ID){

			//user data array
			$data = array(
				'fname' => $this -> input->post('fname'),
				'AVG_Grade' => $this -> input->post('AVG_Grade'),
				'teach_ID' => $this -> input ->post('teach_ID'),
				'username' => $this -> input->post('username'),
				'password' => $enc_password,
				'lname' => $this -> input->post('lname')
			);

			//insert student user
			return $this -> db -> insert('Student', $data);
		}	
		

		//Log student in
		public function login($username, $password){
			//Validate
			$this -> db -> where('username', $username);
			$this -> db -> where('password', $password);

			$result = $this -> db -> get('Student');


			if ($result -> num_rows() == 1){
				return $result -> row(0)-> S_ID;
			}else{
				return false;
			}
		}

		//check username exists
		public function check_username_exists($username){

			$query = $this ->db ->get_where('Student', array('username'=>$username));

			if(empty($query -> row_array())){
				return true;
			}
			else{
				return false;
			}

		}

	}