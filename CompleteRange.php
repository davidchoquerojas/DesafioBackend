<?php
    /**
    * Prueba resolucion nro 2;
    * Autor : David Choque
    * Date: 09/11/2017
    */
	class CompleteRange
	{
		static function build($listNumber)
		{
			$size = count($listNumber);
			if ($size == 0)
				return [];
			$start = $listNumber[0];
			$end = $listNumber[$size-1];
			return range($start, $end);
		}
		
	}
	$result = CompleteRange::build([1,2,4,5]);
	var_dump($result);
	$result = CompleteRange::build([2,4,9]);
	var_dump($result);
	$result = CompleteRange::build([55,58,60]);
	var_dump($result);