<?php

require __DIR__ . "/vendor/autoload.php";
try {
	$argumentValidator = new ArgumentValidator();
	$argumentValidator->validate($argc, $argv);
	$sudokuFactory = new SudokuFactory();
	$sudoku = $sudokuFactory->create($argv[1]);
	$sodukuSolver = new SudokuSolver();
	if (!$sudoku->isComplete()) {
		$sudoku = $sodukuSolver->logicallySolve($sudoku);
	}
	if (!$sudoku->isComplete()) {
		$sudoku = $sodukuSolver->exhaustivelySolve($sudoku);
	}
	if (!$sudoku->isSolved()) {
		throw new Exception("Unsolvable argument");
	}
	echo $sudoku->concatenateCells() . "\n";
} catch (Exception $exception) {
	echo $exception->getMessage() . "\n";
}