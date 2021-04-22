<?php
class type_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	function get() {
        $query = $this->db->get('type');
        return $query->result();
    }
    public function update_type($id,$data) {
		$this->db->where('id_type',$id);
		$this->db->update('type',$data);
	}
}