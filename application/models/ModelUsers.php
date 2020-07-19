<?php

class ModelUsers extends CI_Model
{

    function add_user()
    {
        //print_r($_POST);
        //$sql = "INSERT INTO `temp_users`(`email`, `password`) VALUES ('$email','$password')";
        // $query = $this->db->query($sql);

        // $query = $this->db->query("INSERT INTO `temp_users`( `email`, `password`) VALUES ('$email','$password')");

        $data = array(

            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'birth' => $this->input->post('birth'),
            'occupation' => $this->input->post('occupation'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );
        $query = $this->db->insert('backenduser', $data);
        //  $query = "INSERT INTO table (".$columns.") VALUES (".$values.")";
        //$query = $this->db->query("INSERT INTO `temp_users`( `email`, `password`) VALUES ($data )");
        if ($query) {

            return true;
        } else {
            return false;
        }
    }
    function select($table)
    {
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    function getUserName($uid)
    {
        $sql = "select Username from Users where uid = '$uid'";
        $query = $this->db->query($sql);
        return $query->row()->Username;
    }
    function addanswer($answer, $uid, $qid)
    {
        $sql = "INSERT INTO `answers`(`answer`, `uid`,`qid`)VALUES ('$answer','$uid', '$qid') ";
        $query = $this->db->query($sql);
    }
    function getUsers()
    {
        $sql = "select * from 	backenduser	";
        $query = $this->db->query($sql);
        $toSend = array();

        foreach ($query->result() as $x) {
            $toSend[] = $x;
        }
        return $toSend;
    }
    function getUserByID($id)
    {
        $sql = "select * from backenduser where uid=$id";
        $query = $this->db->query($sql);

        return $query->result();
    }
    function edituser($uid, $firstname, $lastname, $email, $password, $occupation, $birth, $status)
    {

        $sql = "UPDATE `backenduser` SET `first_name`='$firstname',`last_name`='$lastname',`password`='$password',`email`='$email',`occupation`='$occupation',`birth`='$birth', `status`='$status'   WHERE uid=$uid";
        $query = $this->db->query($sql);
    }
    function vote($aid)
    {

        $sql = "SELECT questions.question, answers.answer,  SUM(vote.upvote) AS upvote, SUM(VOTE.downvote) AS downvote
        FROM vote 
        JOIN answers ON answers.aid=vote.aid 
        JOIN questions ON questions.qid=answers.qid
        GROUP BY answers.answer WHERE aid=$aid";
        $query = $this->db->query($sql);
    }
    function searchquestion($squestion)
    {

        $sql = "SELECT questions.qid qid, questions.question, backenduser.first_name user_posted,
        GROUP_CONCAT( DISTINCT u2.first_name  SEPARATOR ', ' ) AS user,
        GROUP_CONCAT( DISTINCT answers.answer  SEPARATOR ', ' ) AS answer
       from questions 
       JOIN answers ON questions.qid=answers.qid 
       join backenduser on backenduser.uid=questions.uid
       JOIN backenduser u2 ON u2.uid=answers.uid 
        where question LIKE '%{$squestion}%'";
        $query = $this->db->query($sql);
        $results = array();
        foreach ($query->result() as $result) {
            $results[] = $result;
        }
        return $results;
    }
}
