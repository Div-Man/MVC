<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style>
		table {
			border-spacing: 0;
			border-collapse: collapse;
		}
		
		td, th {
			border: 1px solid;
			padding:10px;
		}
		
		.center td{
			text-align: center;
		}
	</style>
</head>
<body>	
	<p><a href="?">Перейти к созданию таблицы</a></p>
	<?php
		echo 'Выберите таблицу<br>';
		echo '<ol>';
		foreach($result as $table){
			echo '<li><a href="?table=' . $table['Tables_in_createtable'] .'">' . $table['Tables_in_createtable']. '</a></li>';
		}
		echo '</ol>';
		
	?>
</body>
</html>	