<?php
include('dbcon.php');
if(isset($_POST["id"]))
{
    $result = $conn->query("SELECT * FROM employee WHERE id = '".$_POST["id"]."'");
    $output = '';
    foreach($result as $row)
    {
      $output .= '
      <p align="center"><img src="images/'.$row["photo"].'" class="img-thumbnail" /></p>
	  
      <p>Name : '.$row["name"].'</p>';
    }
    echo $output;
}
?>