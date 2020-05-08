<?php

class SudokuSolver
{
	public function logicallySolve(Sudoku $sudoku): Sudoku
	{
		while (true) {
			$unaffectedCells = 0;
			foreach ($sudoku->cells as $cell) {
				if ($cell->value) {
					$unaffectedCells += 1;
					continue;
				}
				$possibleBoxValues = array_combine(range(1, 9), range(1, 9));
				foreach ($sudoku->boxes[$cell->boxIndex]->cells as $boxCell) {
					if ($boxCell->value) {
						unset($possibleBoxValues[$boxCell->value]);
					}
				}
				$possibleRowValues = array_combine(range(1, 9), range(1, 9));
				foreach ($sudoku->rows[$cell->rowIndex]->cells as $rowCell) {
					if ($rowCell->value) {
						unset($possibleRowValues[$rowCell->value]);
					}
				}
				$possibleColumnValues = array_combine(range(1, 9), range(1, 9));
				foreach ($sudoku->columns[$cell->columnIndex]->cells as $columnCell) {
					if ($columnCell->value) {
						unset($possibleColumnValues[$columnCell->value]);
					}
				}
				$possibleValues = array_values(
					array_intersect(
						array_values($possibleBoxValues),
						array_values($possibleRowValues),
						array_values($possibleColumnValues)
					)
				);
				if (count($possibleValues) == 1) {
					$cell->value = $possibleValues[0];
					$cell->possibleValues = [];
					continue;
				}
				if ($cell->possibleValues == $possibleValues) {
					$unaffectedCells += 1;
					continue;
				}
				$cell->possibleValues = $possibleValues;
			}
			if ($unaffectedCells == 81) {
				break;
			}
		}
		return $sudoku;
	}

	public function exhaustivelySolve(Sudoku $sudoku): Sudoku
	{
		$pointers = [];
		$maxIterations = 1;
		foreach ($sudoku->cells as $cell) {
			if (!$cell->value) {
				$pointers[] = 0;
				$maxIterations *= count($cell->possibleValues);
			} else {
				$pointers[] = -1;
			}
		}
		$isSolved = false;
		for ($iterations = 0; $iterations < $maxIterations; $iterations +=1) {
			foreach ($pointers as $cellIndex => $pointer) {
				if ($pointer != -1) {
					$sudoku->cells[$cellIndex]->value = $sudoku->cells[$cellIndex]->possibleValues[$pointer];
				}
			}
			if ($sudoku->isSolved()) {
				$isSolved = true;
				break;
			}
			$cellIndex = 0;
			while (true) {
				if ($pointers[$cellIndex] == -1) {
					$cellIndex += 1;
					continue;
				}
				if (($pointers[$cellIndex] + 1) == count($sudoku->cells[$cellIndex]->possibleValues)) {
					$pointers[$cellIndex] = 0;
					$cellIndex += 1;
					continue;
				} else {
					$pointers[$cellIndex] += 1;
					break;
				}

			}
		}
		foreach ($sudoku->cells as $cell) {
			if (count($cell->possibleValues) != 0) {
				if ($isSolved) {
					$cell->possibleValues = [];
				} else {
					$cell->value = null;
				}
			}
		}
		return $sudoku;
	}
}
