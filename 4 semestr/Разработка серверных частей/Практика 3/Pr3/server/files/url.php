<?php
class Url{
	function getparametrs(){
		$parametrs = $_SERVER['QUERY_STRING'];
		return $parametrs;
	}
}
?>