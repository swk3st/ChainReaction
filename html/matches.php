<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Create - Chain Reaction </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\button.css">
    <link rel="stylesheet" href="..\css\gameplay.css">
</head>

<body>

<header>
  <?php include('../php/navbar.php'); ?>

</header>

<h1> Player History </h1>
    <div class="matches-container">
        <table class='nice-table matches-table' id='matches-table'>
            <tr>
                <th>Game Owner</th><th>Payout</th><th>Date</th><th>Link</th>
            </tr>
            <tr>
                <td>BRADLEY</td><td>$44.00</td><td>DD:DD:DD</td><td>www.</td>
            </tr>
        </table>
    </div>
    <script src='../js/player-history.js' type='module'></script>
</body>
</html>