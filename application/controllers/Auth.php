<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // for login auth
    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "User Registration";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validation success
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // if user exist
        if ($user) {
            // if user active
            if ($user['is_active'] == 1) {
                //check password
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else if ($user['role_id'] == 2) {
                        redirect('user');
                    } else if ($user['role_id'] == 3) {
                        redirect('user');
                    } else if ($user['role_id'] == 4) {
                        redirect('user');
                    } else {
                        redirect('user');
                    };
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This email has not been activated! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not registered !</div>');
            redirect('auth');
        }
    }

    public function registerInpatient()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('patientMedicalRecord_id', 'Patient Medical Record ID', 'required|trim');
        $this->form_validation->set_rules('doctor_id', 'Doctor ID', 'required|trim');
        $this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
        $this->form_validation->set_rules('reference', 'Reference', 'required');
        $data['patientMedicalRecord_id'] = $this->db->get('patient_record')->result_array();
        $data['doctor_id'] = $this->db->get('doctor')->result_array();
        $data['patient'] = $this->db->get('patient')->result_array();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Register New Inpatient";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/registerInpatient');
        } else {
            $data = [
                'patientMedicalRecord_id' => $this->input->post('patientMedicalRecord_id'),
                'reference' => $this->input->post('reference'),
                'date_in' => time(),
                'date_out' => time(),
                'inpatient_status' => 1,
                'doctor_id' => $this->input->post('doctor_id'),
                'bed_id' => 0,
                'nurse_id' => 0,
                'payment_method' => $this->input->post('payment_method'),
                'room_grade' => $this->input->post('room_grade'),
                'payment_status' => 2,
                'payment_method' => $this->input->post('payment_method')
            ];
            $treatment = [
                'diagnose' => $this->input->post('diagnose'),
                'patientMedicalRecord_id' => $this->input->post('patientMedicalRecord_id'),
                'date_added' => time()
            ];

            $this->db->insert('inpatient', $data);
            $this->db->insert('inpatient_treatment', $treatment);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Patient is successfuly registered! </div>');
            redirect('auth/registerInpatient');
        }
    }

    public function registration()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already been registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont matches',
            'min_length' => 'password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = "User Registration";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Your account has been created. Please login</div>');
            redirect('auth');
        }
    }
    public function registerPatient()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('patientMedicalRecord_id', 'Patient Medical Record ID', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('phonenum', 'Phone Number', 'required');
        $this->form_validation->set_rules('patient_address', 'Address', 'required');
        $this->form_validation->set_rules('DOB', 'DOB', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        $data['patientMedicalRecord_id'] = $this->db->get('patient_record')->result_array();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Register New Patient";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/registerPatient');
        } else {
            $data = [
                'patientMedicalRecord_id' => $this->input->post('patientMedicalRecord_id'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phonenum' => $this->input->post('phonenum'),
                'date_added' => time(),
                'DOB' => $this->input->post('DOB'),
                'patient_status' => 2,
                'gender' => $this->input->post('gender'),
                'patient_address' => $this->input->post('patient_address'),
            ];

            $this->db->insert('patient', $data);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"> Patient is successfuly registered! </div>');
            redirect('auth/registerPatient');
        }
    }

    public function logout()
    {

        // clear session
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been logged out!</div>');
        redirect('auth');
    }
}
