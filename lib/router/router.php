<?php

include 'controller/DataBaseController.php';

$dataBase = new DataBaseController($db);


if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(empty($_GET)){
		$dataBase->getCreateTable();
	}
	if(array_key_exists('/bd/showtables', $_GET )){
		$dataBase->getTable();
	}
	
	if($_GET['table']){
		echo '<p>Выбрана таблица ' . $_GET['table'] . '</p>';
		$dataBase->showTable();
	}
	
	if(!empty($_GET['editfield'])){
		$dataBase->editField();
	}
	
	if(!empty($_GET['edit'])){
		$dataBase->updateField($_GET['rename'],  $_GET['type']);			
	}
	
	if(!empty($_GET['type2']) && !empty($_GET['table'])){
		$dataBase->editType();
	}
	
	if(!empty($_GET['edit2'])){
		$dataBase->updateType($_GET['rename']);			
	}
	
	if(!empty($_GET['delfielde']) && !empty($_GET['table'])){
		$dataBase->deleteTable();
	}
}

elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(!empty($_POST['createTable'])){
		$dataBase->createTable();
	}
}