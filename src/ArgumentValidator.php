<?php

class ArgumentValidator
{
	public function validate(int $argc, array $argv): void
	{
		if ($argc == 1) {
			throw new Exception("Missing argument");
		}
		if ($argc > 2) {
			throw new Exception("Unnecessary argument");
		}
		if (!preg_match("/[1-9\\?]{81}/", $argv[1])) {
			throw new Exception("Invalid argument");
		}
	}
}
