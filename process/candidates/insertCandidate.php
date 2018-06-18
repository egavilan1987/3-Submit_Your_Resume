<?php 
	require_once "../../classes/connection.php";
	require_once "../../classes/Candidates.php";
  
	$obj= new Candidates();

	$data=array();

	$fileName=$_FILES['resume']['name'];
    $storagePath=$_FILES['resume']['tmp_name'];
    $folder='../../files/';
    $finalPath=$folder.$fileName;

    $dataFile=array(
		$fileName,
		$finalPath
			);

    if(move_uploaded_file($storagePath, $finalPath)){


    		$idDocument=$obj->insertDocument($dataFile);

    		if($idDocument > 0){
    				//$data[0]=$idDocument1;
					$data[1]=$_POST['fullName'];
					$data[2]=$_POST['dateBirth'];
					$data[3]=$_POST['gender'];
					$data[4]=$_POST['placeBirth'];
					$data[5]=$_POST['idNumber'];
					$data[6]=$_POST['address'];
					$data[7]=$_POST['phone1'];
					$data[8]=$_POST['phone2'];
					$data[9]=$_POST['email'];
					$data[10]=$_POST['career'];
					$data[11]=$_POST['hoursAvailable'];
					$data[12]=$_POST['experience'];
					$data[13]=$_POST['es'];
					$data[14]=$_POST['en'];
					echo $obj->insertCandidate($data);
				}else{
					echo 0;
				}	

			}


?>

