<form>
	<label for="rename">Новое имя поля: </label>
	<input type="text" id="rename" name="rename" value="<?php echo $_GET['field']?>">
	<input type="hidden" name="type" value="<?php echo $_GET['type']?>">
	<input type="submit" name="edit" value="Изменить">
</form>
