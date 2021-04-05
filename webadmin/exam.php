<?php
require_once 'basics/config.php';
require_once 'basics/conexion.php';

$sqlx = "SELECT * FROM full_db WHERE act = 1 ORDER BY id ASC";
$result = $conn->query($sqlx);
if ($result->num_rows > 0) {
// output data of each row
$rowx = $result->fetch_assoc();

//$array = array("size" => "XL", "color" => "gold");
//$result = array_values($array);
//var_dump($result);
echo "Array has " . sizeof($rowx) . " elements";

print_r(array_values($rowx));

echo "divisor <br>";

print_r(array_keys($rowx));

while (list($key, $value) = each($rowx)) {
	//echo "$key: $value \n";
	echo "$key, \n";
}

	
}

?>