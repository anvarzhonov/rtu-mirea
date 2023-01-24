<?php
class Commands{
	function ls (){
		return passthru("ls");
	}
	
	function ps (){
		return passthru("ps");
	}
	
	function whoami (){
		return passthru("whoami");
	}
	
	function id (){
		return passthru("id");
	}
}
?>