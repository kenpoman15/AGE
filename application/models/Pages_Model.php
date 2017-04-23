<?php
class Pages_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
          $this->load->library('session');
    }
    public function getChapters()
    {
      $sql = "SELECT * FROM `Chapters` ORDER BY id ASC";
      $query = $this->db->query($sql);
      $result = $query->result_array();
            return $result;
    }

    public function getSectionsByChapter($id){
      $sql = "SELECT * FROM `Sections` INNER JOIN `Chapters` on Chapters.id = Sections.Ch_id
      WHERE Sections.ch_id = $id";
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function getSectionByTitle($title){
      $sql = "SELECT * FROM `Sections` WHERE header = '$title'";
      $query = $this->db->query($sql);
      return $query->row_array();
    }

    public function putChapter($chapter)
    {
      //Chapter: id, title, description
       $query = "INSERT INTO Chapters VALUES ($chapter[chapternum], '$chapter[chaptertitle]', '$chapter[chapterdesc]');";
       $result =  $this->db->query($query);
      return $result;
        unset($chapter);
    }

    public function putSection($section)
    {
      //Section: id, header, content, parent chapter;
      $query = "INSERT INTO Sections (`id`, `header`, `content`, `Ch_id`) VALUES ('', '$section[sectionheader]', '$section[sectiontext]', '$section[relatedchapternum]');";
      $result =  $this->db->query($query);
        return $result;
      unset($section);
      //TODO Insert new section based on chapter $id
    }
}
