<?php 

 class UsersController extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->database();  
        $this->load->library('form_validation');
        
    }

    public function index(){
        $this->load->view('users/users');
    }

    public function store(){

        $this->form_validation->set_rules('fname', 'Fname', 'required');
        $this->form_validation->set_rules('lname', 'Lname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_value('gender', 'Gender', 'required');
        $this->form_validation->set_rules('language', 'Language', 'required');

        if($this->form_validation->run())
        {
            $data = array(
                'first_name' => $this->input->post('fname'),
                'last_name' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' => $this->input->post('role'),
                'gender' => $this->input->post('gender'),
                'language' => $this->input->post('language'),
              
              );
              $this->db->insert('users', $data);
        }else{
           
            // $array = array(
            //     'error' => true,
            //     'first_name' => form_error('fname'),
            //     'last_name' => form_error('lname'),
                
            //  );
            //echo json_encode($array);
            echo validation_errors();
        }
    }
 } 
?>