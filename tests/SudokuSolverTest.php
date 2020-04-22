<?php

use PHPUnit\Framework\TestCase;

class SudokuSolverTest extends TestCase
{   
    public function testLogicallySolvableSoduku()
    {
    	$input = "53??7????6??195????98????6?8???6???34??8?3??17???2???6?6????28????419??5????8??79";
		$sudokuFactory = new SudokuFactory();
		$sudoku = $sudokuFactory->create($input);
		$sodukuSolver = new SudokuSolver();
		$sudoku = $sodukuSolver->logicallySolve($sudoku);
		$output = $sudoku->concatenateCells();
		$solution = "534678912672195348198342567859761423426853791713924856961537284287419635345286179";
    	$this->assertSame($solution, $output);
    }
    
    public function testExhaustivelySolvableSoduku()
    {
    	$input = "53??7????6??195????98????6?8???6???34??8?3??17???2???6?6????2?????419??5????8??79";
		$sudokuFactory = new SudokuFactory();
		$sudoku = $sudokuFactory->create($input);
		$sodukuSolver = new SudokuSolver();
		$sudoku = $sodukuSolver->logicallySolve($sudoku);
		$sudoku = $sodukuSolver->exhaustivelySolve($sudoku);
		$output = $sudoku->concatenateCells();
		$solution = "534678912672195348198342567859761423426853791713924856961537284287419635345286179";
    	$this->assertSame($solution, $output);
    }
    
    public function testSolvedSoduku()
    {
		$input = "534678912672195348198342567859761423426853791713924856961537284287419635345286179";
		$sudokuFactory = new SudokuFactory();
		$sudoku = $sudokuFactory->create($input);
    	$this->assertSame(true, $sudoku->isSolved());
    }
}