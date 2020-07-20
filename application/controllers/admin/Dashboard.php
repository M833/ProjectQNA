<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

    public function index()
    {

        if (isset($_SESSION['user_id'])) {


            $query = $this->db->query("SELECT questions.qid qid, questions.question, backenduser.first_name user_posted,
             GROUP_CONCAT( DISTINCT u2.first_name  SEPARATOR ', ' ) AS user,
             GROUP_CONCAT( DISTINCT answers.answer  SEPARATOR ', ' ) AS answer
            from questions 
            JOIN answers ON questions.qid=answers.qid 
            join backenduser on backenduser.uid=questions.uid
            JOIN backenduser u2 ON u2.uid=answers.uid 
            group by questions.question;
            ");
            $data['result'] = $query->result_array();
            $this->load->view("adminpanel/backupdashboardview", $data);
        } else {

            redirect('admin/login');
        }
    }

    function addanswer()
    {

        $answer = $_POST['answer'];

        $query = $this->db->query("INSERT INTO `answers`(`answer`) VALUES ('$answer')");

        if ($query) {
            $this->session->set_flashdata('inserted', 'yes');
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('inserted', 'no');
            redirect('admin/dashboard');
        }
    }


    function deletequ()
    {
        //print_r($_POST);

        $delete_id = $_POST['delete_id'];

        $qu = $this->db->query("DELETE FROM `questions` WHERE `qid`='$delete_id'");

        if ($qu) {
            echo "deleted";
        } else {
            echo "notdeleted";
        }

        //$this->

    }


    public function viewqu()
    {
        $query = $this->db->query("SELECT * FROM `questions` ORDER BY qid DESC");
        $data['result'] = $query->result_array();
        $this->load->view('adminpanel/viewqu', $data);
    }
    function addqu()
    {
        $this->load->view('adminpanel/addqu');
    }
    function addqu_post()
    {
        $question = $_POST['question'];
        $userid = $_SESSION['user_id'];
        $query = $this->db->query("INSERT INTO `questions`( `question`, `uid`) VALUES ('$question','$userid')");


        if ($query) {
            $this->session->set_flashdata('inserted', 'yes');
            redirect('admin/dashboard/addqu');
        } else {
            $this->session->set_flashdata('inserted', 'no');
            redirect('admin/dashboard/addqu');
        }

        //$this->load->view('upload_success', $data);
    }
    function editqu($qid)
    {

        $query = $this->db->query("SELECT `question`, `status` FROM `questions` WHERE `qid`='$qid'");

        $data['result'] = $query->result_array();
        $data['qid'] = $qid;

        $this->load->view("adminpanel/editqu", $data);
    }
    function editqu_post()
    {

        $question = $_POST['question'];
        $qid = $_POST['qid'];
        $publish_unpublish = $_POST['publish_unpublish'];


        $query = $this->db->query("UPDATE `questions` SET `question`='$question' ,`status`='$publish_unpublish' WHERE `qid`= '$qid'");

        if ($query) {

            $this->session->set_flashdata('updated', 'yes');
            redirect("admin//dashboard/viewqu");
        } else {

            $this->session->set_flashdata('updated', 'no');

            redirect("admin//dashboard/viewqu");
        }
    }
    function doaddanswer()
    {

        $userid = $_SESSION['user_id'];
        $formanswer = $this->input->post("addanswer");
        $qid = $this->input->post("qid");
        $this->load->model('ModelUsers');
        $this->ModelUsers->addanswer($formanswer, $userid, $qid);
        redirect('admin/dashboard');
    }
    function viewusers()
    {


        $all_users = $this->load->model('ModelUsers');
        $all_users = $this->ModelUsers->getUsers();
        $data = array();
        $data['backenduser'] = $all_users;
        $this->load->view('adminpanel/viewusers', $data);
    }
    function edituser()
    {
        $userid = $this->input->get("id");
        $userinfo = $this->load->model('ModelUsers');
        $userinfo = $this->ModelUsers->getUserByID($userid);
        $data = array();
        $data['userinfo'] = array_pop($userinfo);
        $this->load->view("adminpanel/edituser", $data);
    }
    function doedituser()
    {

        $formfirstname = $this->input->post("firstname");
        $formlastname = $this->input->post("lastname");
        $formemail = $this->input->post("email");
        $formpassword = $this->input->post("password");
        $formoccupation = $this->input->post("occupation");
        $formbirth = $this->input->post("birth");
        $formstatus = $this->input->post("status");
        $uid = $this->input->post("uid");

        $this->load->model('ModelUsers');
        $this->ModelUsers->edituser($uid, $formfirstname, $formlastname, $formemail, $formpassword, $formoccupation, $formbirth, $formstatus);
        redirect('admin/dashboard/viewusers');
    }
    function deleteuser()
    {
        //print_r($_POST);

        $delete_id = $_POST['delete_id'];

        $qu = $this->db->query("DELETE FROM `backenduser` WHERE `uid`='$delete_id'");

        if ($qu) {
            echo "deleted";
        } else {
            echo "notdeleted";
        }

        //$this->

    }
    function viewansweraquestion()
    {

        $query = $this->db->query("SELECT questions.qid, questions.question, backenduser.first_name 
       
       FROM questions 
       JOIN backenduser ON backenduser.uid=questions.uid
     ");
        $data['result'] = $query->result_array();
        $this->load->view("adminpanel/viewanswer", $data);
    }
    public function searchquestion()
    {
        if ($this->input->post("searchquestion")) {
            $formsearchquestion = $this->input->post("searchquestion");

            $result = $this->load->model('ModelUsers');
            $result = $this->ModelUsers->searchquestion($formsearchquestion);

            $data = array();

           
            $data['question'] = $result;

            $this->load->view('adminpanel/searchedquestion', $data);
        } else {
            $this->load->view('adminpanel/searchedquestion');
        }
    }
}
