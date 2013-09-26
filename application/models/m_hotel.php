<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Hotel extends CI_Model {

    public function ambil_data() {
        $data = $this->db->get("t_paket_hotel");
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $value) {
                $hasil_hotel[] = $value;
            }
            return $hasil_hotel;
        } else {
            return 0;
        }
    }

    public function jumlah_data() {
        $data = $this->db->get("t_paket_hotel");
        return $data->num_rows();
    }

    public function m_insert_hotel() {
        $id = $this->input->post("txtID");
        $hotel = $this->input->post("txtHotel");
        $lokasi = $this->input->post("txtLokasi");
        $alamat = $this->input->post("txtAlamat");
        $fasilitas = $this->input->post("txtFasilitas");
        $harga = $this->input->post("txtHarga");
        $info = $this->input->post("txtInfo");
        $cek = count($this->ambil_hotel_filter($id));
        if ($cek > 0) {
            return 0;
        } else {
            $data = array(
                "id_hotel" => $id,
                "nama_hotel" => $hotel,
                "lokasi_hotel" => $lokasi,
                "alamat_hotel" => $alamat,
                "fasilitas" => $fasilitas,
                "harga_paket" => $harga,
                "info_tambahan" => $info
            );
            $ret = $this->db->insert("t_paket_hotel", $data);
            return $ret;
        }
    }

    public function m_update_hotel($id) {
        $no = $this->input->post("txtID");
        $hotel = $this->input->post("txtHotel");
        $lokasi = $this->input->post("txtLokasi");
        $alamat = $this->input->post("txtAlamat");
        $fasilitas = $this->input->post("txtFasilitas");
        $harga = $this->input->post("txtHarga");
        $info = $this->input->post("txtInfo");
        $data = array(
            "id_hotel" => $no,
            "nama_hotel" => $hotel,
            "lokasi_hotel" => $lokasi,
            "alamat_hotel" => $alamat,
            "fasilitas" => $fasilitas,
            "harga_paket" => $harga,
            "info_tambahan" => $info
        );
        $this->db->where("id_hotel", $id);
        $this->db->update("t_paket_hotel", $data);
    }

    public function ambil_hotel_filter($id) {
        return $this->db->get_where("t_paket_hotel", array("id_hotel" => $id))->row();
    }

    public function ambil_gambar($id) {
        $data = $this->db->query("SELECT gambar FROM t_paket_hotel WHERE id_hotel='$id'");
        $row = $data->result(0);
        return $row[0]["gambar"];
    }

    public function m_hapus_hotel($id) {
        $ret = $this->db->delete("t_paket_hotel", array("id_hotel" => $id));
        return $ret;
    }

}
