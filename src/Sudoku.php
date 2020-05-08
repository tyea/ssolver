<?php

class Sudoku
{
	public $boxes = [];
	public $rows = [];
	public $columns = [];
	public $cells = [];

	public function isComplete(): bool
	{
		foreach ($this->cells as $cell) {
			if (!$cell->value) {
				return false;
			}
		}
		return true;
	}

	public function isSolved(): bool
	{
		foreach ($this->boxes as $box) {
			$remainingValues = array_combine(range(1, 9), range(1, 9));
			foreach ($box->cells as $boxCell) {
				if ($boxCell->value) {
					unset($remainingValues[$boxCell->value]);
				}
			}
			if (count($remainingValues) != 0) {
				return false;
			}
		}
		foreach ($this->rows as $row) {
			$remainingValues = array_combine(range(1, 9), range(1, 9));
			foreach ($row->cells as $rowCell) {
				if ($rowCell->value) {
					unset($remainingValues[$rowCell->value]);
				}
			}
			if (count($remainingValues) != 0) {
				return false;
			}
		}
		foreach ($this->columns as $column) {
			$remainingValues = array_combine(range(1, 9), range(1, 9));
			foreach ($column->cells as $columnCell) {
				if ($columnCell->value) {
					unset($remainingValues[$columnCell->value]);
				}
			}
			if (count($remainingValues) != 0) {
				return false;
			}
		}
		return true;
	}

	public function concatenateCells(): string
	{
		$cells = "";
		foreach ($this->cells as $cell) {
			$cells .= strval($cell->value);
		}
		return $cells;
	}
}
