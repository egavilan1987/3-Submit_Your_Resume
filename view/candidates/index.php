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
   <h1 align="center">Candidates Data</h1>
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


                <td><a class="btn btn btn-warning" data-toggle="modal" data-target="#updateCandidateModal" onclick="addCandidate('.$row["id_candidate"].')"><span class="glyphicon glyphicon-edit"></span></a></td>


                <td><a class="btn btn btn-danger" class="delete"><span class="glyphicon glyphicon-remove" onclick="deleteCandidate('.$row["id_candidate"].')"></span></a></td>
              </tr>
            ';
          }
        }
        ?>
    </table>
   </div>
  </div>

    <div id="loadUsersTable"></div>

    <!-- Modal -->
    <div class="modal fade" id="updateCandidateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update Candidates Test</h4>
          </div>
          <div class="modal-body">

    <div class="container">
      <h3 class="text-danger">This part is just for test purpose.</h3>
      <div class="row">
        <form id="frmUpdateCandidate">
        <div class="col-sm-8">
            <div class="form-group col-sm-8" >
              <input type="text" hidden="" id="idCandidate" name="idCandidate">
              <label>Full Name</label>
              <input type="text" class="form-control input-sm" name="fullNameUpdate" id="fullNameUpdate">
            </div>
              <div class="form-group col-sm-8" >
              <label>Date of Birth</label>
                <input type="date" name="dateBirthUpdate" id="dateBirthUpdate" class="form-control">
              </div>

            <div class="form-group col-sm-8" >
              <label for="gender">Gender</label>
              <select name="genderUpdate" id="genderUpdate" class="form-control">
                <option selected>---</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-group col-sm-8" >
              <label>Place of Birth</label>
              <input type="text" class="form-control input-sm" name="placeBirthUpdate" id="placeBirthUpdate">
              </div>
            <div class="form-group col-sm-8" >
              <label>Passport Number/ID</label>
              <input type="text" class="form-control input-sm" name="idNumberUpdate" id="idNumberUpdate ">
            </div>
            <div class="form-group col-sm-8" >
                    <label>Address</label>
              <textarea type="text" style="resize:none;" class="form-control input-sm" name="addressUpdate" id="addressUpdate"></textarea>
            </div>      


            <div class="form-group col-sm-8" >
                    <label>Phone 1</label>
              <input type="number" class="form-control input-sm" name="phone1Update" id="phone1Update">
            </div>
            <div class="form-group col-sm-8" >
                    <label>Phone 2</label>
              <input type="number" class="form-control input-sm" name="phone2Update" id="phone2Update">
            </div>
            <div class="form-group col-sm-8" >
              <label>Email</label>
              <input type="email" class="form-control input-sm" name="emailUpdate" id="emailUpdate" placeholder="name@example.com">
            </div>
            <div class="form-group col-sm-8" >
              <div class="form-group">
                <label for="exampleFormControlSelect1">Career</label>
                <select class="form-control" name="careerUpdate" id="careerUpdate">
                  <option>---</option>
                  <option>Customer Service Representative</option>
                  <option>Bilingual Trainer</option>
                  <option>Sales Representative</option>
                  <option>Programmer</option>
                  <option>Other</option>
                </select>
              </div>
            </div>
            <div class="form-group col-sm-8" >
              <label>Hours available for work purposes</label>
              <input type="text" class="form-control input-sm" name="hoursAvailableUpdate" id="hoursAvailableUpdate">
            </div>
            <div class="form-group col-sm-8" >
                    <label>Experience in Call Centers?</label>
            </div>
            <div class="form-group col-sm-8" >
              <div class="form-group">
                <select class="form-control" name="experienceUpdate" id="experienceUpdate">
                  <option>---</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
            </div>
            <div class="form-group col-sm-8" >
                    <label>Resume</label>
              <input type="file" id="resumeUpdate" name="resumeUpdate">
            </div>
          </div>

        <div class="col-sm-6">
                    <table  class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Languages</th>
                                <th>None</th>
                                <th>Low</th>
                                <th>Medium</th>
                                <th>High</th>
                                <th>Native</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Spanish                                </td>
                                <td>
                                    <input type="radio" name="esUpdate" value="none"/>
                                </td>
                                <td>
                                    <input type="radio" name="esUpdate" value="low" />
                                </td>
                                <td>
                                    <input type="radio" name="esUpdate" value="medium" />
                                </td>
                                <td>
                                    <input type="radio" name="esUpdate" value="high" />
                                </td>
                                <td>
                                    <input type="radio" name="esUpdate" value="native" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    English                                </td>
                                <td>
                                    <input type="radio" name="enUpdate" value="none" />
                                </td>
                                <td>
                                    <input type="radio" name="enUpdate" value="low" />
                                </td>
                                <td>
                                    <input type="radio" name="enUpdate" value="medium" />
                                </td>
                                <td>
                                    <input type="radio" name="enUpdate" value="high" />
                                </td>
                                <td>
                                    <input type="radio" name="enUpdate" value="native" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </form>


      </div>
    </div>
          </div>
          <div class="modal-footer">
            <button id="updateCandidateBtn" type="button" class="btn btn-warning" data-dismiss="modal">Save changes</button>

          </div>
        </div>
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

  <script type="text/javascript">
    $(document).ready(function(){
      $('#updateCandidateBtn').click(function(){
        data=$('#frmUpdateCandidate').serialize();
        $.ajax({
          type:"POST",
          data:data,
          url:"../process/candidates/updateCandidate.php",
          success:function(r){
            alert (r);
          }
        });
      });
    });
  </script>


