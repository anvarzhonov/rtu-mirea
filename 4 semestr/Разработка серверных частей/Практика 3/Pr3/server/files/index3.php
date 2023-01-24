<html lang="en">
<body>
<?php
	require_once ('mergesort.php');
	$mas = array(5,7,2,3,9,4);
	$mergesort = new Sort();
	$sorted_mas=$mergesort->mergeSort($mas);
	foreach ($sorted_mas as $element){
		echo $element . "  ";
	}
	
	require_once ('commands.php');
	$commands = new Commands();
	echo $commands->ls() . "<br/>";
	echo $commands->ps() . "<br/>";
	echo $commands->whoami() . "<br/>";
	echo $commands->id() . "<br/>";
?>
</br>
<a href ="http://localhost/drawer.php?num=0" target="_blank">Ссылка на маленький зеленый круг </a>
</br>
<a href ="http://localhost/drawer.php?num=1" target="_blank"> Ссылка на большой зеленый круг</a>
</br>
<a href ="http://localhost/drawer.php?num=2" target="_blank"> Ссылка на маленький красный круг</a>
</br>
<a href ="http://localhost/drawer.php?num=3" target="_blank"> Ссылка на большой красный круг</a>
</br>
<a href ="http://localhost/drawer.php?num=4" target="_blank"> Ссылка на маленький зеленый прямоугольник</a>
</br>
<a href ="http://localhost/drawer.php?num=5" target="_blank"> Ссылка на большой зеленый прямоугольник</a>
</br>
<a href ="http://localhost/drawer.php?num=6" target="_blank"> Ссылка на маленький красный прямоугольник</a>
</br>
<a href ="http://localhost/drawer.php?num=7" target="_blank"> Ссылка на большой красный прямоугольник</a>
</body>
</html>