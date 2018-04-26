<?php

    class Student extends CI_Controller {
        /**
        * @param string $page
        *   An string that contains the page name
        *
        */
          public function view($page = 'StudentSurvey')
        {
            if(!file_exists(APPPATH.'views/student/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);

            $this->load->view('templates/header');
            $this->load->view('student/'.$page, $data);
            $this->load->view('templates/footer');
        }

        /**
        * This method uses the user entered information from the student register page and adds that student to the database.  
        *
        */

        public function register(){
     
            $data['title'] = 'Sign Up a Student';

            $this->form_validation ->set_rules('fname', 'FirstName', 'required');
            $this->form_validation ->set_rules('lname', 'LastName', 'required');
            $this->form_validation ->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation ->set_rules('password', 'Password', 'required');
            $this->form_validation ->set_rules('password2', 'Confirm Password', 'matches[password]');
            $this->form_validation ->set_rules('AVG_Grade', 'AVG_Grade', 'required');
            $this->form_validation ->set_rules('teach_ID', 'teach_ID');

            if($this->form_validation->run()=== FALSE){
                $this -> load-> view('templates/header');
                $this -> load-> view('student/register', $data);
                $this -> load-> view('templates/footer');

            }else{

               
                // Encrypt password
                $enc_password = md5($this -> input ->post('password'));

                $this -> Student_model -> register($enc_password, $teach_ID);

                //set message
             $this->session->set_flashdata('student_user_registered','The student has been added and can now login.');

                redirect('teacher/view/teacherHome');
                
            }

        }

         /**
        * This method uses the user entered information from the student login page. It checks to see if the username/password exists in the student database, and it if does then it logs in the student and redirects to the student home page.
        *
        */
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
                $password = md5($this -> input -> post('password'));

                //Login student
                $S_ID = $this -> Student_model -> login($username, $password);
             

                if($S_ID){
                    //create session

                    $user_data = array(
                        'S_ID' => $S_ID, 
                        'username' => $username,
                        's_logged_in' => true);

                    $this -> session -> set_userdata($user_data);

                 

                    redirect('student/view/studentHome');

                }else{
                       
                    $this -> session ->set_flashdata('login_failed', 'Login is invalid');

                      redirect('student/login');


                }


              
            }

        }

         /**
        * This method logs out the student session data and returns to the homepage. 
        *
        */
        public function logout(){
            //Unset user data
            $this -> session -> unset_userdata('s_logged_in');
            $this -> session -> unset_userdata('S_ID');
            $this -> session -> unset_userdata('username');

            session_unset();

        

            redirect('home');
        }

        /**
        * @param string $username
        * This method checks if the student username exists in the database.  
        *
        */
        public function check_username_exists($username){

            $this -> form_validation ->set_message('check_username_exists', 'That username is taken. Please choose a different one.');

            if($this -> Student_model->check_username_exists($username)){
                return true;

            }else{
                return false;
            }

        }
}