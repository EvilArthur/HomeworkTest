<?php

use PHPUnit\Framework\TestCase;

class MainTests extends TestCase
{
	public function testTrivialCases()
	{
		$this->expectException(Exception::class);
		$this->assertTrue(isParenthesisValid('Hello there'));
		isParenthesisValid('');
	}

	public function testOneTypeBrackets()
	{
		$this->assertTrue(isParenthesisValid('Hello (there)'));
		$this->assertFalse(isParenthesisValid('Hello (there'));
		$this->assertFalse(isParenthesisValid('Hello )there('));
	}

	public function testTwoTypesBrackets()
	{
		$this->assertTrue(isParenthesisValid('Hello (th[e]re)'));
		$this->assertFalse(isParenthesisValid('Hello (th[ere)'));
		$this->assertFalse(isParenthesisValid('Hello (th[e)re]'));
	}

	public function testThreeTypesBrackets()
	{
		$this->assertTrue(isParenthesisValid('<Hello (there)>'));
		$this->assertFalse(isParenthesisValid('Hello (there)>'));
		$this->assertFalse(isParenthesisValid('Hello (th[e<)re]>'));
	}
}