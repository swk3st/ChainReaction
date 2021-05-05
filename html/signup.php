<!doctype html>
<html>

<?php 
session_start();
$_SESSION = array();
session_destroy();
// include "../db/database.php";
include getcwd() . '/../db/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle user creation form.
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['password2'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        if ($password != $confirm_password) {
            global $ERROR;
            $ERROR = "Account creation failed: passwords do not match.";
        } else if (checkUserExists($email)) {
            global $ERROR;
            $ERROR = "Account creation failed: user already exists.";
        } else {
            $player_id = insertPlayer($email, $password, $firstname, $lastname);
            if (checkUserExists($email)) {
                $MESSAGE = "User creation succeeded! Now log in below.";
                session_start();
                $_SESSION["playerID"] = $player_id;
                header("Location: ./account.php");
            } else {
                global $ERROR;
                $ERROR = "Account creation failed; database failure or password doesn't meet requirements.";
            }
        }
    }
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Chain Reaction Sign Up </title>
    <link rel="stylesheet" href=#>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="..\css\signup.css">

</head>

<header>

    <?php include "../php/navbar.php" ?>

</header>

<body>
    <div class="container">
        <h1> Sign Up </h1>

        <form onSubmit="return checkPassword(this)" method="post" action="./signup.php">
            <label for="firstname">First name</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="lastname">Last name</label>
            <input type="text" id="lastname" name="lastname" required>

            <label for="email">Email Address</label>
            <input type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            required>
    

            <label for="password">Password</label>
            <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[A-Za-z\W+])(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number, one special character, one uppercase and lowercase letter, and at least 10 or more characters"
                required>
            <div id="message">
                <h2>Password must contain the following:</h3>
                    <p id="letter" class="invalid"> A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid"> A <b>uppercase</b> letter</p>
                    <p id="number" class="invalid"> A <b>number</b></p>
                    <p id="specialChar" class="invalid">A <b> special character</b></p> 
                    <p id="length" class="invalid"> Minimum <b>10 characters</b></p>
            </div>

            <label for="password">Confirm Password</label>
            <input type="password" id="password2" name="password2" required>
            
            <input type="checkbox" onclick="showPassword()"> Show Password

            <div class="center space-between">

                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>

        </form>
    </div>



</body>

<script>

    // learned a W3 Schools tutorial to understand this
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }

        var y = document.getElementById("password2");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }

    var myPassword = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var specialChar = document.getElementById("specialChar");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myPassword.onfocus = function () {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myPassword.onblur = function () {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myPassword.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myPassword.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myPassword.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myPassword.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate special characters
        var specialChars = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
        if (myPassword.value.match(specialChars)) {
            specialChar.classList.remove("invalid");
            specialChar.classList.add("valid");
        } else {
            specialChar.classList.remove("valid");
            specialChar.classList.add("invalid");
        }
        

        // Validate length
        if (myPassword.value.length >= 10) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }

    // learned from GeeksforGeeks tutorial
    function checkPassword(form) {
        password = form.password.value;
        password2 = form.password2.value;

        // If password not entered 
        if (password == '')
            alert("Please enter Password");

        // If confirm password not entered 
        else if (password2 == '')
            alert("Please enter confirm password");

        // If Not same return False.     
        else if (password != password2) {
            alert("\nPassword did not match: Please try again.")
            return false;
        }

        // If same return True. 
        else {
            return true;
        }
    }
</script>

</html>