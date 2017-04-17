<?php

class Admin_Model extends CI_Model
{
    public function putSection($section)
    {
        $query = "UPDATE Sections SET id='$section[sectionID]', header='$section[sectionheader]', content='$section[sectiontext]', Ch_id='$section[relatedchapternum]' WHERE id = $section[sectionID];";
        $result = $this->db->query($query);
        
        return $result;
        unset($section);
    }
}