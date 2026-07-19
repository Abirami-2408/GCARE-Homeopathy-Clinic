<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Appointment_model');
        $this->load->library('form_validation');
    }

    // Shows the booking form — this is what your "Book Appointment" button should link to
    public function index() {
        $this->load->view('frontend/book_appointment');
    }

    // Handles form submission (POST)
    public function submit() {
        // Validation rules — server-side, never trust the frontend alone
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('preferred_date', 'Preferred Date', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Validation failed — reload form with errors
            $this->load->view('frontend/book_appointment');
            return;
        }

        $data = [
            'name'           => $this->input->post('name'),
            'phone'          => $this->input->post('phone'),
            'email'          => $this->input->post('email'),
            'preferred_date' => $this->input->post('preferred_date'),
            'message'        => $this->input->post('message'),
        ];

        if ($this->Appointment_model->add_appointment($data)) {
            $this->session->set_flashdata('success', 'Appointment booked successfully! We will contact you soon.');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        }

        redirect('appointment');
    }
}
