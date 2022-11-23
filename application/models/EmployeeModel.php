<?php 
class EmployeeModel extends CI_Model {


    public function __construct() { 
        // Set table name 
        $this->table = 'employee'; 
    } 

    // public function get_employee($column_name,$column_order,$search_keyword)
    // {
    //         $this->db->order_by($column_name, $column_order);    
    //         $result = $this->db->get('employee');
    //         return $result->result_array();
            

    // }


    public function get_employee($search_keyword)
    {
        if($search_keyword != '') {
            $this->db->like('name',$search_keyword);
            //$this->db->like('name',$search_keyword);
            $this->db->or_like('email', $search_keyword);
            $this->db->or_like('phone', $search_keyword);
            $query  =  $this->db->get('employee');
        }else{
           // $this->db->order_by($column_name, $column_order);
            $query = $this->db->get("employee");
        }
        return $query->result();
        // return $query->result_array();
        // $query = $this->db->get("employee");
        // return $query->result();

    }


    public function insert()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        ); 

        return $this->db->insert('employee', $data);
    }

    // public function viewData()
    // {
    //     $query =  $this->db->where('id', $id);
    //     $query = $this->db->get('employee');

        
    //     return $query->result();
    // }

    public function viewData($id){
		$query = $this->db->get_where('employee',array('id'=>$id));
		return $query->row_array();
	}

    public function update($id){

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        );

        $this->db->where('id', $id);
        $result=$this->db->update('employee',  $data);
        return $result;
    }

    public function delete($id){

        $this->db->where('id', $id);    
        $result = $this->db->delete('employee');
        return $result;
    }

    // public function searching($search_keyword){

    //                 //$this->db->like('name','%'.$search_keyword.'%');
    //                 $this->db->like('name',$search_keyword);
    //                 $this->db->or_like('email', $search_keyword);
    //                 $this->db->or_like('phone', $search_keyword);
    //     $query  =   $this->db->get('employee');
    //     return $query->result();
    // } 

      
    // Fetch records
    public function getData($rowno,$rowperpage) {
    
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->limit($rowperpage, $rowno);  
        $query = $this->db->get();
    
        return $query->result_array();
    }

    // Select total records
    public function getrecordCount() {

        $this->db->select('count(*) as allcount');
        $this->db->from('employee');
        $query = $this->db->get();
        $result = $query->result_array();
    
        return $result[0]['allcount'];
    }


    // public function sorting($column_name,$column_order){
    //         // $this->db->order_by('id', 'ASC');
        
    //     $this->db->order_by($column_name, $column_order);    
    //     $result = $this->db->get('employee');
    //     return $result->result_array();
    // }

}


?>