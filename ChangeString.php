<?php
	/**
    * Prueba resolucion nro 1;
    * Auto : David Choque
    * Date: 09/11/2017
	*/
	class ChangeString
	{
		private $sAlphabet;
		function __construct($sAlphabet)
		{
			$this->sAlphabet = $sAlphabet;
		}
		function build($input)
		{
			for ($_i=0; $_i<strlen($input); ++$_i) {
				$input[$_i] = $this->buildCharacter($input[$_i]);
			}
			return $input;
		}
		function buildCharacter($sCharacter)
		{
			$isUpper = ($sCharacter == strtoupper($sCharacter));
			$iRetornoIndex = array_search(strtolower($sCharacter), $this->sAlphabet);
			if ($iRetornoIndex === false)
				return $sCharacter;
			if ($iRetornoIndex == count($this->sAlphabet)-1)
				$iRetorno = 0;
			else
				$iRetornoIndex = $iRetornoIndex+1;
			if ($isUpper)
				return strtoupper($this->sAlphabet[$iRetornoIndex]);
			return $this->sAlphabet[$iRetornoIndex];
		}
	}
	$oChangeString = new ChangeString(['a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z']);
	echo $oChangeString->build("123 abcd*3");
	echo PHP_EOL;
	echo $oChangeString->build("**Casa 52");
	echo PHP_EOL;
	echo $oChangeString->build("**Casa 52Z");