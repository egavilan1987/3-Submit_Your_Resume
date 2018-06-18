<!DOCTYPE html>
<html>
<head>
	<title>Candidates Manager</title>
	<?php require_once "menu.php"; ?>

</head>
<body>
	<div id="loadCandidatesTable"></div>
</body>
</html>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#loadCandidatesTable').load("candidates/index.php");
		});
	</script>  

	<script type="text/javascript">
		function addCandidate(idCandidate){
			$.ajax({
				type:"POST",
				data:"idCandidate=" + idCandidate,
				url:"../process/candidates/getCandidatesData.php",
				success:function(r){
					data=jQuery.parseJSON(r);
					$('#idCandidate').val(data['id_candidate']);
					$('#fullNameUpdate').val(data['full_name']);
					$('#dateBirthUpdate').val(data['date_birth']);
					$('#genderUpdate').val(data['gender']);
					$('#placeBirthUpdate').val(data['birth_place']);
					$('#idNumberUpdate').val(data['id_number']);
					$('#addressUpdate').val(data['address']);
					$('#phone1Update').val(data['phone1']);
					$('#phone2Update').val(data['phone2']);
					$('#emailUpdate').val(data['email']);
					$('#careerUpdate').val(data['career']);
					$('#hoursAvailableUpdate').val(data['hours_available']);
					$('#experienceUpdate').val(data['experience']);
					$('#esUpdate').val(data['spanish_language']);
					$('#enUpdate').val(data['english_language']);
				}
			});
		}			
		function deleteCandidate(idCandidate){
			alertify.confirm('Do you want to delete the candidate?', function(){ 
				$.ajax({
					type:"POST",
					data:"idCandidate=" + idCandidate,
					url:"../process/candidates/deleteCandidate.php",
					success:function(r){
						if(r==1){
							$('#loadCandidatesTable').load("candidates/index.php");
							alertify.success("Candidate successfuly deleted!");
						}else{
							alertify.error("Candidate could not be deleled.");
						}
					}
				});
			}, function(){ 
				alertify.error('Canceled!')
			});
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#updateCandidateBtn2').click(function(){
				data=$('#frmUpdateCandidate').serialize();
				$.ajax({
					type:"POST",
					data:data,
					url:"../process/candidates/updateCandidate.php",
					success:function(r){
						console.log(r);
					}
				});
			});
		});
	</script>