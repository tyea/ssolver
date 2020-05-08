<?php

class SudokuFactory
{
	public function create(string $values): Sudoku
	{
		$sudoku = new Sudoku();
		for ($iterations = 0; $iterations < 9; $iterations += 1) {
			$sudoku->boxes[] = new CellContainer();
			$sudoku->rows[] = new CellContainer();
			$sudoku->columns[] = new CellContainer();
		}
		foreach (str_split($values) as $index => $value) {
			$cell = new Cell();
			$cell->value = ctype_digit($value) ? intval($value) : null;
			$cell->boxIndex = (floor(floor($index / 9) / 3) * 3) + floor(($index % 9) / 3);
			$cell->rowIndex = floor($index / 9);
			$cell->columnIndex = $index % 9;
			$sudoku->boxes[$cell->boxIndex]->cells[] = $cell;
			$sudoku->rows[$cell->rowIndex]->cells[] = $cell;
			$sudoku->columns[$cell->columnIndex]->cells[] = $cell;
			$sudoku->cells[] = $cell;
		}
		return $sudoku;
	}
}
