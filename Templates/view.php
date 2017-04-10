<!-- view.php
    main view to display chapter nav menu and default section
  unless one is clicked -->
<div id="chapternav">
  <?php
  include 'chapters.php';
  ?>
</div>
<div id="mainContent">
  <h1>
    <center>
      <?php echo (isset($requestedsection)) ? $title : $defaultSection['header'];?>
    </center>
  </h1>
<center>
  <?php
echo (isset($requestedsection)) ? $requestedsection[0]['content'] : $defaultSection['content'];
  ?>
</center>
</div>

<?php (isset($_SESSION['UserName'])) ? $logged = true : $logged = false;

    echo  ($logged == true) ? "logged true" : "logged false";
