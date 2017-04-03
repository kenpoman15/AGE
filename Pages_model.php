<?php
class Pages_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_sections()
	{
		$query = $this->db->query("SELECT * FROM section");
		return $query->result_array();
	}
	public function get_section($title)
	{
		$query = $this->db->query(
				"SELECT * FROM section
				JOIN text ON TXT_SNUM = SEC_NUM 
				WHERE SEC_TITLE = '$title'" 
				);
		return $query->row_array();
	}
	public function get_chapters()
	{
		$query = $this->db->query("SELECT * FROM chapter");
		return $query->result_array();
	}
}