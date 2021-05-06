<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="home.php"> Chain Reaction </a>

  <?php 
        // Get the current page and set the active nav item based on the current page.
        $file_content = explode("/", $_SERVER["PHP_SELF"]);
        $nav_current_page = $file_content[sizeof($file_content) - 1];
        $dirs = explode("\\", getcwd());
        $curr_dir = $dirs[count($dirs) - 1];
        $need_dots = false;
        if ($curr_dir == "chain-inventory") {
          $need_dots = true;
        }
          ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item<?php echo $nav_current_page == " romecodeplay.php" ? " active" : "" ?>">
        <a class="nav-link" href=<?php if($need_dots) echo "../roomcodeplay.php" ; else echo "roomcodeplay.php" ; ?>>
          Play <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item<?php echo $nav_current_page == " normalcreate.php" ? " active" : "" ?>">
        <a class="nav-link" href=<?php if($need_dots) echo "../normalcreate.php" ; else echo "normalcreate.php" ; ?>>
          Create <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item<?php echo $nav_current_page == " account.php" ? " active" : "" ?>">
        <a class="nav-link" href=<?php if($need_dots) echo "../account.php" ; else echo "account.php" ; ?>> Account
          <span class="sr-only">(current)</span></a>
        <!-- <a class="nav-link" href="http://localhost:4200" Account <span class="sr-only">(current)</span></a> -->
      </li>
      <li class="nav-item<?php echo $nav_current_page == " matches.php" ? " active" : "" ?>">
        <a class="nav-link" href=<?php if($need_dots) echo "../matches.php" ; else echo "matches.php" ; ?>>
          Match History <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item<?php echo $nav_current_page == " logout.php" ? " active" : "" ?>">
        <a class="nav-link" href=<?php if($need_dots) echo "../../php/logout.php" ; else echo "../php/logout.php" ; ?>>
          Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
