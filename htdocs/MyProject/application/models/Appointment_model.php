
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Save a new appointment (called from the public booking form)
    public function add_appointment($data) {
        $data['created_at'] = date('Y-m-d H:i:s'); // timestamp for "when booked"
        return $this->db->insert('appointments', $data);
    }

    // Get all appointments (used in admin panel), newest first
    public function get_all_appointments() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('appointments')->result();
    }

    // Update status (confirm/cancel) from admin panel
    public function update_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update('appointments', ['status' => $status]);
    }

    // Delete an appointment
    public function delete_appointment($id) {
        return $this->db->delete('appointments', ['id' => $id]);
    }
}