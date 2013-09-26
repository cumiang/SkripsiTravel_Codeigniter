<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Pelanggan extends CI_Controller {

    public function tampil_daftar_pelanggan() {
        $this->load->model("m_pelanggan");
        $data["pelanggan"] = $this->m_pelanggan->ambil_data();
        $this->load->view('modul_pelanggan/v_daftarPelanggan.php', $data);
    }

    public function tampil_form_input($id) {
        $this->load->model("m_pelanggan");
        $data["pelanggan"] = $this->m_pelanggan->ambil_pelanggan_filter($id);
        $this->load->view("modul_pelanggan/frmPelanggan", $data);
    }

    public function c_insert_pelanggan() {
        if ($this->input->post("submit")) {
            $this->load->model("m_pelanggan");
            if ($this->m_pelanggan->m_insert_pelanggan()) {
                redirect("c_pelanggan/tampil_daftar_pelanggan");
            } else {
                $this->tampil_form_input(NULL);
            }
        } else {
            $this->tampil_form_input(NULL);
        }
    }

    //untuk fungsi menambah dan mengupdate data pelanggan
    public function CU_pelanggan($mode, $id) {
        switch ($mode) {
            case "ADD":
                $this->c_insert_pelanggan();
                break;
            case "EDIT":
                if ($_POST == null) {
                    $this->tampil_form_input($id);
                } else {
                    $this->load->model("m_pelanggan");
                    $this->m_pelanggan->m_update_pelanggan($id);
                    redirect("c_pelanggan/tampil_daftar_pelanggan");
                }
                break;
        }
    }

    public function hapus_pelanggan($id) {
        $this->load->model("m_pelanggan");
        $this->m_pelanggan->m_hapus_pelanggan($id);
        redirect("c_pelanggan/tampil_daftar_pelanggan");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */