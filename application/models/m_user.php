<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_User extends CI_Model {

    public function ambil_data() {
        $data = $this->db->get("t_user");
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $value) {
                $hasil_user[] = $value;
            }
            return $hasil_user;
        } else {
            return 0;
        }
    }

    public function jumlah_data() {
        $data = $this->db->get("t_user");
        return $data->num_rows();
    }

    public function m_insert_user() {
        $id = $this->input->post("txtID");
        $user = $this->input->post("txtUser");
        $pass = $this->input->post("txtPass");
        $level = $this->input->post("cmbLevel");
        $cek = count($this->ambil_user_filter($id));
        if ($cek > 0) {
            return 0;
        } else {
            $data = array(
                "id_user" => $id,
                "nama_user" => preg_replace('/\s+/', '', $user),
                "password" => $pass,
                "level" => $level
            );
            $ret = $this->db->insert("t_user", $data);
            return $ret;
        }
    }

    public function m_update_user($id) {
        $no = $this->input->post("txtID");
        $user = $this->input->post("txtUser");
        $pass = $this->input->post("txtPass");
        $level = $this->input->post("cmbLevel");
        $data = array(
            "id_user" => $no,
            "nama_user" => $user,
            "password" => $pass,
            "level" => $level
        );
        $this->db->where("id_user", $id);
        $this->db->update("t_user", $data);
    }

    public function ambil_user_filter($id) {
        return $this->db->get_where("t_user", array("id_user" => $id))->row();
    }

    public function m_hapus_user($id) {
        $ret = $this->db->delete("t_user", array("id_user" => $id));
        return $ret;
    }

}
