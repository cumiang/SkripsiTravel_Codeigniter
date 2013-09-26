<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Tiket extends CI_Controller {

    public function tampil_daftar_tiket() {
        $this->load->model("m_tiket");
        $data["tiket"] = $this->m_tiket->ambil_data();
        $this->load->view('modul_tiket/v_daftarTiket.php', $data);
    }

    public function tampil_form_input($id) {
        $this->load->model("m_tiket");
        $data["tiket"] = $this->m_tiket->ambil_tiket_filter($id);
        $this->load->view("modul_tiket/frmTiket", $data);
    }

    public function c_insert_tiket() {
        if ($this->input->post("submit")) {
            $this->load->model("m_tiket");
            if ($this->m_tiket->m_insert_tiket()) {
                redirect("c_tiket/tampil_daftar_tiket");
            } else {
                $this->tampil_form_input(NULL);
            }
        } else {
            $this->tampil_form_input(NULL);
        }
    }

    //untuk fungsi menambah dan mengupdate data tiket
    public function CU_tiket($mode, $id) {
        switch ($mode) {
            case "ADD":
                $this->c_insert_tiket();
                break;
            case "EDIT":
                if ($_POST == null) {
                    $this->tampil_form_input($id);
                } else {
                    $this->load->model("m_tiket");
                    $this->m_tiket->m_update_tiket($id);
                    redirect("c_tiket/tampil_daftar_tiket");
                }
                break;
        }
    }

    public function hapus_tiket($id) {
        $this->load->model("m_tiket");
        $this->m_tiket->m_hapus_tiket($id);
        redirect("c_tiket/tampil_daftar_tiket");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */