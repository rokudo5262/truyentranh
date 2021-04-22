<?php
class staff_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	function get() {
        $query = $this->db->get('staff');
        return $query->result();
    }
	function get_staff($id) {
        $query = $this->db->get('staff')->where('id_staff',$id)->where('deleted','0');
        return $query->result();
    }
	public function update_status($id,$data) {
		$this->db->where('id_staff',$id);
		$this->db->update('staff',$data);
	}
}