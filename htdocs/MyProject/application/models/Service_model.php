<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

    private $table = 'service';

    public function get_all() {
        return $this->db->order_by('id','DESC')->get($this->table)->result();
    }

    // Only active services for frontend
    public function get_active() {
        return $this->db->where('status', 1)->order_by('id','ASC')->get($this->table)->result();
    }

    public function get_by_id($id) {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }
}
