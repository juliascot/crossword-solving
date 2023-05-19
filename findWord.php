<?php

ini_set('max_execution_time', '0');

//set up arrays of different length words

    //array1
    $onelw = "oneLetterWords.txt";

    $openOne = @fopen($onelw, 'r'); 

    if ($openOne) {
    $array1 = explode(", ", fread($openOne, filesize($onelw)));
    }

    //array2
    $twolw = "mod2LetterWords.txt";

    $openTwo = @fopen($twolw, 'r'); 

    if ($openTwo) {
    $array2 = explode(", ", fread($openTwo, filesize($twolw)));
    }

    //array3
    $threelw = "3_letter_words.txt";

    $openThree = @fopen($threelw, 'r'); 

    if ($openThree) {
    $array3 = explode(", ", fread($openThree, filesize($threelw)));
    }

    //array4
    $fourlw = "mod4LetterWords.txt";

    $openFour = @fopen($fourlw, 'r'); 

    if ($openFour) {
    $array4 = explode(", ", fread($openFour, filesize($fourlw)));
    }

    //array5
    $fivelw = "mod5LetterWords.txt";

    $openFive = @fopen($fivelw, 'r'); 

    if ($openFive) {
    $array5 = explode(", ", fread($openFive, filesize($fivelw)));
    }

    //array6
    $sixlw = "sixLetterWords.txt";

    $openSix = @fopen($sixlw, 'r'); 

    if ($openSix) {
    $array6 = explode(", ", fread($openSix, filesize($sixlw)));
    }

    //array7
    $sevenlw = "sevenLetterWords.txt";

    $openSeven = @fopen($sevenlw, 'r'); 

    if ($openSeven) {
    $array7 = explode(", ", fread($openSeven, filesize($sevenlw)));
    }

    //array8
    $eightlw = "mod8LetterWords.txt";

    $openEight = @fopen($eightlw, 'r'); 

    if ($openEight) {
    $array8 = explode(", ", fread($openEight, filesize($eightlw)));
    }

    //array9
    $ninelw = "nineLetterWords.txt";

    $openNine = @fopen($ninelw, 'r'); 

    if ($openNine) {
    $array9 = explode(", ", fread($openNine, filesize($ninelw)));
    }

    //array10
    $tenlw = "tenLetterWords.txt";

    $openTen = @fopen($tenlw, 'r'); 

    if ($openTen) {
    $array10 = explode(", ", fread($openTen, filesize($tenlw)));
    }

    //array11
    $elevenlw = "11letwords.txt";

    $openEleven = @fopen($elevenlw, 'r');

    if ($openEleven) {
        $array11 = explode(", ", fread($openEleven, filesize($elevenlw)));
    }


    //big arrays now!


    //one
    $bigarray1 = $array1;

    //two
    $twolw = "big2lets.txt";

    $openTwo = @fopen($twolw, 'r'); 

    if ($openTwo) {
    $bigarray2 = explode(", ", fread($openTwo, filesize($twolw)));
    }

    //three
    $threelw = "big3lets.txt";

    $openThree = @fopen($threelw, 'r'); 

    if ($openThree) {
    $bigarray3 = explode(", ", fread($openThree, filesize($threelw)));
    }

    //four
    $fourlw = "big4lets.txt";

    $openFour = @fopen($fourlw, 'r'); 

    if ($openFour) {
    $bigarray4 = explode(", ", fread($openFour, filesize($fourlw)));
    }

    //five
    $fivelw = "big5lets.txt";

    $openFive = @fopen($fivelw, 'r'); 

    if ($openFive) {
    $bigarray5 = explode(", ", fread($openFive, filesize($fivelw)));
    }

    //six
    $sixlw = "big6lets.txt";

    $openSix = @fopen($sixlw, 'r'); 

    if ($openSix) {
    $bigarray6 = explode(", ", fread($openSix, filesize($sixlw)));
    }

    //seven
    $sevenlw = "big7lets.txt";

    $openSeven = @fopen($sevenlw, 'r'); 

    if ($openSeven) {
    $bigarray7 = explode(", ", fread($openSeven, filesize($sevenlw)));
    }

    //eight
    $eightlw = "big8lets.txt";

    $openEight = @fopen($eightlw, 'r'); 

    if ($openEight) {
    $bigarray8 = explode(", ", fread($openEight, filesize($eightlw)));
    }

    //nine
    $ninelw = "big9lets.txt";

    $openNine = @fopen($ninelw, 'r'); 

    if ($openNine) {
    $bigarray9 = explode(", ", fread($openNine, filesize($ninelw)));
    }

    //ten
    $tenlw = "big10lets.txt";

    $openTen = @fopen($tenlw, 'r'); 

    if ($openTen) {
    $bigarray10 = explode(", ", fread($openTen, filesize($tenlw)));
    }

    //eleven
    $elevenlw = "big11lets.txt";

    $openEleven = @fopen($elevenlw, 'r'); 

    if ($openEleven) {
    $bigarray11 = explode(", ", fread($openEleven, filesize($elevenlw)));
    }


//
//lotsa lil tests

    // //should return nova
    // echo findWord("....", "553648c8088b83c091b0be46f9ee7498");

    // //should return witch
    // findWord(".....", "5848bf342b608bc7fbf5231a63859607");

    //should return general anesthesia
    // echo findWord("....... ..........", "75d3e0fefaaeb1dbfd9570e9dd347c3a");

    // //should return rob federal reserve
    // findWord("... ....... .......", "38fe9cf284ddf6fd002527ea350ed6c7");

    // echo combinationsTwo(4, "", "cf53968a56f8781b833b7c20c966343a", 2);


//
//takes in dot versions of words and the hash, then translates the information to call the appropriate function
function findWord($word, $hash) {
    $numSpaces = substr_count($word, ' ');
    $functionName = "findWord" . $numSpaces;
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
        return $functionName($hash, $$arrayName, $numDots, $$bigArray);
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
        return $functionName($hash, $$arrayName1, $$arrayName2, $$arrayName3, $$bigArrayName1, $$bigArrayName2, $$bigArrayName3, $numDots1, $numDots2, $numDots3);
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

//one word (0 spaces)
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

//three words (2 spaces)
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