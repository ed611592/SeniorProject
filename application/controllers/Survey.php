<?php
	class Survey extends CI_Controller{
		public function index(){
			$data['title'] = 'Survey';

			$data['survey'] = $this -> Survey_model -> get_survey();

			$this->load->view('templates/header');
            $this->load->view('Survey/index', $data);
            $this->load->view('templates/footer');
		}
	}