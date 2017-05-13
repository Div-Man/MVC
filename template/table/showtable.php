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
	<p><a href="?/bd/showtables">Перейти к просмотру таблиц</a></p>
	
	<?php
		if(!empty($_GET['editfield'])){
			include 'renameField.php';
		}
		
		if(!empty($_GET['type2']) && !empty($_GET['table'])){
			include 'renameType.php';
		}
		
		echo '<table>';
			echo '<tr>
					<th>Field</th>
					<th>Type</th>
					<th>Null</th>
					<th>Key</th>
					<th>Default</th>
					<th>Extra</th>
					<th>Удаление столбца</th>
				</tr>';
			
			foreach($table as $tab){
				echo '<tr>
						<td>' .$tab['Field'] . ' <a href="?field=' . $tab['Field'] . '&' . 'table=' . $_GET['table'].'&editfield=ok&type=' . $tab['Type'].'">Изменить</a></td>
						<td>' .$tab['Type'] . ' <a href="?field=' . $tab['Field'] . '&' . 'table=' . $_GET['table']. '&type2='. $tab['Type'] .'">Изменить</a></td>
						<td>' .$tab['Null'] . '</td>
						<td>' .$tab['Key'] . '</td>
						<td>' .$tab['Default'] . '</td>
						<td>' .$tab['Extra'] . '</td>
						<td><a href="?delfielde=' . $tab['Field'] . '&table=' . $_GET['table'] . '">Удалить</a></td>
					</tr>';
			}
		echo '</table>';
	?>
</body>
</html>	