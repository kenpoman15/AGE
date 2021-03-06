<div id="chapternav">
  <?php
  include 'chapters.php';
  ?>
</div> <!--end Chapter Navigation Div-->

<?php if($edit == "chapter") {
				for($index = 0; $index < sizeof($chapters); $index++)
				{
					if($chapters[$index]['id'] == $requestedchapter)
						$thisChapter = $chapters[$index];
				}
?>
<div id="mainContent">
	<center>
			<h1><?php echo $title; ?></h1>
			<div id="createchapter">
            <form id="newchapter" action="<?php echo site_url('admin/updateChapter')?>" method="post">
            <fieldset id="updateChapterContainer">
            <table>
            <tbody>
							<input type="hidden" name="oldchapnum" value="<?php echo $thisChapter['id']; ?>">
               <tr>
                  <td><label>Chapter Number:</label></td>
                  <td><input class="textfield" type="text" name="chapternum" value="<?php echo $thisChapter['id']; ?>"required></td>
               </tr>
               <tr>
                  <td><label>Chapter Title:</label></td>
                  <td><input class="textfield" type="text" name="chaptertitle" value="<?php echo $thisChapter['title']; ?>"required></td>
               </tr>
               <tr>
                  <td><label>Chapter Description:</label></td>
                  <td><input class="textfield" type="text" name="chapterdesc" value="<?php echo $thisChapter['description']; ?>"required></td>
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
</div>
<?php } else if($edit == "section") { ?>
<div id="mainContent">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>
			tinymce.init({
				selector: "#sectiontext",
				paste_data_images: true,
				plugins: "image",
				menubar: "edit format insert",
				toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | indent outdent | image",
				//images_upload_base_path: 'img'
				image_advtab: true,
				file_picker_callback: function(callback, value, meta)
				{
					if (meta.filetype == 'image')
					{
						var input = document.getElementById('imageUpload');
						input.click();

						input.onchange = function()
						{
							var file = this.files[0];
							var reader = new FileReader();
							reader.onload = function(e)
							{
								callback(e.target.result, { alt: file.name });
							};
							reader.readAsDataURL(file);
						};
					}
				}
			});
		</script>

    <center>
        <form id="updatesection" action="<?php echo site_url('Admin/updateSection')?>" method="post">
            <fieldset id="updatesectioncontainer">
            <table>
            <tbody>
               <tr>
									<input type="hidden" name="sectionID" value="<?php echo $requestedsection['id']; ?>">
                  <td><label>Section Header:</label></td>
                  <td><input type="text" name="sectionheader" value="<?php echo $requestedsection['header'];?>" required> </td>
               </tr>
               <tr>
                  <td><label>Section Text:</label></td>
                  <td><input style="height:300px"id='sectiontext' type="text" name="sectiontext" value='<?php echo $requestedsection['content'];?>'></td>
									<td><input id='imageUpload' name="image" type="file" onchange="" style="display: none;"></td>
               </tr>
               <tr>
                  <td><label>Related Chapter:</label></td>
                  <?php
                    $string = "<td><select name='relatedchapternum'>";
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
                    $string .= "</select></td>";
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
<?php } ?>