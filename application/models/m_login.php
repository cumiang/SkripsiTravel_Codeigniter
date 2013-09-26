<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Login extends CI_Model {

    public function m_cekdb_admin() {
        $user = $this->input->POST("user");
        $pass = $this->input->POST("pass");
        $this->db->where("nama_user", $user);
        $this->db->where("password", $pass);
        $this->db->where("level", "Admin");//set level Admin atau Member
        $kueri=$this->db->get("t_user");
        return $kueri->result();
                
    }


}
