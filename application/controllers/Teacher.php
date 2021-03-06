
<?php
   

    class Teacher extends CI_Controller {

        /**
        *This method loads the teacher homepage
        *@param string $page
        *says what webpage to load
        */
        public function view($page = 'home')
        {
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }

            $teacher = $this -> session -> get_userdata();
            $id = $teacher['teach_ID'];

            $data['title'] = ucfirst($page);
            $data['students'] = $this -> Teacher_model -> get_Class($id);
            

            $this->load->model('Teacher_model'); 
 
            $this->load->helper('string');

            $this->load->view('templates/header');
            $this->load->view('teacher/'.$page, $data);
            $this->load->view('templates/footer');
        }

        /**
        *This method loads the chart view for the results part
        *
        */
        public function index(){
            $this -> load -> view('Chart_view');
        }

        /**
        *This moethod gets all of the data for for the favorite subjects
        */
       public function getdata(){


            $data = $this ->Teacher_model ->get_all_fav_subjects();
         
      //data to json 
        
        $response->cols[] = array( 
            "id" => "", 
            "label" => "Subject", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $response->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 

            $response->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->subj_name", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->quantity, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($response); 
        } 


        /**
        *This moethod gets all of the data for for the least favorite subjects
        */
       public function getdata2(){


        $data = $this ->Teacher_model ->get_all_least_fav_subjects();
         
      //data to json 
        
        $response2->cols[] = array( 
            "id" => "", 
            "label" => "Subject", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $response2->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 

            $response2->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->subj_name", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->quantity, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($response2); 
        } 




        /**
        *This method registers a student based on the information the teacher inputted 
        */
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
              $this->session->set_flashdata('user_registered','You are now registered and can log in.');

                redirect('home');
            }

        }
    
        /**
        *This method logs a teacher in 
        */
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
                        't_logged_in' => true);

                    $this -> session -> set_userdata($user_data);

                   $this -> session -> set_flashdata('user_loggedin','You are now logged in');

                    redirect('teacher/view/teacherHome');

                }else{
                       
                    $this -> session ->set_flashdata('login_failed', 'Login is invalid');

                      redirect('teacher/login');


                }

              
            }

        }

         /**
        *This method logs a teacher out 
        */
        public function logout(){
            //Unset user data
            $this -> session -> unset_userdata('t_logged_in');
            $this -> session -> unset_userdata('teach_ID');
            $this -> session -> unset_userdata('username');

            redirect('home');
        }

        /**
        *This method checks to see if username exists
        */
        public function check_username_exists($username){

            $this -> form_validation ->set_message('check_username_exists', 'That username is taken. Please choose a different one.');

            if($this -> Teacher_model->check_username_exists($username)){
                return true;

            }else{
                return false;
            }

        }
}