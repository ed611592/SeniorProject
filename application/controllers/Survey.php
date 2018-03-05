<?php
	class Survey extends CI_Controller{

		public function index(){
			$data['title'] = 'Survey';

			$data['survey'] = $this -> Survey_model -> get_survey();

			$this->load->view('templates/header');
            $this->load->view('Survey/index', $data);
            $this->load->view('templates/footer');
		}

		 public function view($page = 'home')
        {
            if(!file_exists(APPPATH.'views/Survey/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);

            $this->load->view('templates/header');
            $this->load->view('Survey/'.$page, $data);
            $this->load->view('templates/footer');
        }

        public function takeSurvey(){
            $this->load->database();

            $test['title'] = 'Survey';

            $test['survey'] = $this -> Survey_model -> get_survey();

           // $data['categories'] = $this -> post_model -> get_categories();



            $data['title'] = 'Add a response to Survey';

        	$this->form_validation ->set_rules('Student_Answer', 'Student_Answer', 'required');
            $this->form_validation ->set_rules('Q_ID', 'Q_ID', 'required');
            $this->form_validation ->set_rules('Surv_ID', 'Surv_ID', 'required');
            $this->form_validation ->set_rules('S_ID', 'S_ID', 'required');
 
            
                
            if($this->form_validation->run()=== FALSE){
                $this -> load-> view('templates/header');
                $this -> load-> view('Survey/index', $data);
                $this -> load-> view('templates/footer');

            }else{

               $this -> Survey_model -> takeSurvey(); 
               $this -> load-> view('templates/header');
                $this -> load-> view('Survey/index', $data);
                $this -> load-> view('templates/footer');
              }
          }
           

	}