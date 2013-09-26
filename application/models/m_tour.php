<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Tour extends CI_Model {

    public function ambil_data() {
        $data = $this->db->get("t_paket_tour");
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $value) {
                $hasil_tour[] = $value;
            }
            return $hasil_tour;
        } else {
            return 0;
        }
    }

    public function jumlah_data() {
        $data = $this->db->get("t_paket_tour");
        return $data->num_rows();
    }

    public function m_insert_tour() {
        $id = $this->input->post("txtID");
        $tour = $this->input->post("txtTour");
        $jenis = $this->input->post("cmbJenis");
        $tujuan = $this->input->post("txtTujuan");
        $durasi = $this->input->post("txtDurasi");
        $harga = $this->input->post("txtHarga");
        $info = $this->input->post("txtInfo");
        $cek = count($this->ambil_tour_filter($id));
        if ($cek > 0) {
            return 0;
        } else {
            $data = array(
                "id_tour" => $id,
                "nama_tour" => $tour,
                "jenis_tour" => $jenis,
                "tujuan_tour" => $tujuan,
                "durasi_tour" => $durasi,
                "harga_tour" => $harga,
                "info_kegiatan" => $info
            );
            $ret = $this->db->insert("t_paket_tour", $data);
            return $ret;
        }
    }

    public function m_update_tour($id) {
        $no = $this->input->post("txtID");
        $tour = $this->input->post("txtTour");
        $jenis = $this->input->post("cmbJenis");
        $tujuan = $this->input->post("txtTujuan");
        $durasi = $this->input->post("txtDurasi");
        $harga = $this->input->post("txtHarga");
        $info = $this->input->post("txtInfo");
            $data = array(
                "id_tour" => $no,
                "nama_tour" => $tour,
                "jenis_tour" => $jenis,
                "tujuan_tour" => $tujuan,
                "durasi_tour" => $durasi,
                "harga_tour" => $harga,
                "info_kegiatan" => $info
            );
        $this->db->where("id_tour", $id);
        $this->db->update("t_paket_tour", $data);
    }

    public function ambil_tour_filter($id) {
        return $this->db->get_where("t_paket_tour", array("id_tour" => $id))->row();
    }
    public function ambil_gambar($id) {
        $data = $this->db->query("SELECT gambar FROM t_paket_tour WHERE id_tour='$id'");
        $row = $data->result(0);
        return $row[0]["gambar"];
    }
    public function m_hapus_tour($id) {
        $ret = $this->db->delete("t_paket_tour", array("id_tour" => $id));
        return $ret;
    }

}
