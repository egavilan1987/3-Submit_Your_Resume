<?php
  //invoice.php  
  include('database_connection.php');

  $statement = $connect->prepare("SELECT * FROM candidates ORDER BY id_candidate ASC");

  $statement->execute();

  $all_result = $statement->fetchAll();

  $total_rows = $statement->rowCount();
?>

<html>
 <head>
  <title>Datatables Individual column searching using PHP Ajax Jquery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <div class="container">
   <h1 align="center">Candidates Data (Invoice)</h1>
   <br />
   
   <div class="table-responsive">
    <table id="resumesData" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Full Name</th>
       <th>Career</th>
       <th>Experience</th>
       <th>Spanish</th>
       <th>English</th>
       <th>Doc</th>
       <th>PDF</th>
       <th>Show</th>
       <th>Update</th>
       <th>Delete</th>
      </tr>
     </thead>
        <?php
        if($total_rows > 0)
        {
          foreach($all_result as $row)
          {
            echo '
              <tr>
                <td>'.$row["id_candidate"].'</td>
                <td>'.$row["full_name"].'</td>
                <td>'.$row["career"].'</td>
                <td>'.$row["experience"].'</td>
                <td>'.$row["spanish_language"].'</td>
                <td>'.$row["english_language"].'</td>
                <td><a class="btn btn btn-primary" href="print_invoice.php?pdf=1&id='.$row["id_candidate"].'">Doc</a></td>
                <td><a class="btn btn btn-info" href="print_invoice.php?pdf=1&id='.$row["id_candidate"].'">PDF</a></td>
                <td><a class="btn btn btn-success" href="invoice.php?update=1&id='.$row["id_candidate"].'"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                <td><a class="btn btn btn-warning" href="invoice.php?update=1&id='.$row["id_candidate"].'"><span class="glyphicon glyphicon-edit"></span></a></td>
                <td><a class="btn btn btn-danger" href="#" id="'.$row["id_candidate"].'" class="delete"><span class="glyphicon glyphicon-remove"></span></a></td>
              </tr>
            ';
          }
        }
        ?>
    </table>
   </div>
  </div>
 </body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  var dataTable = $('#resumesData').DataTable({
    "columnDefs":[
    {
     "targets":[6,7,8,9,10],
     "orderable":false,
    },
   ],
  });
  });
</script>
