<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "userRegister");
$column = array("users.idUser", "users.userName", "users.firstName", "users.lastName");
$query = "
 SELECT * FROM users";
$query .= " WHERE ";

if(isset($_POST["search"]["value"]))
{
 $query .= '(users.idUser LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR users.userName LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR users.firstName LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR users.lastName LIKE "%'.$_POST["search"]["value"].'%") ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY users.idUser DESC ';
}

$query1 = '';

if($_POST["length"] != 1)
{
 $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["idUser"];
 $sub_array[] = $row["userName"];
 $sub_array[] = $row["firstName"];
 $sub_array[] = $row["lastName"];
 $sub_array[] = $row["lastName"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM users";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
