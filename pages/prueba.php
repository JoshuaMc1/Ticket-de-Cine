<html>
<head>
<style type="text/css">
table td{
    min-width:50px;
    min-height:50px;
    text-align:center;  
}
</style>
</head>
<body>
<?php
	echo "<table>";
	$conta = 1;
	for ($i = 1; $i <= 10; $i++){
		echo "
		<tr>
			<td>
				<div style='border:1px solid black; width:50px; height:50px; text-align:center; line-height:50px;'>".$conta++."</div>
			</td>
			<td>
				<div style='border:1px solid black; width:50px; height:50px; margin-right:50px; text-align:center; line-height:50px;'>".$conta++."</div>
			</td>
			<td>
				<div style='border:1px solid black; width:50px; height:50px; text-align:center; line-height:50px;'>".$conta++."</div>
			</td>
			<td>
				<div style='border:1px solid black; width:50px; height:50px; text-align:center; line-height:50px;'>".$conta++."</div>
			</td>
		</tr>";
	}
	echo "</table>";


   
?>




</body>
</html>