<?php
class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('Pages_model');
		$this->load->helper('html');
	}
	
	public function index()
	{
		$page = 'home';
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}

    public function view($page = NULL)
    {
		$data['title'] = ucfirst($page); // Capitalize the first letter
			
		if($page == 'chapters')
		{
			$data['chapters'] = $this->Pages_model->get_chapters();
			$data['title'] = 'Chapters';
			$data['sections'] = $this->Pages_model->get_sections();
		}
		
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer', $data);
    }
	
	public function chapters($num)
	{
		$data['sections'] = $this->Pages_model->get_chapters($num);
		$data['title'] = "Chapter " . $num;
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/view', $data);
		$this->load->view('templates/footer');
	}
	
	public function section($title)
	{
		$title = urldecode($title);
		$data['chapters'] = $this->Pages_model->get_chapters();
		$data['sections'] = $this->Pages_model->get_sections();
		$data['requestedsection'] = $this->Pages_model->get_section($title);
		$data['title'] = "Chapter " . $data['requestedsection']['SEC_CNUM'] . " - " . $title;
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/view', $data);
		$this->load->view('templates/footer');
	}
}