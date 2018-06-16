<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "resumes");
$column = array("candidates.id_candidate", "candidates.full_name", "candidates.career", "candidates.experience", "candidates.spanish_language", "candidates.english_language");
$query = "
 SELECT * FROM candidates";
$query .= " WHERE ";

if(isset($_POST["search"]["value"]))
{
 $query .= '(candidates.id_candidate LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR candidates.full_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR candidates.career LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR candidates.experience LIKE "%'.$_POST["search"]["value"].'%") ';

}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY candidates.id_candidate DESC ';
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
 $sub_array[] = $row["id_candidate"];
 $sub_array[] = $row["full_name"];
 $sub_array[] = $row["career"];
 $sub_array[] = $row["experience"];
 $sub_array[] = $row["spanish_language"];
 $sub_array[] = $row["english_language"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM candidates";
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
