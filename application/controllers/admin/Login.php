<?php

use function PHPSTORM_META\registerArgumentsSet;

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        if (isset($_SESSION['user_id'])) {

            redirect("admin/dashboard");
        }
        $data = [];
        if (isset($_SESSION['error'])) {
            // die($_SESSION['error']);

            $data['error'] = $_SESSION['error'];
        } else {

            $data['error'] = "NO _ERROR";
        }

        $this->load->view('adminpanel/loginview', $data);
    }


    function login_post()
    {
        if (isset($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = $this->db->query("SELECT * FROM `backenduser` WHERE email='$email' AND password='$password'");

            //print_r($_POST);

            if ($query->num_rows()) {
                $result = $query->result_array();
                //echo "<pre>";
                //print_r($result);
                $this->session->set_userdata('user_id', $result[0]['uid']);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Wrong unsername or password');
                redirect("admin/login   ");
            }
        } else {
            die("Invalid Input!");
        }
    }

    function signup()
    {

        $this->load->view('adminpanel/loginview');
    }
    function signup_post()
    {

        //  $email = $this->input->post("email");
        // $password = $this->input->post("password");
        // $register = $this->load->model('ModelUsers');
        //  $register = $this->ModelUsers->add_temp_user($email, $password);

        //  redirect("login");


        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('birth', 'Birth date', 'required|trim');
        $this->form_validation->set_rules('occupation', 'Occupation', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', "required|trim");
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');

        if ($this->form_validation->run()) {
            //echo "pass";
            //generate random key

            //  $this->load->library('email', array('mailtype' => 'html'));
            // $this->email->from('mandoexpress1388@gmail.com', "Mando");
            // $this->email->to($this->input->post('email'));
            // $this->email->subject('Confirm your account.');
            // $message = "<p> Thank you for signning up!</p>";
            // $message .= "<p><a href='" . base_url() . "login/register_usesr/signup/$key' > Click here</a>
            // to confirm your account </p>";
            // $this->email->message($message);

            $register = $this->load->model('ModelUsers');
            $register = $this->ModelUsers->add_user();

            if ($register == true) {
                // if ($this->email->send()) {

                echo "<script>
                    alert('registered succusfully! please login in again with your new email & pass');
                    window.location.assign('index');
                    </script>";
                // $message = "registered succusfully! please login in again with your new email & pass";
                // echo "<script type='text/javascript'>alert('$message');</script>";
                //echo "please login again with your new email and password";

                //}
                //  else {
                //   echo "could not send the email.";
                // }
            } else {
                echo "Problem adding to database.";
            }
        }

        //else {
        //print_r($_POST);
        // echo "the information not valid";
        // redirect('login');
        //}
    }
    function logout()
    {
        session_destroy();
        redirect("admin/login");
    }
}
