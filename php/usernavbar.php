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
        $nav_current_page = explode("/", $_SERVER["PHP_SELF"]);
        $nav_current_page = $nav_current_page[sizeof($nav_current_page) - 1];
        ?>
        
        <li class="nav-item<?php echo $nav_current_page == "romecodeplay.php" ? " active" : ""?>">
          <a class="nav-link" href="roomcodeplay.php"> Play <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item<?php echo $nav_current_page == "customcreate.php" ? " active" : ""?>">
          <a class="nav-link" href="customcreate.php"> Create <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item<?php echo $nav_current_page == "account.php" ? " active" : ""?>">
          <a class="nav-link" href="account.php"> Account <span class="sr-only">(current)</span></a>
        </li>
    
    </div>
  </nav>
</section>