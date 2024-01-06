<?php

/**
 * @param string $input
 *
 * @return bool
 * @throws Exception for empty input
 */
function isParenthesisValid(string $input = ''): bool
{
	$openBrackets = '(<[';
	$closeBrackets = ')>]';
	$brackets = [];
	if ($input === '')
	{
		throw new Exception("Empty input");
	}
	foreach (str_split($input) as $char)
	{
		if (strpos($closeBrackets, $char) !== false && empty($brackets))
		{
			return false;
		}
		if (
			strpos($closeBrackets, $char) !== false
			&& strpos($openBrackets, array_pop($brackets)) !== strpos($closeBrackets, $char)
		)
		{
			return false;
		}
		if (strpos($openBrackets, $char) !== false)
		{
			$brackets[] = $char;
		}
	}
	if (empty($brackets))
	{
		return true;
	}

	return false;
}