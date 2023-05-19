<?php
// Start a session (if not already started)
session_start();

// Initialize the $previous_entries array from the session (if it exists)
$previous_entries = isset($_SESSION['previous_entries']) ? $_SESSION['previous_entries'] : array();
include 'findWord.php';
// Check if the form has been submitted
if(isset($_POST["number"]) && isset($_POST["direction"]) && isset($_POST["length"]) && isset($_POST["hash"])) {
    $numid = $_POST["number"];
    $direction = $_POST["direction"];
    $length = $_POST["length"];
    $hash = $_POST["hash"];
    if (null != findWordHelp($length, $hash)) {
        $length = findWordHelp($length, $hash);
    }
    echo "<p>$numid$direction: $length</p>";

}

?>

<html>
<head>
    <title>Daniel Crossword Death</title>
    <link rel="stylesheet" href="crossword.css">
</head>

<body>
    <h1>Crossword Crack</h1>
    <form method="post">
        <p>Write out the word you are guessing, but use dots for other words</p>
        <label for="fnumber">Number: </label>
        <input type="text" id="fnumber" name="number" value=""><br>

        <label for="direction">Direction: </label>
        <select name="direction" id="direction">
            <option value="across">Across</option>
            <option value="down">Down</option>
        </select> <br>

        <label for="flength">Word:</label>
        <input type="text" id="flength" name="length" value="ex: the ......"><br>

        <label for="fhash">Hash: </label>
        <input type="text" id="fhash" name="hash" value=""><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
