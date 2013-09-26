<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Tour extends CI_Controller {

    public function tampil_daftar_tour() {
        $this->load->model("m_tour");
        $data["tour"] = $this->m_tour->ambil_data();
        $this->load->view('modul_tour/v_daftarTour.php', $data);
    }

    public function tampil_form_input($id) {
        $this->load->model("m_tour");
        $data["tour"] = $this->m_tour->ambil_tour_filter($id);
        $this->load->view("modul_tour/frmTour", $data);
    }

    public function c_insert_tour() {
        if ($this->input->post("submit")) {
            $this->load->model("m_tour");
            if ($this->m_tour->m_insert_tour()&& $this->upload()) {
                redirect("c_tour/tampil_daftar_tour");
            } else {
                $this->tampil_form_input(NULL);
            }
        } else {
            $this->tampil_form_input(NULL);
        }
    }

    //untuk fungsi menambah dan mengupdate data tour
    public function CU_tour($mode, $id) {
        switch ($mode) {
            case "ADD":
                $this->c_insert_tour();
                break;
            case "EDIT":
                if ($_POST == null) {
                    $this->tampil_form_input($id);
                } else {
                    $this->hapus_file_galeri($id);
                    $this->load->model("m_tour");
                    $this->m_tour->m_update_tour($id);
                    $this->upload();
                    redirect("c_tour/tampil_daftar_tour");
                }
                break;
        }
    }
    public function hapus_file_galeri($id) {
        $this->load->model("m_tour");
        $gambar = $this->m_tour->ambil_gambar($id);
        unlink(FCPATH . "/GALERI/" . $gambar);
    }
    public function hapus_tour($id) {
        $this->hapus_file_galeri($id);
        $this->load->model("m_tour");
        $this->m_tour->m_hapus_tour($id);
        redirect("c_tour/tampil_daftar_tour");
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
        if ($this->upload->do_upload("upload_tour")) {
            $namaFile = $this->upload->data("file_name");
            $File = $namaFile["file_name"];
            $this->db->query("UPDATE t_paket_tour SET gambar='$File' WHERE id_tour='$id'");
            return 1;
        } else {
            print_r($this->upload->display_errors());
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */