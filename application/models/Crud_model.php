<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model{

  public function listing($table, $order=null){
    $query = $this->db->select('*')
                      ->from($table)
                      ->get();
    return $query->result();
  }
  public function listingOne($table, $field, $where){
    $query = $this->db->select('*')
                      ->from($table)
                      ->where($field, $where)
                      ->get();
    return $query->row();
  }
  public function add($table, $data){
    $this->db->insert($table, $data);
  }

  public function edit($table, $field, $where,$data){
    $this->db->where($field, $where);
    $this->db->update($table, $data);
  }

  public function delete($table, $field, $where){
    $this->db->where($field, $where);
    $this->db->delete($table);
  }

  public function login($username, $password){
		$this->db->select('*')
				 ->from('tbl_admin')
				 ->where(array('username' 	=> $username,
							          'password'	=> md5($password)));
		$query = $this->db->get();
		return $query->row();
	}
}
