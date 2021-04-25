<?php
class admin_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
    public function staff_signin($gmail,$password) {    
        $this->db->where('gmail_staff',$gmail);
        $this->db->where('password_staff',$password);
        $this->db->where('deleted','0');
        return $this->db->get('staff')->result_array();
    }
    public function user_signin($gmail,$password) {    
        $this->db->where('gmail_staff',$gmail);
        $this->db->where('password_staff',$password);
        $this->db->where('deleted','0');
        return $this->db->get('user')->result_array();
    }
}