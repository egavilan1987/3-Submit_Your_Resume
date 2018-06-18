<!DOCTYPE html>
<html>
<head>
	<title>Submit Your Resumer</title>
	<?php require_once "menu.php"; ?>
</head>

<body>
		<div class="container">
			<h3>¡Start building your career today!</h3>
			<div class="row">
				<form id="frmCandidate">
				<div class="col-sm-6">
						<div class="form-group col-sm-12" >
							<label>Full Name</label>
							<input type="text" class="form-control input-sm" name="fullName" id="fullName">
						</div>
							<div class="form-group col-sm-12" >
							<label>Date of Birth</label>
								<input type="date" name="dateBirth" id="dateBirth" class="form-control">
							</div>

						<div class="form-group col-sm-12" >
							<label for="gender">Gender</label>
							<select name="gender" id="gender" class="form-control">
								<option selected>---</option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						</div>
						<div class="form-group col-sm-12" >
							<label>Place of Birth</label>
							<input type="text" class="form-control input-sm" name="placeBirth" id="placeBirth">
							</div>
						<div class="form-group col-sm-12" >
							<label>Passport Number/ID</label>
							<input type="text" class="form-control input-sm" name="idNumber" id="idNumber ">
						</div>
						<div class="form-group col-sm-12" >
            				<label>Address</label>
							<textarea type="text" style="resize:none;" class="form-control input-sm" name="address" id="address"></textarea>
						</div>			
				</div>

				<div class="col-sm-6">

						<div class="form-group col-sm-6" >
            				<label>Phone 1</label>
							<input type="number" class="form-control input-sm" name="phone1" id="phone1">
						</div>
						<div class="form-group col-sm-6" >
            				<label>Phone 2</label>
							<input type="number" class="form-control input-sm" name="phone2" id="phone2">
						</div>
						<div class="form-group col-sm-12" >
							<label>Email</label>
							<input type="email" class="form-control input-sm" name="email" id="email" placeholder="name@example.com">
						</div>
						<div class="form-group col-sm-12" >
						  <div class="form-group">
						    <label for="exampleFormControlSelect1">Career</label>
						    <select class="form-control" name="career" id="career">
						      <option>---</option>
						      <option>Customer Service Representative</option>
						      <option>Bilingual Trainer</option>
						      <option>Sales Representative</option>
						      <option>Programmer</option>
						      <option>Other</option>
						    </select>
						  </div>
						</div>
						<div class="form-group col-sm-12" >
							<label>Hours available for work purposes</label>
							<input type="text" class="form-control input-sm" name="hoursAvailable" id="hoursAvailable">
						</div>
						<div class="form-group col-sm-9" >
            				<label>Experience in Call Centers?</label>
						</div>
						<div class="form-group col-sm-3" >
						  <div class="form-group">
						    <select class="form-control" name="experience" id="experience">
						      <option>---</option>
						      <option>Yes</option>
						      <option>No</option>
						    </select>
						  </div>
						</div>
						<div class="form-group col-sm-12" >
            				<label>Resume</label>
							<input type="file" id="resume" name="resume">
						</div>
					</div>

				<div class="col-sm-12">
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
                                    <input type="radio" name="es" value="none"/>
                                </td>
                                <td>
                                    <input type="radio" name="es" value="low" />
                                </td>
                                <td>
                                    <input type="radio" name="es" value="medium" />
                                </td>
                                <td>
                                    <input type="radio" name="es" value="high" />
                                </td>
                                <td>
                                    <input type="radio" name="es" value="native" checked="checked"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    English                                </td>
                                <td>
                                    <input type="radio" name="en" value="none" checked="checked"/>
                                </td>
                                <td>
                                    <input type="radio" name="en" value="low" />
                                </td>
                                <td>
                                    <input type="radio" name="en" value="medium" />
                                </td>
                                <td>
                                    <input type="radio" name="en" value="high" />
                                </td>
                                <td>
                                    <input type="radio" name="en" value="native" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
				</form>

			</div>
				<div class="modal-footer">
						<button id="Save" type="button" class="btn btn-warning" data-dismiss="modal">Save Changes</button>
				</div>
		</div>


	</script>  
    
    	<script type="text/javascript">
		$(document).ready(function(){
			$('#Save').click(function(){
					Empties=validateEmptyForm('frmCandidate');
					/*
					if(Empties > 0){
						alertify.alert("You must fill all of the fields!");
						return false;
					}*/
				var formData = new FormData(document.getElementById("frmCandidate"));
				$.ajax({
					url: "../process/candidates/insertCandidate.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success:function(r){
						
						if(r > 0){
							//$('#frmCandidate')[0].reset();
							alertify.success("Item successfully added");
						}else{
							alertify.error("Upload failed");
						}
					}
				});
			});
		});
	</script>
</body>
</html>
