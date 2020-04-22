<?php

use PHPUnit\Framework\TestCase;

class ArgumentValidatorTest extends TestCase
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
    
    public function testUnnecessaryArguments()
    {
    	$argumentValidator = new ArgumentValidator();
    	$this->expectException("Exception");
    	$this->expectExceptionMessage("Unnecessary argument");
    	$argumentValidator->validate(3, ["foo", "bar", "baz"]);
    }
}