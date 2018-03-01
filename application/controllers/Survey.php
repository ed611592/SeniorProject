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

        public function add_response(){

        	$this->form_validation ->set_rules('answer', 'answer');
            $this->form_validation ->set_rules('Q_ID', 'Q_ID');
            $this->form_validation ->set_rules('Surv_ID', 'Surv_ID');
            $this->form_validation ->set_rules('S_ID', 'S_ID');
 

            if($this->form_validation->run()=== FALSE){
                $this -> load-> view('templates/header');
                $this -> load-> view('student/register', $data);
                $this -> load-> view('templates/footer');

            }else{
                $this -> Survey_model -> add_response();
            	

              }
          } 

	}