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

	}