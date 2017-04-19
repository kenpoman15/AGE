
<?php

foreach($chapters as $chapter){
	?>
	<button class="accordion"><?php echo "<h4>". $chapter['id'] . ":\t".$chapter['title']. "</h4>";?></button>
	<div class="panel">
	<?php
	foreach($chapter['sections'] as $section){
		if($section['Ch_id'] = $chapter['id'])
		{
			$tag = $section['header'];
			$link = site_url('pages/section/'.urldecode($section['header']));
			echo "<p><a href='$link'>$tag</a></p>";
		}//end-if
	}//inner foreach
	echo "</div>";

}//outer foreach

?>

<!--Script to display panels under Chapters in Chapter nav  -->
<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
		acc[i].onclick = function(){
				/* Toggle between adding and removing the "active" class,
				to highlight the button that controls the panel */
				this.classList.toggle("active");

				/* Toggle between hiding and showing the active panel */
				var panel = this.nextElementSibling;
				if (panel.style.display === "block") {
						panel.style.display = "none";
				} else {
						panel.style.display = "block";
				}
		}
}
</script>
