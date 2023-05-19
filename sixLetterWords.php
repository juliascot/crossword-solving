<?php


$listOfWords = file_get_contents("eightLetterWords.txt");
$listOfWords = str_replace('<li>', '', $listOfWords);
$listOfWords = str_replace('<ul>', '', $listOfWords);
$listOfWords = str_replace('</li>', ',', $listOfWords);
$listOfWords = str_replace('</ul>', '', $listOfWords);
$listOfWords = str_replace('/\s+/', ' ', $listOfWords);

file_put_contents("eightLetterWords.txt", $listOfWords);
echo $listOfWords;

?>