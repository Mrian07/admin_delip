<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class AdminModel extends CI_Model {
                        
public function login(){
                        
                                
}
    public function getAllAdmin()
    {
        return $this->db->get('admin')->result_array();
    }
        public function tambahdataadmin($data)
    {
        $this->db->insert('admin', $data);
    }
        public function ubahKeAdmin($id)
    {
        $this->db->set('admin_role', 0);
        $this->db->where('id', $id);
        $this->db->update('admin');
    }
        public function ubahKeSuperAdmin($id)
    {
        $this->db->set('admin_role', 1);
        $this->db->where('id', $id);
        $this->db->update('admin');
    }



                        
                            
                        
}
                        
/* End of file AdminModel.php */
    
                        