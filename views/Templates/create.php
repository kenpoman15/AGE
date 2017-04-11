<?php
   if($creation == "chapter") {
        ?>
        <div id="createchapter">
            <form id="newchapter" action="<?php echo site_url('pages/sendChapter')?>" method="post">
            <fieldset id="createchaptercontainer">
            <table>
            <tbody>
               <tr>
                  <td><label>Chapter Number:</label></td>
                  <td><input type="text" name="chapternum" required></td>
               </tr>
               <tr>
                  <td><label>Chapter Title:</label></td>
                  <td><input type="text" name="chaptertitle" required></td>
               </tr>
               <tr>
                  <td><label>Chapter Description:</label></td>
                  <td><input type="text" name="chapterdesc" required></td>
               </tr>
               <tr>
                  <td><input type="submit"  value="Go" name="submit"></td>
                  <td><input type="button" value="Cancel"></td>
               </tr>
            </tbody>
            </table>
            </fieldset>
            </form>
         </div>
        <?php
    } else if($creation == "section") {
        //Have this edited to the Wizzywig or do an include from a php form
        ?>

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'input.tiny' });</script>

        <div id="createsection">
            <form id="newsection" action="<?php echo site_url('pages/sendSection')?>" method="post">
            <fieldset id="createsectioncontainer">
            <table>
            <tbody>
               <tr>
                  <td><label>Section Number:</label></td>
                  <td><input type="text" name="sectionnum" required></td>
               </tr>
               <tr>
                  <td><label>Section Header:</label></td>
                  <td><input type="text" name="sectionheader" required> </td>
               </tr>
               <tr>
                  <td><label>Section Text:</label></td>
                  <td><input type="text" name="sectiontext" class="tiny"></td>
               </tr>
               <tr>
                  <td><label>Related Chapter:</label></td>
                  <?php
                    $string = "<td><select form='newsection' name='relatedchapternum'>";

                    //Query the chapters
                    $result = $this->db->query("SELECT * FROM Chapters;");
                    $result = $result->result_array();

                    for($index = 0; $index < sizeof($result); $index++)
                    {
                        $CHN = $result[$index]['id'];
                        $string .= "<option value=$CHN>Chapter $CHN</option>";
                    }

                    $string .= "</td>";
                    echo $string;
                  ?>
               </tr>
               <tr>
                  <td><input type="submit"  value="Go" name="submit"></td>
                  <td><input type="button"    value="Cancel"></td>
               </tr>
            </tbody>
            </table>
            </fieldset>
            </form>
         </div>
        <?php
    } else {
        //show404();
    }
