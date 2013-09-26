<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Hotel extends CI_Controller {

    public function tampil_daftar_hotel() {
        $this->load->model("m_hotel");
        $data["hotel"] = $this->m_hotel->ambil_data();
        $this->load->view('modul_hotel/v_daftarHotel.php', $data);
    }

    public function tampil_form_input($id) {
        $this->load->model("m_hotel");
        $data["hotel"] = $this->m_hotel->ambil_hotel_filter($id);
        $this->load->view("modul_hotel/frmHotel", $data);
    }

    public function c_insert_hotel() {
        if ($this->input->post("submit")) {
            $this->load->model("m_hotel");
            if ($this->m_hotel->m_insert_hotel() && $this->upload()) {
                redirect("c_hotel/tampil_daftar_hotel");
            } else {
                $this->tampil_form_input(NULL);
            }
        } else {
            $this->tampil_form_input(NULL);
        }
    }

    //untuk fungsi menambah dan mengupdate data hotel
    public function CU_hotel($mode, $id) {
        switch ($mode) {
            case "ADD":
                $this->c_insert_hotel();
                break;
            case "EDIT":
                if ($_POST == null) {
                    $this->tampil_form_input($id);
                } else {
                    $this->hapus_file_galeri($id);
                    $this->load->model("m_hotel");
                    $this->m_hotel->m_update_hotel($id);
                    $this->upload();
                    redirect("c_hotel/tampil_daftar_hotel");
                }
                break;
        }
    }

    public function hapus_file_galeri($id) {
        $this->load->model("m_hotel");
        $gambar = $this->m_hotel->ambil_gambar($id);
        unlink(FCPATH . "/GALERI/" . $gambar);
    }

    public function hapus_hotel($id) {
        //$this->load->helper("file");
        $this->hapus_file_galeri($id);
        $this->load->model("m_hotel");
        $this->m_hotel->m_hapus_hotel($id);
        redirect("c_hotel/tampil_daftar_hotel");
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
        if ($this->upload->do_upload()) {
            $namaFile = $this->upload->data("file_name");
            $File = $namaFile["file_name"];
            $this->db->query("UPDATE t_paket_hotel SET gambar='$File' WHERE id_hotel='$id'");
            return 1;
        } else {
            return 0;
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */