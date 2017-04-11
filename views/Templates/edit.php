<div id="chapternav">
  <?php
  include 'chapters.php';
  ?>
</div> <!--end Chapter Navigation Div-->

<div id="mainContent">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'input.tiny' });</script>
    
    <center>
        <form id="updatesection" action="<?php echo site_url('Admin/updateSection')?>" method="post">
            <fieldset id="updatesectioncontainer">
            <table>
            <tbody>
               <tr>
                  <td><label>Section Header:</label></td>
                  <td><input type="text" name="sectionheader" value="<?php echo $requestedsection['header'];?>" required> </td>
               </tr>
               <tr>
                  <td><label>Section Text:</label></td>
                  <td><input type="text" name="sectiontext" class="tiny" value="<?php echo $requestedsection['content'];?>"></td>
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
                        if($CHN == $requestedsection['Ch_id'])
                        {
                            $string .= "<option selected='selected' value=$CHN>Chapter $CHN</option>";
                        } else {
                            $string .= "<option value=$CHN>Chapter $CHN</option>";
                        }
                    }
                    $string .= "</td>";
                    echo $string;
                  ?>
               </tr>
               <tr>
                    <td></td>
                    <td><input style="float: right;" type="submit"  value="Go" name="submit"></td>
               </tr>
            </tbody>
            </table>
            </fieldset>
            </form>
    </center>    
</div>