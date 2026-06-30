<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->model('Service_model');
        $this->load->model('Review_model');
        $this->load->helper(['url']);
    }

    public function index() {
        // Only fetch active (status=1) records for frontend
        $data['sliders']  = $this->Slider_model->get_active();
        $data['services'] = $this->Service_model->get_active();
        $data['reviews']  = $this->Review_model->get_active();
        $this->load->view('frontend/home', $data);
    }
}