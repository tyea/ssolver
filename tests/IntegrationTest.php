<?php

use PHPUnit\Framework\TestCase;

class IntegrationTest extends TestCase
{

    public function testMissingArguments()
    {
    	$argumentValidator = new ArgumentValidator();
    	$this->expectException("Exception");
    	$this->expectExceptionMessage("Missing argument");
    	$argumentValidator->validate(1, ["foo"]);
    }
    
    public function testArgumentFormatted()
    {
    	$argumentValidator = new ArgumentValidator();
    	$this->expectException("Exception");
    	$this->expectExceptionMessage("Invalid argument");
    	$argumentValidator->validate(2, ["foo", "bar"]);
    }
    
    public function testUnneccessaryArguments()
    {
    	$argumentValidator = new ArgumentValidator();
    	$this->expectException("Exception");
    	$this->expectExceptionMessage("Unneccessary argument");
    	$argumentValidator->validate(3, ["foo", "bar", "baz"]);
    }
    
    public function testLogicallySolvableSoduku()
    {
    	$puzzle = "53??7????6??195????98????6?8???6???34??8?3??17???2???6?6????28????419??5????8??79";
    	$solution = "534678912672195348198342567859761423426853791713924856961537284287419635345286179";
    	$solved = trim(shell_exec("php -f " . __DIR__ . "/../ssolver.php " . $puzzle));
    	$this->assertSame($solved, $solution);
    }
    
    public function testExhaustivelySolvableSoduku()
    {
    	$puzzle = "53??7????6??195????98????6?8???6???34??8?3??17???2???6?6????2?????419??5????8??79";
    	$solution = "534678912672195348198342567859761423426853791713924856961537284287419635345286179";
    	$solved = trim(shell_exec("php -f " . __DIR__ . "/../ssolver.php " . $puzzle));
    	$this->assertSame($solved, $solution);
    }
    
    public function testSolvedSoduku()
    {
    	$solution = "534678912672195348198342567859761423426853791713924856961537284287419635345286179";
    	$solved = trim(shell_exec("php -f " . __DIR__ . "/../ssolver.php " . $solution));
    	$this->assertSame($solved, $solution);
    }
}