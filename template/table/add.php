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
	<form method="POST">
		<table>
		<tr class="center">
			<td>Создать таблицу</td>
			<td><input type="text" name="nameTable"></td>
			<td>Длину вводить обязательно</td>
			<td colspan="2">Это не обязательно</td>
		</tr>
		<tr>
			<th>Имя поля</th>
			<th>Тип</th>
			<th>Длина</th>
			<th>По умолчанию</th>
			<th>Первичный ключ и AI</th>
		</tr>
		<tr>
			<td><input type="text" name="nameField"></td>
			<td>
				<select name="field">
					<option>INT</option>
					<option>VARCHAR</option>
					<option>CHAR</option>
					<option>TEXT</option>
				</select>
			</td>
			<td><input type="text" name="lengthField"></td>
			<td>
				<select name="defaultField">
					<option>NULL</option>
					<option>NOT NULL</option>
				</select>
			</td>
			<td>
				<select name="primaryField">
					<option>---</option>
					<option>PRIMARY</option>
				</select>
				<input type="checkbox" name="ai">
			</td>
		</tr>
		
		<tr>
			<td><input type="text" name="nameField2"></td>
			<td>
				<select name="field2">
					<option>INT</option>
					<option>VARCHAR</option>
					<option>CHAR</option>
					<option>TEXT</option>
				</select>
			</td>
			<td><input type="text" name="lengthField2"></td>
			<td>
				<select name="defaultField2">
					<option>NULL</option>
					<option>NOT NULL</option>
				</select>
			</td>
			<td>
				<select>
					<option>---</option>
					<option>PRIMARY</option>
				</select>
				<input type="checkbox">
			</td>
		</tr>
		</table>
		<input type="submit" value="Создать" name="createTable">
	</form>
</body>
</html>	