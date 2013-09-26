<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Rental extends CI_Model {

    public function ambil_data() {
        $data = $this->db->get("t_paket_rental");
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $value) {
                $hasil_rental[] = $value;
            }
            return $hasil_rental;
        } else {
            return 0;
        }
    }

    public function jumlah_data() {
        $data = $this->db->get("t_paket_rental");
        return $data->num_rows();
    }

    public function m_insert_rental() {
        $id = $this->input->post("txtID");
        $nama = $this->input->post("txtRental");
        $jenis = $this->input->post("cmbJenis");
        $kendaraan = $this->input->post("txtKendaraan");
        $dd = $this->input->post("txtDD");
        $harga_sewa = $this->input->post("txtHargaSewa");
        $harga_sopir = $this->input->post("txtHargaSopir");
        $muat = $this->input->post("txtMuat");
        $mesin = $this->input->post("txtMesin");
        $fasilitas = $this->input->post("txtFasilitas");
        $info = $this->input->post("txtInfo");
        $cek = count($this->ambil_rental_filter($id));
        if ($cek > 0) {
            return 0;
        } else {
            $data = array(
                "id_rental" => $id,
                "nama_rental" => $nama,
                "jenis_kendaraan" => $jenis,
                "nama_kendaraan" => $kendaraan,
                "no_polisi" => $dd,
                "harga_rental" => $harga_sewa,
                "harga_sopir" => $harga_sopir,
                "kapasitas_muat" => $muat,
                "kapasitas_mesin" => $mesin,
                "fasilitas" => $fasilitas,
                "info_tambahan" => $info
            );
            $ret = $this->db->insert("t_paket_rental", $data);
            return $ret;
        }
    }

    public function m_update_rental($id) {
        $no = $this->input->post("txtID");
        $nama = $this->input->post("txtRental");
        $jenis = $this->input->post("cmbJenis");
        $kendaraan = $this->input->post("txtKendaraan");
        $dd = $this->input->post("txtDD");
        $harga_sewa = $this->input->post("txtHargaSewa");
        $harga_sopir = $this->input->post("txtHargaSopir");
        $muat = $this->input->post("txtMuat");
        $mesin = $this->input->post("txtMesin");
        $fasilitas = $this->input->post("txtFasilitas");
        $info = $this->input->post("txtInfo");
        $data = array(
            "id_rental" => $no,
            "nama_rental" => $nama,
            "jenis_kendaraan" => $jenis,
            "nama_kendaraan" => $kendaraan,
            "no_polisi" => $dd,
            "harga_rental" => $harga_sewa,
            "harga_sopir" => $harga_sopir,
            "kapasitas_muat" => $muat,
            "kapasitas_mesin" => $mesin,
            "fasilitas" => $fasilitas,
            "info_tambahan" => $info
        );
        $this->db->where("id_rental", $id);
        $this->db->update("t_paket_rental", $data);
    }

    public function ambil_rental_filter($id) {
        return $this->db->get_where("t_paket_rental", array("id_rental" => $id))->row();
    }

    public function ambil_gambar($id) {
        $data = $this->db->query("SELECT gambar FROM t_paket_rental WHERE id_rental='$id'");
        $row = $data->result(0);
        return $row[0]["gambar"];
    }

    public function m_hapus_rental($id) {
        $ret = $this->db->delete("t_paket_rental", array("id_rental" => $id));
        return $ret;
    }

}
