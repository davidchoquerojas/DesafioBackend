<?php
    /**
    * Prueba resolucion nro 2;
    * Autor : David Choque
    * Date: 09/11/2017
    */
	class ClearPar
	{
		static function build($sInput)
		{
			$iState = 0;
			$sOutput = '';
			for ($_i=0; $_i<strlen($sInput); ++$_i) {
				if ($iState == 0 && $sInput[$_i]=='(') {
					$iState = 1;
				} else if ($iState == 1 && $sInput[$_i]==')') {
					$sOutput .= '()';
					$iState = 0;
				}
			}
			return $sOutput;
		}
	}
	echo ClearPar::build("()())()"); // salida : "()()()"
	echo PHP_EOL;
	echo ClearPar::build("()(()"); // salida : "()()"
	echo PHP_EOL;
	echo ClearPar::build(")("); // salida : ""
	echo PHP_EOL;
	echo ClearPar::build("((()"); // salida : "()"