<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Pelanggan extends CI_Model {

    public function ambil_data() {
        $data = $this->db->get("t_pelanggan");
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $value) {
                $hasil_pelanggan[] = $value;
            }
            return $hasil_pelanggan;
        } else {
            return 0;
        }
    }

    public function jumlah_data() {
        $data = $this->db->get("t_pelanggan");
        return $data->num_rows();
    }

    public function m_insert_pelanggan() {
        $id = $this->input->post("txtID");
        $pelanggan = $this->input->post("txtPelanggan");
        $ktp = $this->input->post("txtKTP");
        $alamat = $this->input->post("txtAlamat");
        $telp = $this->input->post("txtTelp");
        $email = $this->input->post("txtEmail");
        $cek = count($this->ambil_pelanggan_filter($id));
        if ($cek > 0) {
            return 0;
        } else {
            $data = array(
                "id_pelanggan" => $id,
                "nama_pelanggan" => $pelanggan,
                "ktp" => $ktp,
                "alamat" => $alamat,
                "telp" => $telp,
                "email" => $email
            );
            $ret = $this->db->insert("t_pelanggan", $data);
            return $ret;
        }
    }

    public function m_update_pelanggan($id) {
        $no = $this->input->post("txtID");
        $pelanggan = $this->input->post("txtPelanggan");
        $ktp = $this->input->post("txtKTP");
        $alamat = $this->input->post("txtAlamat");
        $telp = $this->input->post("txtTelp");
        $email = $this->input->post("txtEmail");
            $data = array(
                "id_pelanggan" => $no,
                "nama_pelanggan" => $pelanggan,
                "ktp" => $ktp,
                "alamat" => $alamat,
                "telp" => $telp,
                "email" => $email
            );
        $this->db->where("id_pelanggan", $id);
        $this->db->update("t_pelanggan", $data);
    }

    public function ambil_pelanggan_filter($id) {
        return $this->db->get_where("t_pelanggan", array("id_pelanggan" => $id))->row();
    }

    public function m_hapus_pelanggan($id) {
        $ret = $this->db->delete("t_pelanggan", array("id_pelanggan" => $id));
        return $ret;
    }

}
