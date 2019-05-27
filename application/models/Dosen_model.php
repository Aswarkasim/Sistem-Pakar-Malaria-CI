<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

    function read(){
        return $this->db->query("SELECT * FROM login")->result();
    }

}

