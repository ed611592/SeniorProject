<?php
    class Student extends CI_Controller {
        //why isn't this working
          public function view($page = 'StudentSurvey')
        {
            if(!file_exists(APPPATH.'views/student/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);

            $this->load->view('templates/header');
            $this->load->view('view/student/'.$page, $data);
            $this->load->view('templates/footer');
        }

        //Log in user
         public function login(){
            $data['title'] = 'Sign In';

            $this-> form_validation ->set_rules('username', 'Username', 'required');
            $this-> form_validation ->set_rules('password', 'Password', 'required');
           

            if($this -> form_validation->run()=== FALSE){
                $this -> load-> view('templates/header');
                $this -> load-> view('student/login', $data);
                $this -> load-> view('templates/footer');

            }else{

                // Get username
                $username = $this -> input -> post('username');
                // Get and encrypt password
                $password = $this -> input -> post('password');

                //Login student
                $S_ID = $this -> Student_model -> login($username, $password);
             

                if($S_ID){
                    //create session

                    $user_data = array(
                        'S_ID' => $S_ID, 
                        'username' => $username,
                        'logged_in' => true);

                    $this -> session -> set_userdata($user_data);

                    $this -> session -> set_flashdata('user_loggedin','You are now logged in');

                    redirect('home');

                }else{
                       
                    $this -> session ->set_flashdata('login_failed', 'Login is invalid');

                      redirect('student/login');


                }


              
            }

        }

        // log user out
        public function logout(){
            //Unset user data
            $this -> session -> unset_userdata('logged_in');
            $this -> session -> unset_userdata('S_ID');
            $this -> session -> unset_userdata('username');

          
            $this -> session ->set_flashdata('user_loggedout', 'You are now logged out');

            redirect('home');
        }

        //Check if username exists
        public function check_username_exists($username){

            $this -> form_validation ->set_message('check_username_exists', 'That username is taken. Please choose a different one.');

            if($this -> Student_model->check_username_exists($username)){
                return true;

            }else{
                return false;
            }

        }
}