<html>
<header>
  <li style="padding-top:18%">
    <div id="google_translate_element" align='right'></div>
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </li>
</header>
<body>
  <meta charset="utf-8">


    <link rel="stylesheet" type="text/css" href="http://localhost/FG_Template/assets/sitestyle.css"></link>
      <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></link>
  <!--Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url();?>assests/fgScript.js" ></script> -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url()?>">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('pages/DisplayChapters'); ?>">Chapters</span></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">


<?php if(!isset($_SESSION['username']))
 {
          $_SESSION['privilege'] = 3;
          ?>
          <li class="active"><a href="<?php echo site_url('users/login'); ?>">Login</span></a></li>
          <?php
        } else if(isset($_SESSION['username']) && $_SESSION['privilege'] == 1)
          {?>
          <li><a href="<?php echo site_url('pages/createChapter'); ?>">Create Chapter</span></a></li>
          <li><a href="<?php echo site_url('pages/createSection'); ?>">Create Section</span></a></li>
            <li><a href="<?php echo site_url('users/createUser'); ?>">Create User Account</span></a></li>
            <li><a href="<?php echo site_url('users/logout'); ?>">Logout</span></a></li>
          <?php
        } else if(isset($_SESSION['username']) && $_SESSION['privilege'] == 2 || $_SESSION['privilege'] == 3 ) {?>
          <li><a href="<?php echo site_url('pages/createChapter'); ?>">Create Chapter</span></a></li>
          <li><a href="<?php echo site_url('pages/createSection'); ?>">Create Section</span></a></li>
            <li><a href="<?php echo site_url('users/logout'); ?>">Logout</span></a></li>

        <?php }?>

        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
