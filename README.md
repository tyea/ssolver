# Sudoku Solver

## About

A command line Sudoku solver written in PHP. It's quite fast for puzzles that are solvable with logic, but quite slow for puzzles that need to be bruteforced!

## Requirements

* PHP 7.3
* Composer

## Installation

* Clone this repository
* Run `composer install`

## Usage

The `ssolver.php` file is the entry point. It takes one argument, which is the unsolved Sudoku.

The unsolved Sudoku should be collapsed onto one line. Each character represents a cell, which means the argument should be 81 characters long. Use question marks to represent empty cells.
	
If the Sudoku can be solved the ouput will be in the same format.

## Examples

To solve this Sudoku:

	+---+---+---+---+---+---+---+---+---+
	| 5 | 3 |   |   | 7 |   |   |   |   |
	+---+---+---+---+---+---+---+---+---+
	| 6 |   |   | 1 | 9 | 5 |   |   |   |
	+---+---+---+---+---+---+---+---+---+
	|   | 9 | 8 |   |   |   |   | 6 |   |
	+---+---+---+---+---+---+---+---+---+
	| 8 |   |   |   | 6 |   |   |   | 3 |
	+---+---+---+---+---+---+---+---+---+
	| 4 |   |   | 8 |   | 3 |   |   | 1 |
	+---+---+---+---+---+---+---+---+---+
	| 7 |   |   |   | 2 |   |   |   | 6 |
	+---+---+---+---+---+---+---+---+---+
	|   | 6 |   |   |   |   | 2 | 8 |   |
	+---+---+---+---+---+---+---+---+---+
	|   |   |   | 4 | 1 | 9 |   |   | 5 |
	+---+---+---+---+---+---+---+---+---+
	|   |   |   |   | 8 |   |   | 7 | 9 |
	+---+---+---+---+---+---+---+---+---+
	
Run:

	php -f ssolver.php 53??7????6??195????98????6?8???6???34??8?3??17???2???6?6????28????419??5????8??79

Which should produce:

	534678912672195348198342567859761423426853791713924856961537284287419635345286179

## Tests

There are some basic integration tests in the `tests` directory. Run `vendor/bin/phpunit --do-not-cache-result --bootstrap vendor/autoload.php tests` to execute them.

## Author

Written by Tom Yeadon.