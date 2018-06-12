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
						now())";
			
			return mysqli_query($connection,$sql);
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


  	}
?>
