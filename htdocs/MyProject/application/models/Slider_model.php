
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

    private $table = 'slider';

    public function get_all() {
    $query = $this->db->order_by('id', 'DESC')->get($this->table);
    
    // If query failed, show a helpful error instead of crashing
    if ($query === FALSE) {
        show_error('Database query failed in Slider_model::get_all(). 
            Check: (1) database.php credentials, (2) table "slider" exists in phpMyAdmin.');
    }
    
    return $query->result();
}

    // Only active sliders for frontend
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