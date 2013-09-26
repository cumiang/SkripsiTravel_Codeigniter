<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_User extends CI_Controller {

    public function tampil_daftar_user() {
        $this->load->model("m_user");
        $data["user"] = $this->m_user->ambil_data();
        $this->load->view('modul_user/v_daftarUser.php', $data);
    }

    public function tampil_form_input($id) {
        $this->load->model("m_user");
        $data["user"] = $this->m_user->ambil_user_filter($id);
        $this->load->view("modul_user/frmUser", $data);
    }

    public function c_insert_user() {
        if ($this->input->post("submit")) {
            $this->load->model("m_user");
            if ($this->m_user->m_insert_user()) {
                redirect("c_user/tampil_daftar_user");
            } else {
                $this->tampil_form_input(NULL);
            }
        } else {
            $this->tampil_form_input(NULL);
        }
    }

    //untuk fungsi menambah dan mengupdate data user
    public function CU_user($mode, $id) {
        switch ($mode) {
            case "ADD":
                $this->c_insert_user();
                break;
            case "EDIT":
                if ($_POST == null) {
                    $this->tampil_form_input($id);
                } else {
                    $this->load->model("m_user");
                    $this->m_user->m_update_user($id);
                    redirect("c_user/tampil_daftar_user");
                }
                break;
        }
    }

    public function hapus_user($id) {
        $this->load->model("m_user");
        $this->m_user->m_hapus_user($id);
        redirect("c_user/tampil_daftar_user");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */