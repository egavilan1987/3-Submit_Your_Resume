<?php
	require_once "../../classes/connection.php";

			$c=new Connect();
			$conn=$c->connection();
	$sql="SELECT id_candidate, 
				id_document,
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
				created_date 
		FROM candidates";
	$result=mysqli_query($conn,$sql);
 ?>

<table table id ="tableId" class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Candidates</label></caption>
	<a class="btn btn-primary" href="../pdf/usersInvoice.php" target="_blank" role="button">Export to PDF</a>
	 

	<tr class="bg-info">
      <th scope="col">ID</th>
      <th scope="col">ID Doc</th>
      <th scope="col">Full Name</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Gender</th>
      <th scope="col">Place of Birth</th>
      <th scope="col">ID</th>
      <th scope="col">Address</th>
      <th scope="col">Phone 1</th>
      <th scope="col">Phone 2</th>
      <th scope="col">Email</th>
      <th scope="col">Career</th>
      <th scope="col">Hours</th>
      <th scope="col">Experience</th>
      <th scope="col">Spanish</th>
      <th scope="col">English</th>
      <th scope="col">Created Date</th>
      <th scope="col">PDF</th>
    </tr>



	 	<?php while($row=mysqli_fetch_row($result)): ?>

	 	<tr>
	 		<td><?php echo $row[0]; ?></td>
	 		<td><?php echo $row[1]; ?></td>
	 		<td><?php echo $row[2]; ?></td>
	 		<td><?php echo $row[3]; ?></td>
	 		<td><?php echo $row[4]; ?></td>
	 		<td><?php echo $row[5]; ?></td>
	 		<td><?php echo $row[6]; ?></td>
	 		<td><?php echo $row[7]; ?></td>
	 		<td><?php echo $row[8]; ?></td>
	 		<td><?php echo $row[9]; ?></td>
	 		<td><?php echo $row[10]; ?></td>
	 		<td><?php echo $row[11]; ?></td>
	 		<td><?php echo $row[12]; ?></td>
	 		<td><?php echo $row[13]; ?></td>
	 		<td><?php echo $row[14]; ?></td>
	 		<td><?php echo $row[15]; ?></td>
	 		<td><?php echo $row[16]; ?></td>
			<td>
				<span class="btn btn-default btn-xs" onclick="printUser('<?php echo $row[0]; ?>')">
					<span class="glyphicon glyphicon-print"></span>
				</span>
			</td>
	 	</tr>
	 <?php endwhile; ?>
	 </table>
</div>

<script> 

    /* API method to get paging information */

    'use strict';
	var $ = jQuery;
	$.getScript("https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js", function(){
       
            $('#tableId').DataTable( {
                "paging":   true,
                "ordering": true,
                "info":     false
            } );
	});

</script> 