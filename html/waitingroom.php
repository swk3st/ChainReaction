
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Waiting Room </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\button.css">
    <link rel="stylesheet" href="..\css\gameplay.css">
</head>

<body>

<header>
    <?php include('../php/navbar.php'); ?>

</header>

<h1 id="waitingText"> WAITING... </h1>
<div class="waiting-room-container">
    <h2>Game Code: <?php if (isset($_GET['gameID'])) echo $_GET['gameID']?></h2>
    <p>cash</p>
    <p>Another one</p>
    <p>Another one</p>
    <p>Another one</p>
    <p>Another one</p>
    <p>Another one</p>
    <p>Another one</p>
</div>
<script>
    var arr = [" WAITING ", " WAITING. ", " WAITING.. ", " WAITING... "];
    var count = 0;
    var element = document.getElementById("waitingText");
    let timer = document.getElementById("timer");
    // let countdown = 0;
    var interval = setInterval(function () {
        element.innerHTML = arr[count];
        count++;
        if(count > arr.length - 1) {
            count = 0;
        }
    }, 1000);
    // var ticker = setInterval(function () {
    //     timer.innerHTML = countdown;
    //     countdown--;
    // }, 1);
</script>
</body>
</html>