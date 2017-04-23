
<body>
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
  <p>  <?php echo (isset($requestedsection)) ? $requestedsection['content'] : $defaultSection['content']; ?></p>
  </center>

  <div id="Btns">
    <?php if(isset($_SESSION['username'])) { ?>
      <button onclick="location.href='<?php echo site_url("Admin/editSection/$title");?>'">Edit Section</button>
      <button onclick="location.href='<?php echo site_url("Admin/DeleteSection/$title");?>'">Delete Section</button><?php
    } ?>
  </div>
</div>
 <!-- End info Div, contains all info for requested section-->

</body>
