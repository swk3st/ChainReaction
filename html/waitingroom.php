
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Waiting Room </title>
    <link rel="stylesheet" href="..\css\button.css">
    <link rel="stylesheet" href="..\css\gameplay.css">
</head>

<body>

<header>
    <?php include('../php/navbar.php'); ?>

</header>

<h1 id="waitingText"> WAITING... </h1>
<div class="waiting-room-container">
    <p grid-row-start=1 class="room-code">Room Code</p>
    <div class="team-group" grid-row-start=2>
        <div class="team-grouping" grid-column-start=1>
            <h2>Team 1</h2>
            <p>Katie</p>
            <p>Stephen</p>
            <p>Liam</p>
        </div>
        <div class="team-grouping" grid-column-start=2>
            <h2>Team 2</h2>
            <p>Helen</p>
            <p>Joey</p>
            <p>Will</p>
        </div>
    </div>
    <a href="gameplay.php">
        <button class="big-button" grid-row-start=3>Start</button>
    </a>
</div>
<script>
    var arr = [" WAITING ", " WAITING. ", " WAITING.. ", " WAITING... "];
    var count = 0;
    var element = document.getElementById("waitingText");
    var interval = setInterval(function () {
        element.innerHTML = arr[count];
        count++;
        if(count > arr.length - 1) {
            count = 0;
        }
    }, 1000);
</script>
</body>
</html>