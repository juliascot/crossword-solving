# crossword-solving
all files for the Daniel crossword solver

Start by opening the main.php. Enter in the information from the example crossword html file (hashes in source code) and example pdf (lengths of words). It may take 
up to five minutes for the guesser to go through all of the word lists for any given word.

Once all clues are entered in, copy and paste the source code from the crossword html file and hit enter.

This takes you to the final.php, where all of the information has been translated. After hitting submit on all of the solved clues, copy and paste the message
into the box. You may then edit the message with your guesses for what the words will end up being. Clicking submit on this section will fill in what the 
corresponding crossword clues would need to be for that guess to be correct.

Once you have obtained enough information to guess at what any one word in a clue will be, click on the link to take you to solver.php. This is just a modified
version of the original main.php, the difference being that solver.php will take in guesses at words.

If at any point you figure out one of the unsolved clues, make sure to enter it into its spot in final.php, delete it from the Unsolved Clue list, and re-copy/paste
the message into the box (as it will have changed).

Happy solving! Now if my friend Daniel ever sends you a highly specific crossword creation, you should be able to solve it in a way he did not intend! 😎

Also, all word lists were taken from various places on the internet; I just assembled them in a way that worked for my code
