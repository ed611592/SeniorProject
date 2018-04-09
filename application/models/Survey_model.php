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

				$test = $this->db->get('Fruits')->result();
				//math as favorite subject
				if($data['Student_Answer'] == 1){
					$test = $test[0];
				
					$Math_total = $test->quantity;
				
					$Math_total = $Math_total +1;
				
					
					$data2['fruits_name'] = 'Math';
					$data2['quantity'] = $Math_total;
		
					$this->db->where('fruits_name', 'Math');
					$this->db->update('Fruits', $data2);
				}
				//english/reading as favorite subject
				if($data['Student_Answer'] == 2){
					$test = $test[1];
				
					$Eng_total = $test->quantity;
				
					$Eng_total = $Eng_total +1;
				
					
					$data2['fruits_name'] = 'English/Reading';
					$data2['quantity'] = $Eng_total;
		
					$this->db->where('fruits_name', 'English/Reading');
					$this->db->update('Fruits', $data2);

				}
				//science as favorite subject
				if($data['Student_Answer'] == 3){
					$test = $test[2];
				
					$Science_total = $test->quantity;
				
					$Science_total = $Science_total +1;
				
					
					$data2['fruits_name'] = 'Science';
					$data2['quantity'] = $Science_total;
		
					$this->db->where('fruits_name', 'Science');
					$this->db->update('Fruits', $data2);
					
				}
				//history as favorite subject
				if($data['Student_Answer'] == 4){
					$test = $test[3];
				
					$History_total = $test->quantity;
				
					$History_total = $History_total +1;
				
					
					$data2['fruits_name'] = 'History';
					$data2['quantity'] = $History_total;
		
					$this->db->where('fruits_name', 'History');
					$this->db->update('Fruits', $data2);
					
				}
				
			}

			//if the question is what is your least fav subject
			if($_SESSION['counter'] == 3){

				$test2 = $this->db->get('Fruits2')->result();
				//math as favorite subject
				if($data['Student_Answer'] == 1){
					$test2 = $test2[0];
				
					$Math_total2 = $test2->quantity;
				
					$Math_total2 = $Math_total2 +1;
				
					
					$data_least['fruits_name'] = 'Math';
					$data_least['quantity'] = $Math_total2;
		
					$this->db->where('fruits_name', 'Math');
					$this->db->update('Fruits2', $data_least);
				}
				//english/reading as favorite subject
				if($data['Student_Answer'] == 2){
					$test2 = $test2[1];
				
					$Eng_total2 = $test2->quantity;
				
					$Eng_total2 = $Eng_total2 +1;
				
					
					$data_least['fruits_name'] = 'English/Reading';
					$data_least['quantity'] = $Eng_total2;
		
					$this->db->where('fruits_name', 'English/Reading');
					$this->db->update('Fruits2', $data_least);

				}
				//science as favorite subject
				if($data['Student_Answer'] == 3){
					$test2 = $test2[2];
				
					$Science_total2 = $test2->quantity;
				
					$Science_total2 = $Science_total2 +1;
				
					
					$data_least['fruits_name'] = 'Science';
					$data_least['quantity'] = $Science_total2;
		
					$this->db->where('fruits_name', 'Science');
					$this->db->update('Fruits2', $data_least);
					
				}
				//history as favorite subject
				if($data['Student_Answer'] == 4){
					$test2 = $test2[3];
				
					$History_total2 = $test2->quantity;
				
					$History_total2 = $History_total2 +1;
				
					
					$data_least['fruits_name'] = 'History';
					$data_least['quantity'] = $History_total2;
		
					$this->db->where('fruits_name', 'History');
					$this->db->update('Fruits2', $data_least);
					
				}
				
			}

			
			
			//insert student response
			return $this -> db -> insert('Responses', $data);
		}

		}

