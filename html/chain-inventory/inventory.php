<!-- Display all chains in user's system
Button to create new chains from scratch
Have an option to delete a chain next to each chain in Inventory
Have an option to update a chain next to each in Inventory -->
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Inventory - Chain Reaction </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\..\css\gameplay.css">
</head>

<header>

  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="home.html">Chain Reaction</a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="roomcodeplay.html">Play</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.html">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.html">Log In</a>
        </li>
      </ul>
    </div>
  </nav>

</header>

<body>
<h1> Inventory! </h1>
<div class="inventory-container">
    <table>
        <tr>
            <th>Chain ID</th>
            <th>Header Word</th>
            <th>Word One</th>
            <th>Word Two</th>
            <th>Word Three</th>
            <th>Word Four</th>
            <th>Word Five</th>
            <th>Footer Word</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <tr>
            <th>id</th>
            <th>header</th>
            <th>test1</th>
            <th>test2</th>
            <th>test3</th>
            <th>test4</th>
            <th>test5</th>
            <th>footer</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </table>
</div>
</body>
</html>