<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Tiket extends CI_Model {

    public function ambil_data() {
        $data = $this->db->get("t_paket_tiket");
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $value) {
                $hasil_tiket[] = $value;
            }
            return $hasil_tiket;
        } else {
            return 0;
        }
    }

    public function jumlah_data() {
        $data = $this->db->get("t_paket_tiket");
        return $data->num_rows();
    }

    public function m_insert_tiket() {
        $id = $this->input->post("txtID");
        $jenis = $this->input->post("cmbJenis");
        $maskapai = $this->input->post("cmbMaskapai");
        $asal = $this->input->post("txtAsal");
        $tujuan = $this->input->post("txtTujuan");
        $jadwal = $this->input->post("txtJadwal");
        $harga = $this->input->post("txtHarga");
        $status = $this->input->post("cmbStatus");
        $cek = count($this->ambil_tiket_filter($id));
        if ($cek > 0) {
            return 0;
        } else {
            $data = array(
                "id_tiket" => $id,
                "jenis_tiket" => $jenis,
                "maskapai" => $maskapai,
                "asal" => $asal,
                "tujuan" => $tujuan,
                "jadwal" => $jadwal,
                "harga" => $harga,
                "status" => $status
            );
            $ret = $this->db->insert("t_paket_tiket", $data);
            return $ret;
        }
    }

    public function m_update_tiket($id) {
        $no = $this->input->post("txtID");
        $jenis = $this->input->post("cmbJenis");
        $maskapai = $this->input->post("cmbMaskapai");
        $asal = $this->input->post("txtAsal");
        $tujuan = $this->input->post("txtTujuan");
        $jadwal = $this->input->post("txtJadwal");
        $harga = $this->input->post("txtHarga");
        $status = $this->input->post("cmbStatus");
            $data = array(
                "id_tiket" => $no,
                "jenis_tiket" => $jenis,
                "maskapai" => $maskapai,
                "asal" => $asal,
                "tujuan" => $tujuan,
                "jadwal" => $jadwal,
                "harga" => $harga,
                "status" => $status
            );
        $this->db->where("id_tiket", $id);
        $this->db->update("t_paket_tiket", $data);
    }

    public function ambil_tiket_filter($id) {
        return $this->db->get_where("t_paket_tiket", array("id_tiket" => $id))->row();
    }

    public function m_hapus_tiket($id) {
        $ret = $this->db->delete("t_paket_tiket", array("id_tiket" => $id));
        return $ret;
    }

}
