<!-- <h2><?php //echo $title; ?></h2> -->
<?php
	for($index = 0; $index < count($chapters); $index++)
	{

        echo "<h3>" . "Chapter " . $chapters[$index]['CH_NUM']. ":\t" . $chapters[$index]['CH_TOPIC'] . "</h3>";
        echo "<div id='tableofcontents'>";
			for($sec = 0; $sec < count($sections); $sec++)
			{
				if($sections[$sec]['SEC_CNUM'] == ($index+1))
				{
					$tag = $sections[$sec]['SEC_TITLE'];
					$link = site_url('pages/section/'. urldecode($sections[$sec]['SEC_TITLE']));
					echo "<p><a style='color: #06F;' href='$link'>$tag</a></p>";
				}
			}
        echo "</div>";
	} 
?>