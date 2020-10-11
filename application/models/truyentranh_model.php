<?php
class truyentranh_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function query($query)
	{
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function insert($table,$data)
	{
		$id=$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	public function check($gmail)
	{
	    $this->db->select('*'); 
	    $this->db->from('user');
	    $this->db->where('gmail_user', $gmail);
	    $query = $this->db->get();
	    $result = $query->result_array();
	    return $result;
	}
}