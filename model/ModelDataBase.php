<?php

class ModelDataBase {
	private $db = null;
	
	function __construct ($db) {
		$this->db = $db;
	}
	
	function add($params) {
		$createTable = "CREATE TABLE " . $params['nameTable'] . " " . $params['type'];
		$addTable = $this->db->prepare($createTable);
		$addTable->execute();
		
		header('Location: ?/bd/showtables');
	}
	
	//список таблиц
	function show(){
		$showTables = "SHOW TABLES";
		$show = $this->db->prepare($showTables);
		if($show->execute()){
			return $show->fetchAll();
		}
		return false;
		
	}
	
	//список строк у таблиц
	function findAll(){
		$describeTable = 'DESCRIBE ' . $_GET['table'];
		$res = $this->db->prepare($describeTable);
		if($res->execute()){
			return $res->fetchAll();
		}
		return false;
	}
	
	function recordFile($file){
		$fl = fopen("alter.txt", "w");
		fwrite($fl, $file);
				
		fclose($fl);
				
		$table = fopen('tablename.txt', 'w');
		fwrite($table, trim(htmlspecialchars($_GET['table'])));	
		fclose($table);
			
	}
	
	//изменение имени у поля
	function find() {
		$table = trim(htmlspecialchars($_GET['table']));
		$field = trim(htmlspecialchars($_GET['field']));
	
		$zapros = "ALTER TABLE " . $table . " CHANGE " . $field . " ";
		
		$this->recordFile($zapros);
	}
	
	function findType() {
		$table = trim(htmlspecialchars($_GET['table']));
		$field = trim(htmlspecialchars($_GET['field']));
			
		$zapros = "ALTER TABLE " . $table . " CHANGE " . $field . " " . $field . " ";
		$this->recordFile($zapros);
	}
	
	function alter($update, $type=null){
		$fl = file_get_contents('alter.txt', true);
		$res = $fl . $update . ' ' .  $type;
		$fl2 = file_get_contents('tablename.txt', true);
		$alterTable = $this->db->prepare($res);
		$alterTable->execute();
		header('Location: ?table=' . $fl2);
	}
	
	function delete(){
		$drop = 'ALTER TABLE ' . $_GET['table'] . ' DROP ' . $_GET['delfielde'];
		$del = $this->db->prepare($drop);
		$del->execute();
		header('Location: ?table=' . $_GET['table']);
	}	
}