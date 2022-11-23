<?php
class EmployeeController extends CI_Controller {

        public $employeeCrud;
       
        public function __construct()
        {
                parent::__construct(); 
                $this->load->database();  
               
                $this->load->library('form_validation');
                //$this->load->helper('url');
                $this->load->library("pagination");
               
                $this->load->helper(array('form', 'url'));
                $this->load->model('EmployeeModel');
                $this->employeeCrud = new EmployeeModel;
        }

        public function show()
        { 
                $this->load->view('employee/index');
        }

        public function index()
        {
               
                $column_name = $_GET['name'] ?? '';
                $column_order = $_GET['order'] ?? '';
                $search_keyword = $_GET['search_input'] ?? '';
                $data['data'] = $this->employeeCrud->get_employee($column_name,$column_order,$search_keyword);
                echo json_encode($data);
        }

        // public function index()
        // {
        //         $search_keyword = $_GET['search_input'] ?? '';
        //         $data['data'] = $this->employeeCrud->get_employee($search_keyword);
        //         echo json_encode($data);
        // }


        public function store()
        {
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[employee.email]');
                $this->form_validation->set_rules('phone', 'Phone', 'required');

                if($this->form_validation->run())
                {
                        $array = array(
                                 $this->employeeCrud->insert(),
                                'success'=>'Record added successfully.'
                        );
                }else{
                        $array = array(
                                'error' => true,
                                'name_error' => form_error('name'),
                                'email_error' => form_error('email'),
                                'phone_error' => form_error('phone')
                        );
                }
                echo json_encode($array);


               
                // if($this->form_validation->run() == FALSE)
                // {
                //         $array = array(
                                
                //                 'name_error' => form_error('name'),
                //                 'email_error' => form_error('email'),
                //                 'phone_error' => form_error('phone')
                //         );
                //         echo json_encode($array);
                       
                // }else{
                //         $this->employeeCrud->insert();
                //         echo json_encode(['success'=>'Record added successfully.']);
                // }
             
        }

        public function view()
        {
                $id = $_GET['id'];
		$data['data'] = $this->employeeCrud->viewData($id);
		echo json_encode($data);
        }

        public function update_employee()
        {
                $id = $_POST['id'];
                $data = $this->employeeCrud->update($id);
                echo json_encode($data);
        }

        public function delete_employee()
        {
                $id = $_GET['id'];
                $data = $this->employeeCrud->delete($id);
                echo json_encode($data);
        }

        // public function search(){

        //         $search_keyword = $_GET['search_input'];
        //         $data = $this->employeeCrud->searching($search_keyword);
        //         echo json_encode($data);
        // }

        // public function cipagination($rowno=0){  

        //         //$page = $_GET['pageno'];

        //         //echo $page;
        //         $rowperpage = 2;  
              
        //         if($rowno != 0){  
        //           $rowno = ($rowno-1) * $rowperpage;  
        //         }  
              
        //         $allcount = $this->db->count_all('employee');  
              
        //         $this->db->limit($rowperpage, $rowno);  
        //         $employee_record = $this->db->get('employee')->result_array();  
              
        //         $config['base_url'] = base_url().'index.php/EmployeeController/cipagination'; 
        //         $config['use_page_numbers'] = TRUE;  
        //         $config['total_rows'] = $allcount;  
        //         $config['per_page'] = $rowperpage; 
        //         //$config['uri_segment'] = $rowno;
              
        //         $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';  
        //         $config['full_tag_close']   = '</ul></nav></div>';  
        //         $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';  
        //         $config['num_tag_close']    = '</span></li>';  
        //         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';  
        //         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';  
        //         $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';  
        //         $config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';  
        //         $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';  
        //         $config['prev_tag_close']   = '</span></li>';  
        //         $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';  
        //         $config['first_tag_close']  = '</span></li>';  
        //         $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';  
        //         $config['last_tag_close']   = '</span></li>';  
              
        //         $this->pagination->initialize($config);  
              
        //         $data['pagination'] = $this->pagination->create_links();  
        //         $data['result'] = $employee_record;  
        //         //$data['row'] = $rowno;  
              
        //         echo json_encode($data);  
        // }  





        public function cipagination(){

                $rowno = $_GET['pageno'];
                // Row per page
                $rowperpage = 3;
        
                // Row position
                if($rowno != 0){
                $rowno = ($rowno-1) * $rowperpage;
                }
        
                // All records count
                $allcount = $this->employeeCrud->getrecordCount();
        
                // Get records
                $users_record = $this->employeeCrud->getData($rowno,$rowperpage);
        
                // Pagination Configuration
                $config['base_url'] = base_url().'EmployeeController/cipagination';
                $config['use_page_numbers'] = TRUE;
                $config['total_rows'] = $allcount;
                $config['per_page'] = $rowperpage;
               // $config['uri_segment'] = 3;
              

                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';  
                $config['full_tag_close']   = '</ul></nav></div>';  
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';  
                $config['num_tag_close']    = '</span></li>';  
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';  
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';  
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';  
                $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';  
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';  
                $config['prev_tag_close']  = '</span></li>';  
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';  
                $config['first_tag_close'] = '</span></li>';  
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';  
                $config['last_tag_close']  = '</span></li>';  


                // Initialize
                $this->pagination->initialize($config);
        
                // Initialize $data Array
                $data['pagination'] = $this->pagination->create_links();
                $data['result'] = $users_record;
                $data['row'] = $rowno;
        
                echo json_encode($data);
        
        }
        // public function employeeSorting(){

        //         $column_order = $_GET['order'];
        //         $column_name = $_GET['name'];
        //         $data = $this->employeeCrud->sorting($column_name,$column_order);
        //         echo json_encode($data);
        // }
        



        public function view_file()
        {
                $this->load->view('img/file');
        }

        public function upload_file()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                
             
                $this->load->library('upload', $config);

                if($this->upload->do_upload('image'))
                {
                    echo "<pre>";
                    print_r($this->upload->data('full_path'));
                } else{
                    print_r($this->upload->display_errors());
                }

                

        }
       

}

?>