<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Rental extends CI_Controller {

    public function tampil_daftar_rental() {
        $this->load->model("m_rental");
        $data["rental"] = $this->m_rental->ambil_data();
        $this->load->view('modul_rental/v_daftarRental.php', $data);
    }

    public function tampil_form_input($id) {
        $this->load->model("m_rental");
        $data["rental"] = $this->m_rental->ambil_rental_filter($id);
        $this->load->view("modul_rental/frmRental", $data);
    }

    public function c_insert_rental() {
        if ($this->input->post("submit")) {
            $this->load->model("m_rental");
            if ($this->m_rental->m_insert_rental() && $this->upload()) {
                redirect("c_rental/tampil_daftar_rental");
            } else {
               $this->tampil_form_input(NULL);
            }
        } else {
            $this->tampil_form_input(NULL);
        }
    }

    //untuk fungsi menambah dan mengupdate data rental
    public function CU_rental($mode, $id) {
        switch ($mode) {
            case "ADD":
                $this->c_insert_rental();
                break;
            case "EDIT":
                if ($_POST == null) {
                    $this->tampil_form_input($id);
                } else {
                    $this->hapus_file_galeri($id);
                    $this->load->model("m_rental");
                    $this->m_rental->m_update_rental($id);
                    $this->upload();
                    redirect("c_rental/tampil_daftar_rental");
                }
                break;
        }
    }
    public function hapus_file_galeri($id) {
        $this->load->model("m_rental");
        $gambar = $this->m_rental->ambil_gambar($id);
        unlink(FCPATH . "/GALERI/" . $gambar);
    }
    public function hapus_rental($id) {
        $this->hapus_file_galeri($id);
        $this->load->model("m_rental");
        $this->m_rental->m_hapus_rental($id);
        redirect("c_rental/tampil_daftar_rental");
    }
    public function upload() {
        $id = $this->input->post("txtID");
        //$config["file_name"] = $id . ".png";
        $config["upload_path"] = "./GALERI";
        $config["allowed_types"] = "gif|jpg|png|bmp|jpeg";
        $config["overwrite"] = true;
        $config["max_size"] = "256000";
        $config["max_width"] = "400";
        $config["max_height"] = "300";
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("upload_rental")) {
            $namaFile = $this->upload->data("file_name");
            $File = $namaFile["file_name"];
            $this->db->query("UPDATE t_paket_rental SET gambar='$File' WHERE id_rental='$id'");
            return 1;
        } else {
            print_r($this->upload->display_errors());
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */