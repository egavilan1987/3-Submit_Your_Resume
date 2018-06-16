<?php 
$connect = mysqli_connect("localhost", "root", "", "resumes");
$query = "SELECT * FROM candidates ORDER BY id_candidates ASC";
$result = mysqli_query($connect, $query);
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
   <h1 align="center">Candidates Data</h1>
   <br />
   
   <div class="table-responsive">
    <table id="resumesData" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Career</th>
       <th>Experience</th>
       <th>Spanish</th>
       <th>English</th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 load_data();

 function load_data(is_candidate)
 { 
  var dataTable = $('#resumesData').DataTable({
   "processing":true,
   "serverSide":true,
   "order":[],
   "ajax":{
    url:"fetch.php",
    type:"POST",
    data:{is_candidate:is_candidate}
   },
   "columnDefs":[
    {

     "orderable":false,
    },
   ],
  });
 }
});
</script>
