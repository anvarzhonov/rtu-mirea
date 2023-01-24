<?php
class Circle{
	public $color;
	public $radius;
	public $ID;
	function getCircleTag(){
	$center = $this->radius + 10;
	$css = "fill: " . $this->color . ";";
	$circleTag = "<circle id='".$this->ID."' cx='$center' cy='$center' r='$this->radius' style='$css'";
	return $circleTag;
    }
}
?>