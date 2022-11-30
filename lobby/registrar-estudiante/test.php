<?php 

echo "<table border='1'>";
foreach ($_POST as $key => $value) {
	echo "<tr>";
	echo "<td>".$key."</td>";
	echo "<td>".$value."</td>";
	echo "</tr>";
}
echo "</table>";

?>