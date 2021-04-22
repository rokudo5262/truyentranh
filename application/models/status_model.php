<?php
class staff_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	function get() {
        $query = $this->db->get('status');
        return $query->result();
    }
	public function update_status($id,$data) {
		$this->db->where('id_status',$id);
		$this->db->update('status',$data);
	}
}