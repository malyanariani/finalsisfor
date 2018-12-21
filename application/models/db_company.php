<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class db_company extends CI_Model
{
	public function get_company()
	{
		$query = $this->db->get('company');
		return $query;
	}

	public function input_data($data,$table)
	{
		$this->db->insert($table,$data);
	}
	
	public function edit_data($where,$table)
	{		
	return $this->db->get_where($table,$where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	public function ambildata($nama, $no_tlp, $email, $alamat, $table)
	{
		$this->db->where('name =', $nama);
		$this->db->or_where('no_tlp=', $no_tlp);
		$this->db->or_where('email =', $email);
		$this->db->or_where('alamat =', $alamat);
		$this->db->get($table); 
	}
}
?>