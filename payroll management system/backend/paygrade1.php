<?php
include('config.php');
$msg = "";
$sql = "SELECT department_name FROM department";
$result = mysqli_query($conn, $sql);


if (isset($_POST['submit'])) {
  $grade_ID = mysqli_real_escape_string($conn, $_POST['grade_ID']);
  $grade_name = mysqli_real_escape_string($conn, $_POST['grade_name']);
  $grade_basic = mysqli_real_escape_string($conn, $_POST['grade_basic']);
  $dept_name = mysqli_real_escape_string($conn, $_POST['department']);
  $grade_pa = mysqli_real_escape_string($conn, $_POST['grade_pa']);
  $grade_da = mysqli_real_escape_string($conn, $_POST['grade_da']);
  $grade_ta = mysqli_real_escape_string($conn, $_POST['grade_ta']);
  $grade_bonus = mysqli_real_escape_string($conn, $_POST['grade_bonus']);

  // Validate the form data
  $errors = array();
  if (empty($grade_ID)) {
    $errors[] = "Grade ID is required";
  } elseif (!preg_match('/^\d+$/', $grade_ID)) {
    $errors[] = "Grade ID must consist of only integers";
  }
  if (empty($grade_basic)) {
    $errors[] = "Grade Basic is required";
  } elseif (!preg_match('/^\d+$/', $grade_basic)) {
    $errors[] = "Grade Basic must consist of only integers";
  }
  // Add validation for other form fields as needed

  if (!empty($errors)) {
    // If there are validation errors, display them to the user
    $msg = implode("<br>", $errors);
  } else {
    // If there are no validation errors, insert the data into the database
    $sql = "INSERT INTO paygrade(grade_id,grade_name,grade_basic,department_name,grade_da,grade_ta,grade_pa,grade_bonus) values('$grade_ID','$grade_name','$grade_basic','$dept_name','$grade_da','$grade_ta','$grade_pa','$grade_bonus')";
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
    <title>Paygrade</title>
    
    <link rel="stylesheet" href="styles.css">
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
        <h2>Paygrade HomePage</h2>

        <div class="form-group">
          <select class="form-select" id="m_Paygrade" name="grade_name" aria-label="Default select example" required>
            <option selected>Grade Name</option>
            <option value="1">Assistant</option>
            <option value="2">Employee</option>
            <option value="3">Head</option>
        </select>
        </div>

        <div class="form-group">
          <label for="Grade ID">Grade ID</label>
          <input type = "text" name="grade_ID" required>
          </div>
          
       

        <div class="form-group">
          <label for="Grade Basic">Grade Basic</label>
          <input type = "text" name="grade_basic" required>
        </div>

        <label for="department">Department Name:</label>
        <select id="department" name="department">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <option value="<?php echo $row['department_name']; ?>"><?php echo $row['department_name']; ?></option>
        <?php endwhile; ?>
        </select>

        <div class="form-group">
          <select class="form-select" id="m_Paygrade" name="grade_pa" aria-label="Default select example" required>
            <option selected>Grade Personal Allowance</option>
            <option value="10000">10000</option>
            <option value="15000">15000</option>
            <option value="20000">20000</option>
            <option value="25000">25000</option>
            <option value="30000">30000</option>
          </select>
          </div>
          <div class="form-group">
            <select class="form-select" id="m_Paygrade" name="grade_da" aria-label="Default select example" required>
              <option selected>Grade Dearness Allowance</option>
              <option value="5">5%</option>
              <option value="10">10%</option>
              <option value="15">15%</option>
              <option value="20">20%</option>
            </select>
            </div>

            <div class="form-group">
              <select class="form-select" id="m_Paygrade" name="grade_ta" aria-label="Default select example" required>
                <option selected>Grade Travel Allowance</option>
                <option value="1">1%</option>
                <option value="2">2%</option>
                <option value="3">3%</option>
                <option value="5">5%</option>
              </select>
              </div>


            <div class="form-group">
              <select class="form-select" id="m_Paygrade" name="grade_bonus" aria-label="Default select example" required>
                <option selected>Grade Bonus</option>
                <option value="5">5%</option>
                <option value="10">10%</option>
                <option value="15">15%</option>
                <option value="20">20%</option>
              </select>
              </div>       
        <br>
        <br>

       
        <center><button type="submit" name='submit' class="btn btn-primary btn-lg">Submit</button></center>
        <?php echo $msg; ?>
      </form>
</body>
</body>