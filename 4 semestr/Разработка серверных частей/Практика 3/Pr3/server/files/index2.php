<html lang="en">
<head>
<title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>

<?php
$image = imageCreateTrueColor(500, 400);
$blue = imageColorAllocate($image, 0, 0, 250);
$greyblue = imageColorAllocate($image, 0xDB, 0xE3, 0xEA);
imageFilledRectangle($image, 0, 0, 499, 399, $greyblue);
imageRectangle($image, 10, 10, 150, 90, $blue);
imagepng($image);
imageDestroy($image)
?>
</body>
</html>