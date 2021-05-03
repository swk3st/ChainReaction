<section id="navbar">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.php">Chain Reaction</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav w-100">
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
        
        
        <li class="nav-item<?php echo $nav_current_page == "romecodeplay.php" ? " active" : ""?>">
          <a class="nav-link" href=<?php if($need_dots) echo "../roomcodeplay.php"; else echo "roomcodeplay.php"; ?>> Play <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item<?php echo $nav_current_page == "normalcreate.php" ? " active" : ""?>">
          <a class="nav-link" href=<?php if($need_dots) echo "../normalcreate.php"; else echo "normalcreate.php"; ?>> Create <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item<?php echo $nav_current_page == "account.php" ? " active" : ""?>">
          <a class="nav-link" href=<?php if($need_dots) echo "../account.php"; else echo "account.php"; ?>> Account <span class="sr-only">(current)</span></a>
          <!-- <a class="nav-link" href="http://localhost:4200" Account <span class="sr-only">(current)</span></a> -->
        </li>
        <li class="nav-item<?php echo $nav_current_page == "logout.php" ? " active" : ""?>">
          <a class="nav-link" href=<?php if($need_dots) echo "../../php/logout.php"; else echo "../php/logout.php"; ?>> Logout <span class="sr-only">(current)</span></a>
        </li>
    
    </div>
  </nav>
</section>