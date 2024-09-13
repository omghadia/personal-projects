<?php
include('config.php');
$msg = "";

if (isset($_POST['submit'])) {
  $dept_id = mysqli_real_escape_string($conn, $_POST['dept_id']);
  $dept_name = mysqli_real_escape_string($conn, $_POST['dept_name']);

  // Validate the form data
  $errors = array();
  if (empty($dept_id)) {
    $errors[] = "Department ID is required";
  } elseif (!preg_match('/^\d+$/', $dept_id)) {
    $errors[] = "Department ID must consist of only integers";
  }
  if (empty($dept_name)) {
    $errors[] = "Department Name is required";
  } elseif (!preg_match('/^[a-zA-Z\s]+$/', $dept_name)) {
    $errors[] = "Department Name can only contain letters and spaces";
  }

  if (!empty($errors)) {
    // If there are validation errors, display them to the user
    $msg = implode("<br>", $errors);
  } else {
    // If there are no validation errors, insert the data into the database
    $sql = "INSERT INTO department(department_id,department_name) values('$dept_id','$dept_name')";
    if (mysqli_query($conn, $sql)) {
      echo "<script>window.location.href ='home.php'</script>";
    } else {
      $msg = "Error: " . mysqli_error($conn);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Department</title>
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
          <label for="Department id">Department id</label><br>
          <input type = "text" name="dept_id" required>
        </div>
        <br>
        <div class="form-group">
          <label for="Department name">Department name</label><br>
          <input type = "text" name="dept_name" required>
        </div>
      <br>
       
      <center><button type="submit" name='submit'>Submit</button></center>
      <?php echo $msg; ?>
      </form>
</body>