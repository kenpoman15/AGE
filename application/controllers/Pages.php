<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller
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
  }
  public function index()
  {
    $page = 'home';
    $data['title'] = ucfirst($page); // Capitalize the first letter
    $this->load->view($page, $data);
    $this->load->view('Templates/footer.php');
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
    $data['title'] = $data['chapters'][0]['sections'][0]['header'];
    $this->load->view("Templates/view", $data);
    $this->load->view('Templates/footer.php');
  }//DisplayChapters
  /*When Clicking Section in SideNav
  Displays Specified Section*/
  public function section($title)
  {
    $title = urldecode($title);
    $data['title'] =  $title;
    $data['chapters'] = $this->Pages_Model->getChapters();
    $data['defaultChapter'] = $data['chapters'][0];
    for($i = 0;$i< count($data['chapters']);$i++)
    {
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
    $data['defaultSection'] = $data['chapters'][0]['sections'][0];
    $data['requestedsection'] = $this->Pages_Model->getSectionByTitle($title);
    $this->load->view('Templates/view', $data);
    $this->load->view('Templates/footer.php');
  }
  public function createChapter()
  {
    $data['chapters'] = $this->Pages_Model->getChapters();
    for($i = 0;$i< count($data['chapters']);$i++)
    {
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
    $data['title'] = "Create a Chapter";
    $data['creation'] = "chapter";
    $this->load->view('Templates/create', $data);
    $this->load->view('Templates/footer.php');
  }
  public function createSection()
  {
    $data['chapters'] = $this->Pages_Model->getChapters();
    for($i = 0;$i< count($data['chapters']);$i++)
    {
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
    $data['title'] = "Create a Section";
    $data['creation'] = "section";
    $this->load->view('Templates/create', $data);
    $this->load->view('Templates/footer.php');
  }
  public function sendChapter()
  {
    $chapter = $_POST;
    $chapter = $this->Pages_Model->putChapter($chapter); //call to insert
    $data['chapters'] = $this->Pages_Model->getChapters();
    $data['defaultChapter'] = $data['chapters'][0];
    for($i = 0;$i< count($data['chapters']);$i++)
    {
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
    $data['defaultSection'] = $data['chapters'][0]['sections'][0];
    $this->load->view("home", $data);
    $this->load->view('Templates/footer.php');
  }
  public function sendSection()
  {
    $section = $_POST;
    $section = $this->Pages_Model->putSection($section);
    $data['chapters'] = $this->Pages_Model->getChapters();
    $data['defaultChapter'] = $data['chapters'][0];
    for($i = 0;$i< count($data['chapters']);$i++)
    {
      $data['chapters'][$i]['sections'] = $this->Pages_Model->getSectionsByChapter($data['chapters'][$i]['id']);
    }
    $data['defaultSection'] = $data['chapters'][0]['sections'][0];
    $this->load->view("home", $data);
    $this->load->view('Templates/footer.php');
  }

  // /*Sanitize String*/
  //   function get_post($con, $var)
  //   {
  //     $result = string mysqli_real_escape_string ( $con , string $var);
  //     //echo $var;
  //     return $result;
  //   }
}
?>
