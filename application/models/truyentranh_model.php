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
	public function update_artist($id,$data)
	{
		$this->db->where('id_artist',$id);
		$this->db->update('artist',$data);
	}
	public function update_genre($id,$data)
	{
		$this->db->where('id_genre',$id);
		$this->db->update('genre',$data);
	}
	public function update_type($id,$data)
	{
		$this->db->where('id_type',$id);
		$this->db->update('type',$data);
	}
	public function update_status($id,$data)
	{
		$this->db->where('id_status',$id);
		$this->db->update('status',$data);
	}
	public function update_book($id,$data)
	{
		$this->db->where('id_book',$id);
		$this->db->update('book',$data);
	}
	public function update_user($id,$data)
	{
		$this->db->where('id_user',$id);
		$this->db->update('user',$data);
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