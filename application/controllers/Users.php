<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('session');
    $this->load->library('encryption');
    $this->load->helper('url_helper');
    $this->load->helper('form');
    $this->load->model('User_Model');


  }

  public function index()
  {
    $this->load->view('Templates/header.php');
    $this->load->view("Templates/login");
      $this->load->view('Templates/footer.php');
  }
  public function login()
  {
    $this->load->library('form_validation');
    $data['title'] = 'Login';
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('Templates/header.php');
        $this->load->view('Templates/login');
        $this->load->view('Templates/footer.php');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $Verify =	$this->User_Model->Verify($username,$password); 	//Verify w/ Verify function in Login model
      if($Verify == TRUE){
        redirect(site_url());//redirect to home after verification
      } else{
        $this->load->view('Templates/header.php');
        $this->load->view('Templates/login');
        $this->load->view('Templates/footer.php');
        echo "not verified";
      }
    }
  }//login
  public function logout(){
    session_unset();
    $this->session->sess_destroy();
    redirect(site_url());
  // $this->load->view('Templates/header.php');
  //   $this->load->view("home");
  //   $this->load->view('Templates/footer.php');
  }

  public function createUser()
  {
    $this->load->view("Templates/header.php");
    $this->load->view("Templates/newuser.php");
    $this->load->view('Templates/footer.php');
  }

  public function sendUser()
  {
    $this->load->library('form_validation');
    $data['title'] = 'Login';

    $user = $_POST;

      $user = $this->User_Model->insertUser($user);

      $this->load->view("Templates/header.php");
      $this->load->view("home");
      $this->load->view('Templates/footer.php');

  }
  public function popUp(){

    $this->load->view("Templates/uploadForm.php", array('error' => ' ' ));

  }//end-popUP
  public function do_upload()
        {

                $config['upload_path']          = 'images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                  echo $config['upload_path'];
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('Templates/uploadForm', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        ?><script>
                        window.close()
                        window.parent.reload();
                        

                        </script><?php

                }
        }//do-upload
}
