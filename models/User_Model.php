<?php

class User_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }


    public function Verify($username, $password){

        $query = $this->db->get_where('Users', array('username' => $username));
        $user=$query->row_array();
      //  print_r($user);
        if(trim($user['password'])==trim($password))
        {
          $this->session->set_userdata($user);
      

          return TRUE;
        }
        else{
          return FALSE;
        }

    }
}
