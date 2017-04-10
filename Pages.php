<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->view('Templates/header.php');
    $this->load->helper('url_helper');
    $this->load->library('session');
    $this->load->helper('form');
    $this->load->model('Pages_Model');
  }
  public function index()
  {
    $page = 'home';
    $data['title'] = ucfirst($page); // Capitalize the first letter

    $this->load->view($page, $data);


  }
  /*Display Chapter for SideNav*/
  public function DisplayChapters()
  {
    $data['chapters']=	$this->Pages_Model->getChapters();
    $data['defaultChapter'] = $data['chapters'][0];

    for($i = 0;$i< count($data['chapters']);$i++){
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
    $data['defaultSection'] = $data['chapters'][0]['sections'][0];
    $this->load->view("Templates/view", $data);
  }//DisplayChapters

  /*When Clicking Section in SideNav
  Displays Specified Section*/
  public function section($title)
  {
    $data['chapters'] = $this->Pages_Model->getChapters();

    for($i = 0;$i< count($data['chapters']);$i++)
    {
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
    $data['requestedsection'] = $this->Pages_Model->getSectionByTitle($title);
    $title = urldecode($title);
    $data['title'] =  $title;
    $this->load->view('Templates/view', $data);

  }







}
