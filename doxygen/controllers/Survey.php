<?php
	class Survey extends CI_Controller{

        /**
        *This method creates the initial survey page
        */
		public function index(){
			$data['title'] = 'Survey';

			$data['survey'] = $this -> Survey_model -> get_survey();

			$this->load->view('templates/header');
            $this->load->view('Survey/index', $data);
            $this->load->view('templates/footer');
		}

        /**
        *This method loads the barebones survey page
        *@param string $page
        *variable to load the proper php page
        */
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

        /**
        *This method sends all of the survey data to the survey page to be displayed 
        *
        */
        public function takeSurvey(){
            $this->load->database();

            $test['title'] = 'Survey';

            $test['survey'] = $this -> Survey_model -> get_survey();

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
        
        /**
        *This method loads the completed page when called
        *@param string $page
        *this tells the function what page to load
        */   
        public function done($page = 'completed')
        {
            if(!file_exists(APPPATH.'views/Survey/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);

            $this->load->view('templates/header');
            $this->load->view('Survey/'.$page, $data);
            $this->load->view('templates/footer');
        }

	}