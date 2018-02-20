
<?php
    class Teacher extends CI_Controller {

//Register User
        public function register(){
     
            $data['title'] = 'Sign Up';

            $this->form_validation ->set_rules('name', 'Name', 'required');
            $this->form_validation ->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation ->set_rules('password', 'Password', 'required');
            $this->form_validation ->set_rules('password2', 'Confirm Password', 'matches[password]');

            if($this->form_validation->run()=== FALSE){
                $this -> load-> view('templates/header');
                $this -> load-> view('teacher/register', $data);
                $this -> load-> view('templates/footer');

            }else{
                // Encrypt password
                $enc_password = md5($this -> input ->post('password'));
                $this -> Teacher_model -> register($enc_password);

                //set message
           //   $this->session->set_flashdata('user_registered','You are now registered and can log in.')

                redirect('home');
            }

        }

//Log in user
         public function login(){
            $data['title'] = 'Sign In';

            $this-> form_validation ->set_rules('username', 'Username', 'required');
            $this-> form_validation ->set_rules('password', 'Password', 'required');
           

            if($this -> form_validation->run()=== FALSE){
                $this -> load-> view('templates/header');
                $this -> load-> view('teacher/login', $data);
                $this -> load-> view('templates/footer');

            }else{

                // Get username
                $username = $this -> input -> post('username');
                // Get and encrypt password
                $password = md5($this -> input -> post('password'));

                //Login teacher
                $teach_ID = $this -> Teacher_model -> login($username, $password);
             

                if($teach_ID){
                    //create session

                    $user_data = array(
                        'teach_ID' => $teach_ID, 
                        'username' => $username,
                        'logged_in' => true);

                    $this -> session -> set_userdata($user_data);

                    $this -> session -> set_flashdata('user_loggedin','You are now logged in');

                    redirect('home');

                }else{
                       
                    $this -> session ->set_flashdata('login_failed', 'Login is invalid');

                      redirect('teacher/login');


                }

                //set message
              //  $this -> session -> set_flashdata('teacher_registered', 'You are now registered and can log in');

              
            }

        }

        // log user out
        public function logout(){
            //Unset user data
            $this -> session -> unset_userdata('logged_in');
            $this -> session -> unset_userdata('teach_ID');
            $this -> session -> unset_userdata('username');

            //this isn't working either
            $this -> session ->set_flashdata('user_loggedout', 'You are now logged out');

            redirect('home');
        }

        //Check if username exists
        public function check_username_exists($username){

            $this -> form_validation ->set_message('check_username_exists', 'That username is taken. Please choose a different one.');

            if($this -> Teacher_model->check_username_exists($username)){
                return true;

            }else{
                return false;
            }

        }
}