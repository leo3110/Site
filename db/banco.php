<?php
class RI extends RecursiveIteratorIterator {
	function __construct($it) {
		parent::__construct($it, self::LEAVES_ONLY);
	}
	function current() {
		return parent::current();
	}
}
function buscaTK(){
	$server = "localhost";
	$user = "root";
	$pass = "";
	try {
		$conn = new PDO("mysql:host=$server;dbname=tk", $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("select leo_tk, karu_tk from contagem");
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		foreach(new RI(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			echo "<span id=".$k.">".$v."</span>";
		}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	} finally {

		$conn = null;
	}
}
function incrementa(){
	$server = "localhost";
    $user = "root";
    $pass = "";
    try {
      $conn = new PDO("mysql:host=$server;dbname=tk",$user,$pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "update contagem set ". $_GET['vacilo'] ."_tk = ".$_GET['vacilo']."_tk + 1 where id_tk = 1";
      $conn->exec($sql);
	}catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	} finally {
		$conn = null;
	}
}
