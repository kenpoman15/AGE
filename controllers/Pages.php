<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
      $this->load->helper('form');
    $this->load->view('Templates/header.php');
    $this->load->helper('url_helper');
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
      //$title = urldecode($title);
    $data['chapters'] = $this->Pages_Model->getChapters();
    $data['defaultChapter'] = $data['chapters'][0];
    $title = urldecode($title);
  //  print_r($data['chapters'][0]);
      //$data['defaultSection'] = $data['chapters'][0]['sections'][0];

    for($i = 0;$i< count($data['chapters']);$i++)
    {
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
      $data['defaultSection'] = $data['chapters'][0]['sections'][0];
    $data['requestedsection'] = $this->Pages_Model->getSectionByTitle($title);

    $data['title'] =  $title;
     $this->load->view('Templates/view', $data);


  }

  public function createChapter()
  {
     $data['title'] = "Create a Chapter";
     $data['creation'] = "chapter";
     $data['defaultSection'] = "";
     $data['defaultChapter'] = "";
 $this->load->view('Templates/create', $data);


  }

  public function createSection()
  {
     $data['creation'] = "section";
     $this->load->view('Templates/create', $data);
  }

  public function sendChapter(){
    $chapter = $_POST;
    $chapter = $this->Pages_Model->putChapter($chapter); //call to insert

    $data['chapters'] = $this->Pages_Model->getChapters();
    $data['defaultChapter'] = $data['chapters'][0];
    for($i = 0;$i< count($data['chapters']);$i++)
    {
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
      $data['defaultSection'] = $data['chapters'][0]['sections'][0];

    $this->load->view("Templates/view", $data);
  }
  public function sendSection(){

      $section = $_POST;
        $section = $this->Pages_Model->putSection($section);

      $data['chapters'] = $this->Pages_Model->getChapters();
      $data['defaultChapter'] = $data['chapters'][0];
      for($i = 0;$i< count($data['chapters']);$i++)
      {
        $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
      }
        $data['defaultSection'] = $data['chapters'][0]['sections'][0];

      $this->load->view("Templates/view", $data);
  }









}
