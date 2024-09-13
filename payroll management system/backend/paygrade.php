<?php
  $servername="localhost";
  $user="root";
  $password="";
  $dbname="sample";
  $conn=new mysqli($servername,$user,$password,$dbname);
  if($conn ->connect_error){
    die("connection failed:".$conn ->connect_error);
  }
  $sql="SELECT * FROM paygrade";
  $result=$conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<table border=5>
  <tr>
    
  <th>grade_id</th>
    
  <th>dept_id</th>
  <th>grade_name</th>
  <th>grade_basic</th>
  <th>grade_pa</th>
  <th>grade_da</th>
  <th>grade_ta</th>
  <th>grade_bonus</th>
    
  </tr>";
  
    
    // output data of each row
    
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['grade_id'] . "</td>";
    echo "<td>" . $row['department_id'] . "</td>";
    echo "<td>" . $row['grade_name'] . "</td>";
    echo "<td>" . $row['grade_basic'] . "</td>";
    echo "<td>" . $row['grade_pa'] . "</td>";
    echo "<td>" . $row['grade_da'] . "</td>";
    echo "<td>" . $row['grade_ta'] . "</td>";
    echo "<td>" . $row['grade_bonus'] . "</td>";

    }
    
    echo "</table>";
    
    } 
    else {
    
    echo "0 results";
    
    }
$conn ->close();
?>