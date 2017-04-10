<?php

class Pages_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();



    }

    public function getChapters()
    {
      $sql = "SELECT * FROM `Chapters` ORDER BY id ASC";
      $query = $this->db->query($sql);
      $result = $query->result_array();
            return $result;

    }//
    public function getSectionsByChapter($id){
      $sql = "SELECT * FROM `Sections` INNER JOIN `Chapters` on Chapters.id = Sections.Ch_id
      WHERE Sections.ch_id = $id";
      $query = $this->db->query($sql);
      return $query->result_array();
    }
    public function getSectionByTitle($title){
      $sql = "SELECT * FROM `Sections` WHERE header = '$title'";
      $query = $this->db->query($sql);
      return $query->result_array();

    }


  }
    ?>
