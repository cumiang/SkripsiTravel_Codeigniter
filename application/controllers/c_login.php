<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Login extends CI_Controller {

    function c_login(){
        parent::__construct();
        $this->load->model("m_login");
        $this->load->library("session");
    }
    function index(){
        $this->load->view("login-admin");
    }
    function cek_user_admin(){
        $data["ada"]= $this->m_login->m_cekdb_admin();
        if($data["ada"]== NULL ){
            return 0;
        }else{
            return 1;
        }
    }
    
    function login(){
        $user = $this->input->post("user");
        if($this->cek_user_admin()){
            $this->session->set_userdata("user",$user);
            $this->session->set_userdata("status","valid");
            $this->load->view("index");
        }else{
            $this->index();
        }
    }
    function logout(){
        $this->session->sess_destroy();
        $this->index();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */