<?php 
	class Candidates{
		public function insertCandidate($data){
    
			$c=new Connect();
			$connection=$c->connection();
          
			$sql="INSERT INTO candidates(
									full_name,
									date_birth,
									gender,
									birth_place,
									id_number,
									address,
									phone1,
									phone2,
									email,
									career,
									hours_available,
									experience,
									spanish_language,
									english_language, 
									created_date)
						VALUES (
								
								'$data[1]',
								'$data[2]',
								'$data[3]',
                				'$data[4]',
                				'$data[5]',
								'$data[6]',
								'$data[7]',
								'$data[8]',
                				'$data[9]',
                				'$data[10]',
								'$data[11]',
								'$data[12]',
								'$data[13]',
								'$data[14]',
						now())";
			
			 mysqli_query($connection,$sql);

			return mysqli_insert_id($connection);
		}

		public function insertDocument($data){
			$c=new Connect();
			$connection=$c->connection();

			$sql="INSERT INTO documents (
										document_name,
										path_storage,
										uploaded_date
										)
							VALUES ('$data[0]',
									'$data[1]',
									 now())";


			$result=mysqli_query($connection,$sql);

			return mysqli_insert_id($connection);

		}
public function deleteCandidate($idCandidate){

			$c=new Connect();
			$connection=$c->connection();

			$sql="DELETE FROM candidates WHERE id_candidate='$idCandidate'";

			return mysqli_query($connection,$sql);
		}
		public function updateCandidate($data){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$sql="UPDATE candidates SET full_name='$data[1]',
							date_birth='$data[2]',
							gender='$data[3]',
							birth_place='$data[4]',
							id_number='$data[5]',
							address='$data[6]',
							phone1='$data[7]',
							phone2='$data[8]',
							email='$data[9]',
							career='$data[10]',
							hours_available='$data[11]',
							experience='$data[12]',
							spanish_language='$data[13]',
							english_language='$data[14]'
						WHERE id_candidate='$data[0]'";

			return mysqli_query($connection,$sql);	
		}

public function getCandidatesData($idCandidate){
			$c=new Connect();
			$connection=$c->connection();

			$sql="SELECT id_candidate, 
						full_name, 
						date_birth,
						gender,
						birth_place,
						id_number,
						address,
						phone1,
						phone2,
						email,
						career,
						hours_available,
						experience,
						spanish_language,
						english_language
				FROM candidates 
				WHERE id_candidate='$idCandidate'";
			$result=mysqli_query($connection,$sql);

			$row=mysqli_fetch_row($result);

			$candidateArray=array(
					"id_candidate" => $row[0],
					"full_name" => $row[1],
					"date_birth" => $row[2],
					"gender" => $row[3],
					"birth_place" => $row[4],
					"id_number" => $row[5],
					"address" => $row[6],
					"phone1" => $row[7],
					"phone2" => $row[8],
					"email" => $row[9],
					"career" => $row[10],
					"hours_available" => $row[11],
					"experience" => $row[12],
					"spanish_language" => $row[13],
					"english_language" => $row[14]
						);
			return $candidateArray;
		}
  	}
?>


