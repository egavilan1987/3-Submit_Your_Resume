<?php 

	require_once "../../classes/connection.php";
	require_once "../../classes/Candidates.php";


	$obj= new Candidates();


	$idCandidate=$_POST['idCandidate'];
					
	echo json_encode($obj->getCandidatesData($idCandidate));

 ?>
