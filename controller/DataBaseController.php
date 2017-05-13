<?php

class DataBaseController {
	private $model = null;
	
	function __construct ($db) {
		include 'model/ModelDataBase.php';
		$this->model = new ModelDataBase($db);
	}
	
	private function render($template, $params = null) {
		$fileTemplate = 'template/'.$template;
		if (is_file($fileTemplate)) {
			ob_start();
			if (count($params) > 0) {
				extract($params);
			}
			include $fileTemplate;
			return ob_get_clean();
		}
	}
	
	//форма создания БД
	function getCreateTable() {
		echo $this->render('table/add.php');
	}
	
	function createTable() {
		$nameTable =  		trim(htmlspecialchars($_POST['nameTable']));
		$nameField =  		trim(htmlspecialchars($_POST['nameField']));
		$field = 			trim(htmlspecialchars($_POST['field']));
		$lengthField =  	trim(htmlspecialchars($_POST['lengthField']));
		$defaultField = 	trim(htmlspecialchars($_POST['defaultField']));
		
		if(!empty($primaryField) && !empty($ai)){
			$primaryField = 	trim(htmlspecialchars($_POST['primaryField']));
			$ai = 				trim(htmlspecialchars($_POST['ai']));
		}
		
	
	$type = '';
	
	if(!empty($field)){
		$type = "(" . $nameField . " " .  $field . "(" . $lengthField . ") " . $defaultField . ")";
	}
	
	if(!empty($primaryField) && !empty($ai)){
		$type = "(" . $nameField . " " .  $field . "(" . $lengthField . ") " . $defaultField . " AUTO_INCREMENT, PRIMARY KEY (". $nameField ."))";
	}
	
	if(!empty($_POST['nameField2'])){
		$nameField2 =  		trim(htmlspecialchars($_POST['nameField2']));
		$field2 = 			trim(htmlspecialchars($_POST['field2']));
		$lengthField2 =  	trim(htmlspecialchars($_POST['lengthField2']));
		$defaultField2 = 	trim(htmlspecialchars($_POST['defaultField2']));
		
		$type = "(" . $nameField . " " .  $field . "(" . $lengthField . ") " . $defaultField . " AUTO_INCREMENT, " .
			$nameField2 . " " . $field2 . "(" . $lengthField2 . ")" . ",
					
		
		PRIMARY KEY (". $nameField ."))";
	}
	
	$idAdd = $this->model->add([
		'nameTable' => $nameTable,
		'type' => $type
		]);
	}
	
	function getTable() {
		$result = $this->model->show();
		echo $this->render('table/show.php', ['result' => $result]);
	}
	
	function showTable(){
		$table = $this->model->findAll();
		echo $this->render('table/showtable.php', ['table' => $table]);
	}
	
	function editField(){
		$edit = $this->model->find();
	}
	
	function updateField($update, $type) {
		$updateF = $this->model->alter($update, $type);
	}
	
	function editType(){
		$editType = $this->model->findType();
	}
	
	function updateType($name) {
		$updateT = $this->model->alter($name);
	}
	
	function deleteTable(){
		$del = $this->model->delete();
	}
}