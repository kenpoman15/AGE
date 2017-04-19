<div id="chapternav">
	<?php include 'chapters.php'; ?>
</div>
<div id="mainContent">
	<?php if($creation == "chapter") { ?>
		<center>
			<h1><?php echo $title; ?></h1>
			<div id="createchapter">
            <form id="newchapter" action="<?php echo site_url('pages/sendChapter')?>" method="post">
            <fieldset id="createchaptercontainer">
            <table>
            <tbody>
               <tr>
                  <td><label>Chapter Number:</label></td>
                  <td><input class="textfield" type="text" name="chapternum" required></td>
               </tr>
               <tr>
                  <td><label>Chapter Title:</label></td>
                  <td><input class="textfield" type="text" name="chaptertitle" required></td>
               </tr>
               <tr>
                  <td><label>Chapter Description:</label></td>
                  <td><input class="textfield" type="text" name="chapterdesc" required></td>
               </tr>
               <tr>
                  <td></td>
						<td><input style='float: right;' type="submit"  value="Go" name="submit"></td>
               </tr>
            </tbody>
            </table>
            </fieldset>
            </form>
         </div>
		  </center>
        <?php
    } else if($creation == "section") { ?>
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'input.tiny' });</script>

      <div id="createsection">
			<center>
				<h1><?php echo $title; ?></h1>
            <form id="newsection" action="<?php echo site_url('pages/sendSection')?>" method="post">
            <fieldset id="createsectioncontainer">
            <table>
            <tbody>
               <tr>
                  <td><label>Section Header:</label></td>
                  <td><input class="textfield" type="text" name="sectionheader" required> </td>
               </tr>
               <tr>
                  <td><label>Section Text:</label></td>
                  <td><input type="text" name="sectiontext" class="tiny"></td>
               </tr>
               <tr>
                  <td><label>Related Chapter:</label></td>
                  <?php
                    $string = "<td><select style='float: right; width: 25%;'form='newsection' name='relatedchapternum'>";
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
						<td></td>
						<td><input style='float: right;' type="submit"  value="Go" name="submit"></td>
               </tr>
            </tbody>
            </table>
            </fieldset>
            </form>
				</center>
         </div>
        <?php
    } else {
        //show404();
    }
echo "</div>";
