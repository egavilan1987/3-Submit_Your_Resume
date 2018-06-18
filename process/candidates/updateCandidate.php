<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Candidates.php";

	$obj= new Candidates();

	$candidateData=array(
		$_POST['idCandidate'],
		$_POST['fullNameUpdate'],
		$_POST['dateBirthUpdate'],
		$_POST['genderUpdate'],
		$_POST['placeBirthUpdate'],
		$_POST['idNumberUpdate'],
		$_POST['addressUpdate'],
		$_POST['phone1Update'],
		$_POST['phone2Update'],
		$_POST['emailUpdate'],
		$_POST['careerUpdate'],
		$_POST['hoursAvailableUpdate'],
		$_POST['experienceUpdate'],
		$_POST['esUpdate'],
		$_POST['enUpdate']
			);

	$obj= new Candidates();
	print_r($candidateData);

	echo $obj->updateCandidate($candidateData);

 ?>
