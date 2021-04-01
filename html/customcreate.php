<!-- <!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Chain Reaction Custom Create </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
    <link rel="stylesheet" href="..\css\gameplay.css">
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
    <h1 class="big-title"> Custom Create </h1>
    <div>
      <a href="waitingroom.html">
        <button id="use-button" class="direction-button use-chain" onmouseover="changeText()">Use Chain</button>
      </a>
      <p id="chain-text" class="confirmation-chain">Word 1 - Word 2 - Word 3 - Word 4 - Word 5 - Word 6 - Word 7</p>
    </div>
    <div class="custom-create-container">
  <div class="left-select chain-table">
    <table>
      <tr><td id="left1">Word 1</td></tr>
      <tr><td id="left2">.</td></tr>
      <tr><td id="left3">L#</td></tr>
      <tr><td id="left4">.</td></tr>
      <tr><td id="left5">.</td></tr>
      <tr><td id="left6">.</td></tr>
      <tr><td id="left7">Word 7</td></tr>
    </table>
  </div>
  <div class="middle-select chain-table">
    <table>
      <tr><td id="mid1">Word 1</td></tr>
      <tr><td id="mid2">.</td></tr>
      <tr><td id="mid3">.</td></tr>
      <tr><td id="mid4">.</td></tr>
      <tr><td id="mid5">.</td></tr>
      <tr><td id="mid6">.</td></tr>
      <tr><td id="mid7">Word 7</td></tr>
    </table>
  </div>
  <div class="right-select chain-table">
    <table>
      <tr><td id="right1">Word 1</td></tr>
      <tr><td id="right2">.lol</td></tr>
      <tr><td id="right3">.this</td></tr>
      <tr><td id="right4">.is</td></tr>
      <tr><td id="right5">.fact</td></tr>
      <tr><td id="right6">.cap</td></tr>
      <tr><td id="right7">Word 7</td></tr>
    </table>
  </div>
  <button class="direction-button" onclick="shiftRight()">→</button>
  <button class="direction-button">Add New Chain</button>
  <button class="direction-button" onclick="shiftLeft()">←</button>
</div>
<script>


    class Chain {
        constructor(chainID, playerID) {
            this.chainID = chainID;
            this.playerID = playerID;
            getWords();
        }
    }

    getWords = () => {
    }

</script>
</body>
</html> -->
