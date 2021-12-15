
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

<?php
    $str1= '092007'; 
    echo substr(chunk_split($str1, 2, ':'), 0, -1)."\n";
    ?>
</body>
</html>
