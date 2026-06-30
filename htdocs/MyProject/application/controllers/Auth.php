<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function login() {
        // If already logged in, go straight to dashboard
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }

        if ($this->input->post()) {

            // trim() removes accidental spaces from typing
            $username = trim($this->input->post('username', TRUE));
            $password = trim($this->input->post('password', TRUE));

            // Admin credentials
            $valid_username = 'admin';
            $valid_password = 'password123';

            if ($username === $valid_username && $password === $valid_password) {
                $this->session->set_userdata([
                    'admin_logged_in' => TRUE,
                    'admin_username'  => $username,
                ]);
                redirect('admin/dashboard');

            } else {
                $this->session->set_flashdata('error', 'Invalid username or password.');
                redirect('auth/login');
            }
        }

        $this->load->view('auth/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
