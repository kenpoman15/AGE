
<?php
foreach($chapters as $chapter){
	echo "<h4>"."Chapter ". $chapter['id'] . ":\t";
	echo $chapter['title']. "</h3>";

	foreach($chapter['sections'] as $section){

		if($section['Ch_id'] = $chapter['id'])
		{
			$tag = $section['header'];
			$link = site_url('pages/section/'.urldecode($section['header']));
			echo "<p><a style='color: #06F;' href='$link'>$tag</a></p>";
		}

	}//inner foreach
}//outer foreach

?>
