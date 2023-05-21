<?php

ini_set('max_execution_time', '0');

// set up arrays of different length words
    function setArray($fileName) {
        $open = @fopen($fileName, 'r');
        if ($open) {
            return explode(", ", fread($open, filesize($fileName)));
        }
    }

    $array1 = setArray("oneLetterWords.txt");
    $array2 = setArray("mod2LetterWords.txt");
    $array3 = setArray("3_letter_words.txt");
    $array4 = setArray("mod4LetterWords.txt");
    $array5 = setArray("mod5LetterWords.txt");
    $array6 = setArray("sixLetterWords.txt");
    $array7 = setArray("sevenLetterWords.txt");
    $array8 = setArray("mod8LetterWords.txt");
    $array9 = setArray("nineLetterWords.txt");
    $array10 = setArray("tenLetterWords.txt");
    $array11 = setArray("11letwords.txt");

    $bigarray1 = $array1;
    $bigarray2 = setArray("big2lets.txt");
    $bigarray3 = setArray("big3lets.txt");
    $bigarray4 = setArray("big4lets.txt");
    $bigarray5 = setArray("big5lets.txt");
    $bigarray6 = setArray("big6lets.txt");
    $bigarray7 = setArray("big7lets.txt");
    $bigarray8 = setArray("big8lets.txt");
    $bigarray9 = setArray("big9lets.txt");
    $bigarray10 = setArray("big10lets.txt");
    $bigarray11 = setArray("big11lets.txt");


// takes in dot versions of words and the hash, then translates the information to call the appropriate function
// every letter will be written as a dot by the user (with spaces intact)
function findWord($word, $hash) {
    $numSpaces = substr_count($word, ' ');
    global $array1, $array2, $array3, $array4, $array5, $array6, $array7, $array8, $array9, $array10, $array11;
    global $bigarray2, $bigarray3, $bigarray4, $bigarray5, $bigarray6, $bigarray7, $bigarray8, $bigarray9, $bigarray10, $bigarray11;
    $bigarray1 = $array1;
    if ($numSpaces == 0) {
        $numDots = substr_count($word, '.');
        if ($numDots>11) {
            return;
        }
        $arrayName = "array" . $numDots;
        $bigArray = "big" . $arrayName;
        return findWord0($hash, $$arrayName, $numDots, $$bigArray);
    }
    if ($numSpaces == 1) {
        $numDots1 = strpos($word, " ");
        $numDots2 = strlen($word) - $numDots1 - 1;
        if ($numDots1>11 || $numDots2>11) {
            return;
        }
        $arrayName1 = "array" . $numDots1;
        $arrayName2 = "array" . $numDots2;
        $bigArrayName1 = "big" . $arrayName1;
        $bigArrayName2 = "big" . $arrayName2;
        return findWord1($hash, $$arrayName1, $$arrayName2, $$bigArrayName1, $$bigArrayName2, $numDots1, $numDots2);
    }
    if ($numSpaces == 2) {
        $numDots1 = strpos($word, " ");
        $numDots2 = strrpos($word, " ") - $numDots1 - 1;
        $numDots3 = strlen($word) - $numDots1 - $numDots2 - 2;
        if ($numDots1>11 || $numDots2>11 || $numDots3>11) {
            return;
        }
        $arrayName1 = "array" . $numDots1;
        $arrayName2 = "array" . $numDots2;
        $arrayName3 = "array" . $numDots3;
        $bigArrayName1 = "big" . $arrayName1;
        $bigArrayName2 = "big" . $arrayName2;
        $bigArrayName3 = "big" . $arrayName3;
        return findWord2($hash, $$arrayName1, $$arrayName2, $$arrayName3, $$bigArrayName1, $$bigArrayName2, $$bigArrayName3, $numDots1, $numDots2, $numDots3);
    }
    return;
}


$alphabet = "abcdefghijklmnopqrstuvwxyz";

function combinations($numLetters, $curr, $hash) {
    global $alphabet;

    if ($numLetters == 0) {
        if ($hash == md5(strtoupper($curr))){
            return $curr;
        }
        return;
    } else {
        for ($i=0; $i<strlen($alphabet); $i++) {
            $result = combinations($numLetters - 1, substr($alphabet, $i, 1) . $curr, $hash);
            if ($result !== null) {
                return $result;
            }
        }  
    }
    return;
}

$alphabet = "abcdefghijklmnopqrstuvwxyz";

function combinationsTwo($numLetters, $curr, $hash, $fwlength) {
    global $alphabet;

    if ($numLetters == 0) {
        $spaced = substr($curr, 0, $fwlength) . " " . substr($curr, $fwlength);
        if ($hash == md5(strtoupper($spaced))){
            return $spaced;
        }
        return;
    } else {
        for ($i=0; $i<strlen($alphabet); $i++) {
            $result = combinationsTwo($numLetters - 1, substr($alphabet, $i, 1) . $curr, $hash, $fwlength);
            if ($result !== null) {
                return $result;
            }
        }  
    }
    return;
}

// one word (0 spaces)
function findWord0($hash, $array, $numChars, $bigArray) {
    for ($i=0; $i<count($array); $i++) {
        if (md5(strtoupper($array[$i])) == $hash) {
            return $array[$i];
        }
    }
    for ($i=0; $i<count($bigArray); $i++) {
        if (md5(strtoupper($bigArray[$i])) == $hash) {
            return $bigArray[$i];
        }
    }
    if ($numChars <= 4) {
        return combinations($numChars, "", $hash);
    }
    return;
}

//two words (1 space)
function findWord1($hash, $list1, $list2, $biglist1, $biglist2, $numChars1, $numChars2) {
    for ($i=0; $i<count($list1); $i++) {
        for ($j=0; $j<count($list2); $j++) {
            if (md5(strtoupper($list1[$i] . " " . $list2[$j])) == $hash) {
                return $list1[$i] . " " . $list2[$j];
            }
        }
    }
    for ($i=0; $i<count($biglist1); $i++) {
        for ($j=0; $j<count($biglist2); $j++) {
            if (md5(strtoupper($biglist1[$i] . " " . $biglist2[$j])) == $hash) {
                return $biglist1[$i] . " " . $biglist2[$j];
            }
        }
    }
    if ($numChars1 + $numChars2 <= 6) {
        return combinationsTwo($numChars1+$numChars2, "", $hash, $numChars1);
    }
    return;
}

// three words (2 spaces)
function findWord2($hash, $list1, $list2, $list3, $biglist1, $biglist2, $biglist3, $numChars1, $numChars2, $numChars3) {
    for ($i=0; $i<count($list1); $i++) {
        for ($j=0; $j<count($list2); $j++) {
            for ($k=0; $k<count($list3); $k++) {
                if (md5(strtoupper($list1[$i] . " " . $list2[$j] . " " . $list3[$k])) == $hash) {
                    return $list1[$i] . " " . $list2[$j] . " " . $list3[$k];
                }
            }
        }
    }
    if ($numChars1 <= 1 || $numChars2 <= 1 || $numChars3 <= 1) {
        for ($i=0; $i<count($biglist1); $i++) {
            for ($j=0; $j<count($biglist2); $j++) {
                for ($k=0; $k<count($biglist3); $k++) {
                    if (md5(strtoupper($biglist1[$i] . " " . $biglist2[$j] . " " . $biglist3[$k])) == $hash) {
                        return ($biglist1[$i] . " " . $biglist2[$j] . " " . $biglist3[$k]);
                    }
                }
            }
        }
        return;
    }
    return;
}

function findWordHelp($word, $hash) {
    $numSpaces = substr_count($word, ' ');
    $functionName = "findWord" . $numSpaces . "Help";
    global $array1, $array2, $array3, $array4, $array5, $array6, $array7, $array8, $array9, $array10, $array11;
    global $bigarray2, $bigarray3, $bigarray4, $bigarray5, $bigarray6, $bigarray7, $bigarray8, $bigarray9, $bigarray10, $bigarray11;
    $bigarray1 = $array1;
    if ($numSpaces == 0) {
        return;
    }
    if ($numSpaces == 1) {
        $numDots1 = strpos($word, " ");
        $numDots2 = strlen($word) - $numDots1 - 1;
        if ($numDots1>11 || $numDots2>11) {
            return;
        }
        $arrayName1 = "array" . $numDots1;
        $arrayName2 = "array" . $numDots2;
        $bigArrayName1 = "big" . $arrayName1;
        $bigArrayName2 = "big" . $arrayName2;

        $firstWord = substr($word, 0, $numDots1);
        $secondWord = substr($word, $numDots1 + 1, $numDots2);

        if (!containsDot($firstWord)) {
            $numDots1 = $firstWord;
        }
        if (!containsDot($secondWord)) {
            $numDots2 = $secondWord;
        }
        return $functionName($hash, $$arrayName1, $$arrayName2, $$bigArrayName1, $$bigArrayName2, $numDots1, $numDots2);
    }
    if ($numSpaces == 2) {
        $numDots1 = strpos($word, " ");
        $numDots2 = strrpos($word, " ") - $numDots1 - 1;
        $numDots3 = strlen($word) - $numDots1 - $numDots2 - 2;
        if ($numDots1>11 || $numDots2>11 || $numDots3>11) {
            return;
        }
        $arrayName1 = "array" . $numDots1;
        $arrayName2 = "array" . $numDots2;
        $arrayName3 = "array" . $numDots3;
        $bigArrayName1 = "big" . $arrayName1;
        $bigArrayName2 = "big" . $arrayName2;
        $bigArrayName3 = "big" . $arrayName3;
        $firstWord = substr($word, 0, $numDots1);
        $secondWord = substr($word, $numDots1 + 1, $numDots2);
        $thirdWord = substr($word, $numDots1 + $numDots2 + 2);
        if (!containsDot($firstWord)) {
            $numDots1 = $firstWord;
        }
        if (!containsDot($secondWord)) {
            $numDots2 = $secondWord;
        }
        if (!containsDot($thirdWord)) {
            $numDots3 = $thirdWord;
        }
        return $functionName($hash, $$arrayName1, $$arrayName2, $$arrayName3, $$bigArrayName1, $$bigArrayName2, $$bigArrayName3, $numDots1, $numDots2, $numDots3);
    }
    if ($numSpaces == 3) {
        $numDots1 = strpos($word, " ");
        $numDots2 = strpos($word, " ", $numDots1+1)-$numDots1-1;
        $numDots3 = strpos($word, " ", $numDots1+$numDots2+2)-$numDots1-$numDots2-2;
        $numDots4 = strlen($word)-$numDots1-$numDots2-$numDots3-3;

        if ($numDots1>11 || $numDots2>11 || $numDots3>11 || $numDots4>11) {
            return;
        }

        $arrayName1 = "array" . $numDots1;
        $arrayName2 = "array" . $numDots2;
        $arrayName3 = "array" . $numDots3;
        $arrayName4 = "array" . $numDots4;
        $bigArrayName1 = "big" . $arrayName1;
        $bigArrayName2 = "big" . $arrayName2;
        $bigArrayName3 = "big" . $arrayName3;
        $bigArrayName4 = "big" . $arrayName4;

        $firstWord = substr($word, 0, $numDots1);
        $secondWord = substr($word, $numDots1 + 1, $numDots2);
        $thirdWord = substr($word, $numDots1 + $numDots2 + 2, $numDots3);
        $fourthWord = substr($word, $numDots1 + $numDots2 + $numDots3 + 3);
        if (!containsDot($firstWord)) {
            $numDots1 = $firstWord;
        }
        if (!containsDot($secondWord)) {
            $numDots2 = $secondWord;
        }
        if (!containsDot($thirdWord)) {
            $numDots3 = $thirdWord;
        }
        if (!containsDot($fourthWord)) {
            $numDots4 = $fourthWord;
        }

        return $functionName($hash, $$arrayName1, $$arrayName2, $$arrayName3, $$arrayName4, $$bigArrayName1, $$bigArrayName2, $$bigArrayName3, $$bigArrayName4, $numDots1, $numDots2, $numDots3, $numDots4);
    }
    return;
}

function containsDot($word) {
    for ($i = 0; $i<strlen($word); $i++) {
        if (substr($word, $i, 1) == ".") {
            return TRUE;
        }
    }
    return FALSE;
}

$alphabet = "abcdefghijklmnopqrstuvwxyz";

function combinationsWithWord($numLetters, $curr, $hash, $knownWord, $placement) {
    global $alphabet;

    if ($numLetters == 0) {
        if ($placement == "first") {
            if ($hash == md5(strtoupper($knownWord . " " . $curr))){
                return $knownWord . " " . $curr;
            }
        }
        if ($placement == "second") {
            if ($hash == md5(strtoupper($curr . " " . $knownWord))){
                return $curr . " " . $knownWord;
            }
        }        
        return;
    } else {
        for ($i=0; $i<strlen($alphabet); $i++) {
            $result = combinationsWithWord($numLetters - 1, substr($alphabet, $i, 1) . $curr, $hash, $knownWord, $placement);
            if ($result !== null) {
                return $result;
            }
        }  
    }
    return;
}

function findWord1Help($hash, $list1, $list2, $biglist1, $biglist2, $numChars1, $numChars2) {
    $count1 = $numChars1;
    $count2 = $numChars2;
    $knownWord = "";
    if (!is_numeric($numChars1)) {
        $list1 = [$numChars1];
        $biglist1 = [$numChars1];
        $count1 = 0;
        $knownWord = $numChars1;
        $otherLength = $numChars2;
        $placement = "first";
    }
    if (!is_numeric($numChars2)) {
        $list2 = [$numChars2];
        $biglist2 = [$numChars2];
        $count2 = 0;
        $knownWord = $numChars2;
        $otherLength = $numChars1;
        $placement = "second";
    }
    for ($i=0; $i<count($list1); $i++) {
        for ($j=0; $j<count($list2); $j++) {
            if (md5(strtoupper($list1[$i] . " " . $list2[$j])) == $hash) {
                return $list1[$i] . " " . $list2[$j];
            }
        }
    }
    for ($i=0; $i<count($biglist1); $i++) {
        for ($j=0; $j<count($biglist2); $j++) {
            if (md5(strtoupper($biglist1[$i] . " " . $biglist2[$j])) == $hash) {
                return ($biglist1[$i] . " " . $biglist2[$j]);
            } 
        }
    }
    if ($count1 + $count2 <= 6) {
        return combinationsWithWord($otherLength, "", $hash, $knownWord, $placement);
    }
    return;
}

function findWord2Help($hash, $list1, $list2, $list3, $biglist1, $biglist2, $biglist3, $numChars1, $numChars2, $numChars3) {
    if (!is_numeric($numChars1)) {
        $list1 = [$numChars1];
        $biglist1 = [$numChars1];
    }
    if (!is_numeric($numChars2)) {
        $list2 = [$numChars2];
        $biglist2 = [$numChars2];
    }
    if (!is_numeric($numChars3)) {
        $list3 = [$numChars3];
        $biglist3 = [$numChars3];
    }
    for ($i=0; $i<count($list1); $i++) {
        for ($j=0; $j<count($list2); $j++) {
            for ($k=0; $k<count($list3); $k++) {
                if (md5(strtoupper($list1[$i] . " " . $list2[$j] . " " . $list3[$k])) == $hash) {
                    return $list1[$i] . " " . $list2[$j] . " " . $list3[$k];
                }
            }
        }
    }
    for ($i=0; $i<count($biglist1); $i++) {
        for ($j=0; $j<count($biglist2); $j++) {
            for ($k=0; $k<count($biglist3); $k++) {
                if (md5(strtoupper($biglist1[$i] . " " . $biglist2[$j] . " " . $biglist3[$k])) == $hash) {
                    return ($biglist1[$i] . " " . $biglist2[$j] . " " . $biglist3[$k]);
                }
            }
        }
    }
    return;
}

function findWord3Help($hash, $list1, $list2, $list3, $list4, $biglist1, $biglist2, $biglist3, $biglist4, $numChars1, $numChars2, $numChars3, $numChars4) {
    if (!is_numeric($numChars1)) {
        $list1 = [$numChars1];
        $biglist1 = [$numChars1];
    }
    if (!is_numeric($numChars2)) {
        $list2 = [$numChars2];
        $biglist2 = [$numChars2];
    }
    if (!is_numeric($numChars3)) {
        $list3 = [$numChars3];
        $biglist3 = [$numChars3];
    }
    if (!is_numeric($numChars4)) {
        $list4 = [$numChars4];
        $biglist4 = [$numChars4];
    }
    echo $list1[0] . ", " . $list2[0] . ", " . $list3[0] . ", " . $list4[0];
    for ($i=0; $i<count($list1); $i++) {
        for ($j=0; $j<count($list2); $j++) {
            for ($k=0; $k<count($list3); $k++) {
                for ($l=0; $l<count($list4); $l++) {
                    if (md5(strtoupper($list1[$i] . " " . $list2[$j] . " " . $list3[$k] . " " . $list4[$l])) == $hash) {
                        return $list1[$i] . " " . $list2[$j] . " " . $list3[$k] . " " . $list4[$l];
                    }
                }
            }
        }
    }
    for ($i=0; $i<count($biglist1); $i++) {
        for ($j=0; $j<count($biglist2); $j++) {
            for ($k=0; $k<count($biglist3); $k++) {
                for ($l=0; $l<count($list4); $l++) {
                    if (md5(strtoupper($biglist1[$i] . " " . $biglist2[$j] . " " . $biglist3[$k] . " " . $biglist4[$l])) == $hash) {
                        return $biglist1[$i] . " " . $biglist2[$j] . " " . $biglist3[$k] . " " . $biglist4[$l];
                    }
                }
            }
        }
    }
    return;
}


?>