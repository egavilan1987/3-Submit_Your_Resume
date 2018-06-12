<!DOCTYPE html>
<html>
<head>
	<title>Candidates Manager</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
		<div class="container">
			<h1>Candidates Manager</h1>
				<div class="col-sm-8">
					<div id="loadUsersTable"></div>
			</div>
		</div>
	
  	<script type="text/javascript">
		$(document).ready(function(){
			$('#loadUsersTable').load("candidates/candidatesTable.php");
		});
	</script>  
    
</body>
</html>
