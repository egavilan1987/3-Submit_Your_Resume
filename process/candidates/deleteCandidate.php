<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Candidates.php";

	$data=$_POST['idCandidate'];


	$obj= new Candidates();

	echo $obj->deleteCandidate($data);


 ?>