
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   public function __construct() {
    parent::__construct();

    $this->load->library('session');

    // ✅ Block access if not logged in
    if (!$this->session->userdata('admin_logged_in')) {
        redirect('auth/login');
    }

    $this->load->model('Slider_model');
    $this->load->model('Service_model');
    $this->load->model('Review_model');
    $this->load->library(['form_validation']);
    $this->load->helper(['url', 'form']);
}
    public function dashboard() {
    // Count totals for dashboard cards
    $data['total_sliders']  = $this->db->where('status', 1)->count_all_results('slider');
    $data['total_services'] = $this->db->where('status', 1)->count_all_results('service');
    $data['total_reviews']  = $this->db->where('status', 1)->count_all_results('review');

    $this->load->view('admin/layouts/header');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('admin/layouts/footer');
}

// Also add this so /admin alone works
public function index() {
    redirect('admin/dashboard');
}

    // ─────────────────────────────────────────────────────────────────
    // PRIVATE HELPER: Upload image
    //
    // Returns:
    //   string  — filename on success (could be '' if no file chosen)
    //   FALSE   — upload was attempted but FAILED (show error to user)
    //
    // BUG FIX (Review): photo is OPTIONAL. When no file is chosen,
    // $_FILES['photo']['name'] is empty — we return '' (empty string),
    // NOT false. The old code treated '' as a failed upload and blocked
    // the review from being saved.
    // ─────────────────────────────────────────────────────────────────
    private function _upload($field_name, $folder) {

        // No file chosen → return empty string (keep old value / save NULL)
        if (empty($_FILES[$field_name]['name'])) {
            return '';
        }

        // BUG FIX (Slider image path): FCPATH points to the web root
        // (htdocs/MyProject/). Using FCPATH ensures the folder is created
        // under the correct absolute path, not relative to CodeIgniter's
        // application/ directory which caused "path does not exist" errors.
        $upload_path = FCPATH . 'assets/uploads/' . $folder . '/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, TRUE);
        }

        $config = [
            'upload_path'   => $upload_path,
            'allowed_types' => 'jpg|jpeg|png|gif|webp',
            'max_size'      => 2048,       // 2 MB
            'encrypt_name'  => TRUE,       // avoids filename collisions
        ];

        // BUG FIX: In CI3, if you load 'upload' more than once in the
        // same request (e.g. add service also uploads an icon), the
        // library instance is reused and retains the old config.
        // Always call initialize() to reset the config for this upload.
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        }

        // Upload was attempted but failed — store error and return FALSE
        $this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
        return FALSE;
    }

    private function _delete_file($folder, $filename) {
        if ($filename) {
            $path = FCPATH . 'assets/uploads/' . $folder . '/' . $filename;
            if (file_exists($path)) unlink($path);
        }
    }

    // =========================================================
    // SLIDER  (DB: id, title, subtitle, image, status, created_at)
    // =========================================================

    public function manage_slider() {
        $data['sliders'] = $this->Slider_model->get_all();
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/slider/manage', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function add_slider() {
        if ($this->input->post()) {

            // Slider image is REQUIRED
            $image = $this->_upload('image', 'sliders');

            if ($image === FALSE) {
                // Upload failed — error already in flashdata
                $this->load->view('admin/layouts/header');
                $this->load->view('admin/slider/add');
                $this->load->view('admin/layouts/footer');
                return;
            }

            // BUG FIX: If the user submitted the form without choosing a
            // file, $image is '' (empty string). For a slider the image
            // IS required, so we catch that case here and show a message
            // instead of inserting a row with an empty image column.
            if ($image === '') {
                $this->session->set_flashdata('error', 'Please select a slider image.');
                $this->load->view('admin/layouts/header');
                $this->load->view('admin/slider/add');
                $this->load->view('admin/layouts/footer');
                return;
            }

            $this->Slider_model->insert([
                'title'    => $this->input->post('title',    TRUE),
                'subtitle' => $this->input->post('subtitle', TRUE),
                'image'    => $image,
                'status'   => $this->input->post('status',   TRUE),
            ]);

            $this->session->set_flashdata('success', 'Slider added successfully.');
            redirect('admin/manage_slider');
        }

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/slider/add');
        $this->load->view('admin/layouts/footer');
    }

    public function edit_slider($id) {
        $slider = $this->Slider_model->get_by_id($id);
        if (!$slider) {
            $this->session->set_flashdata('error', 'Slider not found.');
            redirect('admin/manage_slider');
        }

        if ($this->input->post()) {
            $image = $this->_upload('image', 'sliders');

            if ($image === FALSE) {
                $data['slider'] = $slider;
                $this->load->view('admin/layouts/header');
                $this->load->view('admin/slider/edit', $data);
                $this->load->view('admin/layouts/footer');
                return;
            }

            // '' means no new file chosen — keep old image
            if ($image === '') {
                $image = $slider->image;
            } else {
                // New image uploaded — delete the old one
                $this->_delete_file('sliders', $slider->image);
            }

            $this->Slider_model->update($id, [
                'title'    => $this->input->post('title',    TRUE),
                'subtitle' => $this->input->post('subtitle', TRUE),
                'image'    => $image,
                'status'   => $this->input->post('status',   TRUE),
            ]);

            $this->session->set_flashdata('success', 'Slider updated.');
            redirect('admin/manage_slider');
        }

        $data['slider'] = $slider;
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/slider/edit', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function delete_slider($id) {
        $slider = $this->Slider_model->get_by_id($id);
        if ($slider) {
            $this->_delete_file('sliders', $slider->image);
            $this->Slider_model->delete($id);
            $this->session->set_flashdata('success', 'Slider deleted.');
        }
        redirect('admin/manage_slider');
    }

    // =========================================================
    // SERVICE  (DB: id, name, description, icon, image, status, created_at)
    // =========================================================

    public function manage_service() {
        $data['services'] = $this->Service_model->get_all();
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/service/manage', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function add_service() {
        if ($this->input->post()) {
            $image = $this->_upload('image', 'services');

            if ($image === FALSE) {
                $this->load->view('admin/layouts/header');
                $this->load->view('admin/service/add');
                $this->load->view('admin/layouts/footer');
                return;
            }

            $this->Service_model->insert([
                'name'        => $this->input->post('name',        TRUE),
                'description' => $this->input->post('description', TRUE),
                'icon'        => $this->input->post('icon',        TRUE),
                'image'       => $image,   // '' is fine — image is optional for service
                'status'      => $this->input->post('status',      TRUE),
            ]);

            $this->session->set_flashdata('success', 'Service added successfully.');
            redirect('admin/manage_service');
        }

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/service/add');
        $this->load->view('admin/layouts/footer');
    }

    public function edit_service($id) {
        $service = $this->Service_model->get_by_id($id);
        if (!$service) {
            $this->session->set_flashdata('error', 'Service not found.');
            redirect('admin/manage_service');
        }

        if ($this->input->post()) {
            $image = $this->_upload('image', 'services');

            if ($image === FALSE) {
                $data['service'] = $service;
                $this->load->view('admin/layouts/header');
                $this->load->view('admin/service/edit', $data);
                $this->load->view('admin/layouts/footer');
                return;
            }

            if ($image === '') {
                $image = $service->image;
            } else {
                $this->_delete_file('services', $service->image);
            }

            $this->Service_model->update($id, [
                'name'        => $this->input->post('name',        TRUE),
                'description' => $this->input->post('description', TRUE),
                'icon'        => $this->input->post('icon',        TRUE),
                'image'       => $image,
                'status'      => $this->input->post('status',      TRUE),
            ]);

            $this->session->set_flashdata('success', 'Service updated.');
            redirect('admin/manage_service');
        }

        $data['service'] = $service;
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/service/edit', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function delete_service($id) {
        $service = $this->Service_model->get_by_id($id);
        if ($service) {
            $this->_delete_file('services', $service->image);
            $this->Service_model->delete($id);
            $this->session->set_flashdata('success', 'Service deleted.');
        }
        redirect('admin/manage_service');
    }

    // =========================================================
    // REVIEW  (DB: id, patient_name, review, rating, photo, status, created_at)
    // =========================================================

    public function manage_review() {
        $data['reviews'] = $this->Review_model->get_all();
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/review/manage', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function add_review() {
        if ($this->input->post()) {

            // BUG FIX — THE MAIN REVIEW BUG:
            // Previously the code checked: if ($photo === FALSE) { ... return; }
            // But _upload() returns '' (empty string) when no file is chosen.
            // In PHP, empty string is FALSY, so `=== FALSE` is fine as a strict
            // check — but the old code used loose `== FALSE` which matches '' too!
            // That caused every review WITHOUT a photo to be silently blocked.
            //
            // Fix: use strict === FALSE comparison. '' means "no photo chosen",
            // which is perfectly valid since photo is optional for reviews.
            $photo = $this->_upload('photo', 'reviews');

            if ($photo === FALSE) {
                // A file WAS chosen but upload failed (wrong type, too large, etc.)
                $this->load->view('admin/layouts/header');
                $this->load->view('admin/review/add');
                $this->load->view('admin/layouts/footer');
                return;
            }

            // $photo is now either '' (no file) or a filename string — both OK
            $this->Review_model->insert([
                'patient_name' => $this->input->post('patient_name', TRUE),
                'review'       => $this->input->post('review',       TRUE),
                'rating'       => (int) $this->input->post('rating', TRUE),
                'photo'        => $photo,    // '' or filename — both valid
                'status'       => $this->input->post('status',       TRUE),
            ]);

            $this->session->set_flashdata('success', 'Review added successfully.');
            redirect('admin/manage_review');
        }

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/review/add');
        $this->load->view('admin/layouts/footer');
    }

    public function edit_review($id) {
        $review = $this->Review_model->get_by_id($id);
        if (!$review) {
            $this->session->set_flashdata('error', 'Review not found.');
            redirect('admin/manage_review');
        }

        if ($this->input->post()) {
            $photo = $this->_upload('photo', 'reviews');

            if ($photo === FALSE) {
                $data['review'] = $review;
                $this->load->view('admin/layouts/header');
                $this->load->view('admin/review/edit', $data);
                $this->load->view('admin/layouts/footer');
                return;
            }

            if ($photo === '') {
                $photo = $review->photo;  // keep existing photo
            } else {
                $this->_delete_file('reviews', $review->photo);  // delete old photo
            }

            $this->Review_model->update($id, [
                'patient_name' => $this->input->post('patient_name', TRUE),
                'review'       => $this->input->post('review',       TRUE),
                'rating'       => (int) $this->input->post('rating', TRUE),
                'photo'        => $photo,
                'status'       => $this->input->post('status',       TRUE),
            ]);

            $this->session->set_flashdata('success', 'Review updated.');
            redirect('admin/manage_review');
        }

        $data['review'] = $review;
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/review/edit', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function delete_review($id) {
        $review = $this->Review_model->get_by_id($id);
        if ($review) {
            $this->_delete_file('reviews', $review->photo);
            $this->Review_model->delete($id);
            $this->session->set_flashdata('success', 'Review deleted.');
        }
        redirect('admin/manage_review');
    }
    public function login() {
    // If user is already logged in, send them straight to the dashboard
    if ($this->session->userdata('logged_in')) {
        redirect('admin/dashboard');
    }

   // If the form was submitted
    if ($this->input->post()) {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        // Replace 'admin' and 'password123' with your actual validation logic/DB check
        if ($username === 'admin' && $password === 'password123') {
            $this->session->set_userdata('logged_in', TRUE);
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password.');
            redirect('admin/login');
        }
    }

    // Load the login view we just created
    $this->load->view('admin/login'); 
}
    public function logout() {
        // Destroy all session data (logs the admin out)
        $this->session->sess_destroy();
        
        // Redirect back to your admin login page or homepage
        // Make sure 'admin/login' matches your actual login route
        redirect('admin/login'); 
    }

}
