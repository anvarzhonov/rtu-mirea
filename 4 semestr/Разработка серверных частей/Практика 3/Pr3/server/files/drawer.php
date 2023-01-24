<html lang="en">
<body>
<?php
	$drawing = new Drawing();
	$drawing -> getfigure();
class Drawing{
	function getfigure (){
		require_once ('url.php');
		$url = new Url();
		$figure = $url->getparametrs();
		$figure = preg_replace('/\D/', '',$figure);
		$figure=decbin($figure);
		if (strlen($figure)<3){
			$figure=str_pad($figure, 3, '0', STR_PAD_LEFT);
		}
		
		if ($figure[0]==0){
			if($figure[1]==1){
				if($figure[2]==1)
					$this->drawing_circle("red",500);
				else
					$this->drawing_circle("red",200);
			}
			else{
				if($figure[2]==1)
					$this->drawing_circle("green",500);
				else
					$this->drawing_circle("green",200);
			}
		}
		else{
			if($figure[1]==1){
				if($figure[2]==1)
					$this->drawing_rectangle("red",500);
				else
					$this->drawing_rectangle("red",200);
			}
			else{
				if($figure[2]==1)
					$this->drawing_rectangle("green",500);
				else
					$this->drawing_rectangle("green",200);
			}
		}
		echo "</br>" . $figure."</br>" ;
	}
	
	function drawing_circle ($color, $size){
	require_once ('circle.php');
	$circle = new Circle();
	$circle->color=$color;
	$circle->radius=$size/3;
	$circle->ID=1;
	echo "<svg width='".$size . "' height='".$size."'>";
	echo $circle->getCircleTag();
	echo "</svg>";
	}
	
	
	function drawing_rectangle ($color, $size){
	require_once ('rectangle.php');
	$rectangle = new Rectangle();
	$rectangle->color=$color;
	$rectangle->width=$size;
	$rectangle->height=$size/2;
	$rectangle->ID=2;
	echo "<svg width='".$size . "' height='".$size."'>";
	echo $rectangle->getRectangleTag();
	echo "</svg>";
	
	}
}
?>
</body>
</html>
