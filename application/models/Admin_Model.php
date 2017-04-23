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
    
    public function putChapter($chapter, $sections)
    {
        $query = "";
        if($chapter['chapternum'] !== $chapter['oldchapnum'])
        {
            //Create the new chapter
            $query = "INSERT INTO Chapters VALUES ($chapter[chapternum], '$chapter[chaptertitle]', '$chapter[chapterdesc]');";
            $result = $this->db->query($query);
            //Move all sections to the new chapter
            for($index = 0; $index < sizeof($sections); $index++)
            {
                $header     = $sections[$index]['header'];
                $content    = $sections[$index]['content'];
                
                $query = "UPDATE Sections SET header='$header', content='$content', Ch_id = '$chapter[chapternum]' WHERE Ch_id = $chapter[oldchapnum];";
                $result = $this->db->query($query);
            }
            //Delete old chapter
            $query = "DELETE FROM Chapters WHERE id = $chapter[oldchapnum];";
            $result = $this->db->query($query);
        } else {
             $query = "UPDATE Chapters SET id='$chapter[chapternum]', title='$chapter[chaptertitle]', description='$chapter[chapterdesc]' WHERE id = $chapter[chapternum];";
        }
        $result = $this->db->query($query);

        return $result;
        unset($chapter);
    }
}
