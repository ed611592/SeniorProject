<?php

	class Survey_model extends CI_Model{
		/**
		*This function loads the database method for the Survey_Model to use
		*
		*/
		public function __construct(){
			parent::__construct();
			$this -> load -> database();
		}

		/**
		*This method queries the database for the questions pertaining to he proper survey
		*@param int $id
		*tells the query what survey to look in
		*/
		public function get_survey($id = 1){
			$query = $this-> db -> query("SELECT * FROM Question WHERE Surv_ID = $id");
			return $query-> result_array();
		}

		/**
		*This method takes the student's responses and posts them to the responses database as well as the the favorite subject table and least favorite subject table
		*
		*/
		public function takeSurvey(){
			$data2 = array();
			$data_least = array();
			
			//user data array
			$data = array(
				'Student_Answer' => $this -> input->post('Student_Answer'),
				'Q_ID' => $this -> input->post('Q_ID'),
				'S_ID' => $this -> input ->post('S_ID'),
				'Surv_ID' => $this -> input->post('Surv_ID')
			);
			//if the question is what is your favorite subject
			
			if($_SESSION['counter'] == 2){

				$test = $this->db->get('Fav_Subject')->result();
				//math as favorite subject
				if($data['Student_Answer'] == 1){
					$test = $test[0];
				
					$Math_total = $test->quantity;
				
					$Math_total = $Math_total +1;
				
					
					$data2['subj_name'] = 'Math';
					$data2['quantity'] = $Math_total;
		
					$this->db->where('subj_name', 'Math');
					$this->db->update('Fav_Subject', $data2);
				}
				//english/reading as favorite subject
				if($data['Student_Answer'] == 2){
					$test = $test[1];
				
					$Eng_total = $test->quantity;
				
					$Eng_total = $Eng_total +1;
				
					
					$data2['subj_name'] = 'English/Reading';
					$data2['quantity'] = $Eng_total;
		
					$this->db->where('subj_name', 'English/Reading');
					$this->db->update('Fav_Subject', $data2);

				}
				//science as favorite subject
				if($data['Student_Answer'] == 3){
					$test = $test[2];
				
					$Science_total = $test->quantity;
				
					$Science_total = $Science_total +1;
				
					
					$data2['subj_name'] = 'Science';
					$data2['quantity'] = $Science_total;
		
					$this->db->where('subj_name', 'Science');
					$this->db->update('Fav_Subject', $data2);
					
				}
				//history as favorite subject
				if($data['Student_Answer'] == 4){
					$test = $test[3];
				
					$History_total = $test->quantity;
				
					$History_total = $History_total +1;
				
					
					$data2['subj_name'] = 'History';
					$data2['quantity'] = $History_total;
		
					$this->db->where('subj_name', 'History');
					$this->db->update('Fav_Subject', $data2);
					
				}
				
			}

			//if the question is what is your least fav subject
			if($_SESSION['counter'] == 3){

				$test2 = $this->db->get('Least_Fav_Subject')->result();
				//math as favorite subject
				if($data['Student_Answer'] == 1){
					$test2 = $test2[0];
				
					$Math_total2 = $test2->quantity;
				
					$Math_total2 = $Math_total2 +1;
				
					
					$data_least['subj_name'] = 'Math';
					$data_least['quantity'] = $Math_total2;
		
					$this->db->where('subj_name', 'Math');
					$this->db->update('Least_Fav_Subject', $data_least);
				}
				//english/reading as favorite subject
				if($data['Student_Answer'] == 2){
					$test2 = $test2[1];
				
					$Eng_total2 = $test2->quantity;
				
					$Eng_total2 = $Eng_total2 +1;
				
					
					$data_least['subj_name'] = 'English/Reading';
					$data_least['quantity'] = $Eng_total2;
		
					$this->db->where('subj_name', 'English/Reading');
					$this->db->update('Least_Fav_Subject', $data_least);

				}
				//science as favorite subject
				if($data['Student_Answer'] == 3){
					$test2 = $test2[2];
				
					$Science_total2 = $test2->quantity;
				
					$Science_total2 = $Science_total2 +1;
				
					
					$data_least['subj_name'] = 'Science';
					$data_least['quantity'] = $Science_total2;
		
					$this->db->where('subj_name', 'Science');
					$this->db->update('Least_Fav_Subject', $data_least);
					
				}
				//history as favorite subject
				if($data['Student_Answer'] == 4){
					$test2 = $test2[3];
				
					$History_total2 = $test2->quantity;
				
					$History_total2 = $History_total2 +1;
				
					
					$data_least['subj_name'] = 'History';
					$data_least['quantity'] = $History_total2;
		
					$this->db->where('subj_name', 'History');
					$this->db->update('Least_Fav_Subject', $data_least);
					
				}
				
			}

			
			
			//insert student response
			return $this -> db -> insert('Responses', $data);
		}

		}

