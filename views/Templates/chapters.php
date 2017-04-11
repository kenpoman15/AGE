<!-- <h2><?php //echo $title; ?></h2> -->
<?php
 //echo "<div id='tableofcontents'>";
foreach($chapters as $chapter){
	echo "<h4>"."Chapter ". $chapter['id'] . ":\t";
	echo $chapter['title']. "</h3>";

	foreach($chapter['sections'] as $section){

		if($section['Ch_id'] = $chapter['id']){
			$tag = $section['header'];
			/*clickable link to Section Info*/
       //$tag= str_replace(' ', '', $section['header']);//removes whitespace for proper URL

			$link = site_url('pages/section/'.urldecode($section['header']));
				echo "<p><a style='color: #06F;' href='$link'>$tag</a></p>";
		}

	}//inner foreach
//echo "</div>";
}//outer foreach

?>
