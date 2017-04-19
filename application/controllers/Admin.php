<?php
class Admin extends CI_Controller
{
    public function __construct()
  {
      parent::__construct();
      $this->load->library('session');
      $this->load->library('encryption');
      $this->load->view('Templates/header.php');
      $this->load->helper('form');
      $this->load->helper('url_helper');
      $this->load->model('Pages_Model');
      $this->load->model('Admin_Model');
  }

  public function editSection($title)
  {
    $title = urldecode($title);
    $data['title'] = $title;
    $data['chapters'] = $this->Pages_Model->getChapters();
    for($i = 0;$i< count($data['chapters']);$i++)
    {
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
    $data['requestedsection'] = $this->Pages_Model->getSectionByTitle($title);
    $this->load->view("Templates/edit", $data);
    $this->load->view('Templates/footer.php');
  }

  public function updateSection()
  {
    $section = $_POST;
    $section = $this->Admin_Model->putSection($section);

    $this->load->view("home");
    $this->load->view('Templates/footer.php');
  }
}
