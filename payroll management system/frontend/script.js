var x = 0;

function validateNumber() {
  var number = $('#phone').val();
  if (!/^\d{10}$/.test(number)) {
    alert("Please enter a valid phone number.");
    x = x + 1;
  }

  var empId = $('#emp_id').val();
  if (!/^\d*$/.test(empId)) {
    alert("Please enter a valid employee ID.");
    x = x + 1;
  }

  var empCity = $('#emp_city').val();
  if (!empCity) {
    alert("Employee city cannot be empty.");
    x = x + 1;
  } else if (!/^[a-zA-Z]+$/.test(empCity)) {
    alert("Employee city must consist of only letters.");
    x = x + 1;
  }

  var empName = $('#emp_name').val();
  if (!empName) {
    alert("Employee name cannot be empty.");
    x = x + 1;
  } else if (!/^[a-zA-Z]+$/.test(empName)) {
    alert("Employee name must consist of only letters.");
    x = x + 1;
  }
}
