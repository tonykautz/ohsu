<html>
 <head>
  <title>PHP Test Branch</title>
 </head>
 <body>

<?php
    $file= $_GET["request"] . ".csv";
    $fopen = fopen($file, r);
    $fread = fread($fopen,filesize($file));
    fclose($fopen);
    $split = explode("\n", $fread);
    $rebuilt = null;
    $array[] = null;
    $tab = "\t";
    $start = $_GET["offset"];
    $end = $_GET["limit"]+ 1;
    print_r($array[0]);
    foreach ($split as $string)
    {
	if ($end > 0 and $end > $start)
	{
        $row = explode($tab, $string);
        array_push($array, $row);
	
	$rebuilt = $rebuilt . $string;
	}
	$end = $end - 1;
    }
    $myJSON = json_encode("$rebuilt");
    echo $myJSON;
?>
 </body>
</html>