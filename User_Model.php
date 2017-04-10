<?php

class User_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }


    public function get_user_by_usn($usn=NULL)
{
  
    if($usn!=NULL)
    {
        $query = $this->db->get_where('Users',array('username'=>$usn));
        return $query->row_array();
    }
}
}
