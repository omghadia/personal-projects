<?php
$msg ='';
// Connect to the database
include('config.php');
if (isset($_POST['submit'])) {
    // Get the employee ID from the form
    $emp_id = $_POST['emp_id'];

    // Retrieve employee information from the database
    $sql_employee = "SELECT * FROM employee WHERE emp_id = '$emp_id'";
    $result_employee = mysqli_query($conn, $sql_employee);

    // Retrieve paygrade information from the database
    $sql_paygrade = "SELECT * FROM paygrade WHERE grade_id = (SELECT grade_id FROM employee WHERE emp_id = '$emp_id')";
    $result_paygrade = mysqli_query($conn, $sql_paygrade);

    // Calculate the total salary
    $row_paygrade = mysqli_fetch_assoc($result_paygrade);
    $grade_basic = $row_paygrade['grade_basic'];
    $grade_da = $row_paygrade['grade_da'];
    $grade_ta = $row_paygrade['grade_ta'];
    $grade_bonus = $row_paygrade['grade_bonus'];
    $grade_pa = $row_paygrade['grade_pa'];

    $total_salary = $grade_basic + ($grade_basic * $grade_da/100) + ($grade_basic * $grade_ta/100) + ($grade_basic * $grade_bonus/100) + $grade_pa - ($grade_basic * 0.2) ;

    // Display the payslip in a table
    if (mysqli_num_rows($result_employee) > 0) {
        $row_employee = mysqli_fetch_assoc($result_employee);
        $msg = "<h2>Payslip for ".$row_employee['emp_name']."</h2>";
        $msg .= "<div style='background-color: white;'>";
        $msg .= "<table>";
        $msg .= "<tr><td>Employee ID:</td><td>".$row_employee['emp_id']."</td></tr>";
        $msg .= "<tr><td>Base Salary:</td><td>".$grade_basic."</td></tr>";
        $msg .= "<tr><td>Dearness Allowance:</td><td>".$grade_da."%</td></tr>";
        $msg .= "<tr><td>Travel Allowance:</td><td>".$grade_ta."%</td></tr>";
        $msg .= "<tr><td>Bonus:</td><td>".$grade_bonus."%</td></tr>";
        $msg .= "<tr><td>Personal Allowance:</td><td>".$grade_pa."</td></tr>";
        $msg .= "<tr><td>Travel Allowance:</td><td>".$grade_ta."</td></tr>";
        $msg .= "<tr><td>Total Salary:</td><td>".$total_salary."</td></tr>";
        $msg .= "</table>";
        $msg .= "</div>";
        $msg .= "<style>#form-div {display: none;}</style>";
    } else {
        $msg = "No employee found with ID ".$emp_id;
    }
    // Hide the form after submitting
    echo "<style> form {display:none;} </style>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payslip</title>
    <link rel="stylesheet" href="department.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>


<style> 
select {
  width: 100%;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}
</style>

<body>
    <form action='' method = 'POST'>
        <h2>New Department Detail Form</h2>
        <br>
        <div class="form-group">
          <label for="Employee id">Employee id</label><br>
          <input type = "text" name="emp_id" required>
        </div>
        
       
      <center><button type="submit" name='submit'>Submit</button></center>
      </form>
      <div style="background-color: white;">
      <?php echo $msg; ?>
</div>
</body>