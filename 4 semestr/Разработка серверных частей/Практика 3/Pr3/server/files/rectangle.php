<?php
class Rectangle{
	public $color;
	public $width;
    public $height;
	public $ID;
	
	function getRectangleTag(){
	$css = "fill: " . $this->color . ";";
	$rectangeTag = "<rect id='".$this->ID."' width='$this->width' height='$this->height' style='$css'/>";
	return $rectangeTag;
    }

}
?>