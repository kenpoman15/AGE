<?php
class User_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }
    public function Verify($username, $password)
    {
        $query = $this->db->get_where('Users', array('username' => $username));
        $user=$query->row_array();

        if(password_verify($password,$user['password']))
        {
          $this->session->set_userdata($user);
          return TRUE;
        } else {
          return FALSE;
        }
    }

    public function insertUser($user)
    {
        $user['pw'] = password_hash($user['pw'], PASSWORD_DEFAULT);
        //Chapter: id, title, description
        $query = "INSERT INTO Users VALUES ('', '$user[fn]', '$user[ln]', '$user[un]', '$user[pw]', '$user[em]', $user[priv]);";
        $result =  $this->db->query($query);
            return $result;
        unset($user);
    }
}
