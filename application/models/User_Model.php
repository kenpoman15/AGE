<?php
/*Model       : User_Model
 *Project     :CS340 AGE Field Guide
******************************************************************
* Description :Holds Functions To verify and insert
              Users into database
*****************************************************************/
class User_Model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
    $this->load->library('session');
  }

  /*Compare User account info in Database on login
  @param $username - user entered string
  @param $password - password attached to username

  @return boolean - returns TRUE if account can be verified*/
  public function Verify($username, $password)
  {
    $query = $this->db->get_where('Users', array('username' => $username));
    $user=$query->row_array();
    if(password_verify($password, $user['password']))
    {
      $this->session->set_userdata($user);
      return TRUE;
    } else {
      return FALSE;
    }
  }//end-Verify

  /*
  * Insert User to Database w/ hashed password
  * @param $user - The array of user info to be inserted
  */
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
