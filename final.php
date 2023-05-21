<?php

//retrieve code from previous page
$html = $_POST['crossword'];

//sort every entry into solved or not
$solved = [];
$unsolved = [];
$enteredInfo = json_decode($_POST['enteredInfo'], true);
$solvedCounter = 0;
$unsolvedCounter = 0;
foreach ($enteredInfo as $info) {
    if (str_contains($info['length'], '.')) {
        $unsolved[$unsolvedCounter] = $info;
        $unsolvedCounter++;
    }
    else {
        $solved[$solvedCounter] = $info;
        $solvedCounter++;
    }
}

//this autofills the solved answers into their spots
foreach ($solved as $key) {
    $name = $key['numid'].$key['direction'];
    $length = $key['length'];
    $search = '<label>' . $name . '</label>';
    $pos = strpos($html, $search);
    $miniString = substr($html, $pos, 160);
    $modString = str_replace('<input name="code" type="text">', '<input name="code" type="text" value="' . $length . '">', $miniString);
    $html = str_replace($miniString, $modString, $html);
}

//write out all unsolved clues
echo $html;
echo "<h2>Unsolved Clues</h2>";
echo '<p>Be sure to delete clues once solved. If you figure out what a whole word may be, try it on <a href="solver.php">this</a> page in a new tab!</p>';
foreach ($unsolved as $item) {
    $name = $item['numid'].$item['direction'];
    $length = $item['length'];
    echo '<span id="' . $name . '-entry"><p>' . $name . ' <span id="' . $name . '">' . $length . "   " . '</span><button onclick="deleteLine(\'' . $name . '-entry\')">Delete</button></p></span>';
}

//store unsolved in js array
$string = "<script>unsolved = [";
$string1 = "lengths = [";
foreach ($unsolved as $item) {
    $string = $string . '"' . $item['numid'] . $item['direction'] . '", ';
    $string1 = $string1 . '"' . $item['length'] . '", ';
}
$string = substr($string, 0, strlen($string)-2) . '];' . "\n";
$string1 = substr($string1, 0, strlen($string1)-2) . '];' . "\n";
echo $string . $string1 . "</script> \n";
?>

<br>
<h2>Modify Message</h2>
<p>Copy and paste message from above, then change words and click submit.</p>
<textarea id="guesses" name="guesses" rows="10" cols="51"></textarea><br>
<button id="submitButton" onclick="showInput()">Submit</button>
<p id="preview"></p>


<!--This section allows the user to change the message and then inserts appropriate letters into the unsolved-->
<script>
 
    function deleteLine(id) {
        var element = document.getElementById(id);
        if (element) {
            element.remove();
        }
        let name = id.substring(0, id.length - 6);
        let index = unsolved.indexOf(name);
        if (index !== -1) {
            unsolved.splice(index, 1);
            lengths.splice(index, 1);
        }
    }

    let alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
    
    function findIndex(letter) {
        for (let i=0; i<alphabet.length; i++) {
            if (alphabet[i] == letter) {
                return i;
            }
        }
    }

    function letterAt(num) {
        return alphabet[num];
    }

    function fixRange(num) {
        while (num<0) {
            num += 26;
        }
        while (num>25) {
            num -= 26;
        }
        return num;
    }

    function findChange(existing, guessed) {
        return (letterAt(fixRange(findIndex(guessed)-findIndex(existing))));
    }

    function inAlphabet(character) {
        for (let i = 0; i<alphabet.length; i++) {
            if (alphabet[i] == character) {
                return true;
            }
        }
        return false;
    }

    function showInput() {
        const input = document.getElementById("guesses");
        const message = document.querySelector("#message");
        let result = "";
        for (let i = 0; i<input.value.length; i++) {
            if (!inAlphabet(input.value.charAt(i).toLowerCase())) {
                result += input.value.charAt(i);
                continue;
            }
            result += findChange(message.querySelectorAll("span")[i].textContent.toLowerCase(), input.value.charAt(i).toLowerCase());
        }
        document.getElementById("preview").innerText = result;
        changeRemaining();
    }

    function changeRemaining() {
        for (let i = 0; i<document.getElementById("preview").innerText.length; i++) {
            if (!inAlphabet(document.getElementById("preview").innerText.charAt(i))) {
                continue;
            }
            if (document.getElementById("preview").innerText.charAt(i)!="a" && onlyOne(i)) {
                let name = findWho(i);
                let word = lengths[unsolved.indexOf(name)];
                let letter = document.getElementById("preview").innerText.charAt(i);
                let indicesOfChangers = oneIndices(name);
                let adjustedIndex = adjustIndex(i, name);
                adjustAnswer(name, word, letter, indicesOfChangers, adjustedIndex);
            }
        }
    }

    function adjustIndex(currIndex, name){
        let retIndex = 0;
        for (let i = 0; i<currIndex; i++) {
            if (keymasks[name][i]==="1") {
                retIndex++;
            }
        }
        return retIndex;
    }

    function adjustIndexBack(currIndex, name) {
        let i = 0;
        while (currIndex>=0) {
            if (keymasks[name][i]==="1") {
                currIndex--;
            }
            i++;
        }
        return i-1;
    }

    function adjustAnswer(name, word, letter, indicesOfChangers, index) {
        let howLong = word.length;
        counter = index;
        while (counter >= howLong) {
            counter -= howLong;
        }
        document.getElementById(name).innerText = document.getElementById(name).innerText.substring(0, counter) + letter + document.getElementById(name).innerText.substring(counter+1);
    }

    function oneIndices(name) {
        let arrayToReturn = [];
        counter = 0;
        for (let i = 0; i<keymasks[name].length; i++) {
            if (keymasks[name][i]==="1") {
                arrayToReturn[counter] = i;
                counter++;
            }
        }
        return arrayToReturn;
    }

    function onlyOne(index) {
        let counter = 0;
        for (let i = 0; i<unsolved.length; i++) {
            if (keymasks[unsolved[i]][index]==="1") {
                counter++;
            }
            if (counter > 1) {
                return false;
            }
        }
        if (counter == 0) {
            return false;
        }
        return true;
    }

    function findWho(index) {
        for (let i = 0; i<unsolved.length; i++) {
            if (keymasks[unsolved[i]][index]==="1") {
                return unsolved[i];
            }
        }
    }

</script>
