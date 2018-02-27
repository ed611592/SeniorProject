<?php

	class Teacher_model extends CI_Model{
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