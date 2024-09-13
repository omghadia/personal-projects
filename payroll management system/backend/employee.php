<?php
  $servername="localhost";
  $user="root";
  $password="";
  $dbname="sample";
  $conn=new mysqli($servername,$user,$password,$dbname);
  if($conn ->connect_error){
    die("connection failed:".$conn ->connect_error);
  }
  $sql="SELECT * FROM employee";
  $result=$conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<table border=5>
  <tr>
    
  <th>emp_id</th>  
  <th>emp_name</th>
  <th>emp_doj</th>
  <th>emp_dob</th>
  <th>emp_mobile_no</th>
  <th>grade_id</th>
  
    
  </tr>";
  
    
    // output data of each row
    
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['emp_id'] . "</td>";
    echo "<td>" . $row['emp_name'] . "</td>";
    echo "<td>" . $row['emp_doj'] . "</td>";
    echo "<td>" . $row['emp_dob'] . "</td>";
    echo "<td>" . $row['emp_mobile_no'] . "</td>";
    echo "<td>" . $row['grade_id'] . "</td>";
    
    }
    
    echo "</table>";
    
    } 
    else {
    
    echo "0 results";
    
    }
$conn ->close();
?>