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
    if (null != findWord($length, $hash)) {
        $length = findWord($length, $hash);
    }

    // Add the new entry to the array
    $previous_entries[] = array("numid" => $numid, "direction" => $direction, "length" => $length, "hash" => $hash);
    // Save the updated $previous_entries array in the session
    $_SESSION['previous_entries'] = $previous_entries;
}
if(isset($_POST["delete_index"])){
    $delete_index = $_POST["delete_index"];
    unset($previous_entries[$delete_index]);
    $_SESSION['previous_entries'] = $previous_entries;
}

?>

<html>
<head>
    <title>Daniel Crossword Death</title>
    <link rel="stylesheet" href="crossword.css">
</head>

<body>
    <h1>Crossword Crack</h1>
    <form action="main.php" method="post">
        <label for="fnumber">Number: </label>
        <input type="text" id="fnumber" name="number" value=""><br>

        <label for="direction">Direction: </label>
        <select name="direction" id="direction">
            <option value="across">Across</option>
            <option value="down">Down</option>
        </select> <br>

        <label for="flength">Word (with periods for all letters):</label>
        <input type="text" id="flength" name="length" value="... ......"><br>

        <label for="fhash">Hash: </label>
        <input type="text" id="fhash" name="hash" value=""><br>

        <input type="submit" value="Submit">
    </form>

    <div id="previous-entries">
        <h2>Previous Entries</h2>
        <?php
            // Loop through the previous entries and display them
            foreach ($previous_entries as $index => $entry) {
                echo "<p>{$entry['numid']}{$entry['direction']}: {$entry['length']} <form method='post' style='display:inline; border:none;';><input type='hidden' name='delete_index' value='{$index}'><button type='submit'>Delete</button></form></p><br>";
            }
        ?>
    </div>
    <form action="final.php" method="POST">
        <h2>Copy entire HTML file once done entering information above!</h2>
        <textarea id="crossword" name="crossword" rows="10" cols="51"></textarea><br>
        <input type="hidden" name="enteredInfo" value='<?php echo json_encode($previous_entries); ?>'>
        <input type="submit" value="Let's go!" />
    </form>
</body>
</html>
