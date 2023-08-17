function validateEmployeeManagementForm() {
  var employeeID = document.forms['employeeManagementForm']['employeeID'].value;
  var title = document.forms['employeeManagementForm']['title'].value;
  var firstName = document.forms['employeeManagementForm']['firstName'].value;
  var lastName = document.forms['employeeManagementForm']['lastName'].value;
  var gender = document.forms['employeeManagementForm']['gender'].value;
  var dateOfBirth = document.forms['employeeManagementForm']['dateOfBirth'].value;
  var contactNumber = document.forms['employeeManagementForm']['contactNumber'].value;
  var emergencyContactNumber = document.forms['employeeManagementForm']['emergencyContactNumber'].value;
  var email = document.forms['employeeManagementForm']['email'].value;
  var address = document.forms['employeeManagementForm']['address'].value;
  var position = document.forms['employeeManagementForm']['position'].value;

  var flag = true;
  var errorMsg = "";

  let atPos = email.indexOf('@');
  let dotPos = email.lastIndexOf('.');


  if (employeeID.trim() === "") {
    alert("Employee ID is a mandatory Field.\n");
    flag = false;
  }
  else if (title.trim() === "Title") {
    alert("Title is a mandatory Field.\n");
    flag = false;
  }
  else if (firstName.trim() === "") {
    alert("First Name is a mandatory Field.\n");
    flag = false;
  }
  else if (lastName.trim() === "") {
    alert("Last Name is a mandatory Field.\n");
    flag = false;
  }
  else if (gender.trim() === "Gender") {
    alert("Gender is a mandatory Field.\n");
    flag = false;
  }
  else if (dateOfBirth.trim() === "") {
    alert("Date of Birth is a mandatory Field.\n");
    flag = false;
  }
  else if (contactNumber.trim() === "") {
    alert("Contact Number is a mandatory Field.\n");
    flag = false;
  }
  else if (emergencyContactNumber.trim() === "") {
    alert("Emergency Contact Number is a mandatory Field.\n");
    flag = false;
  }
  else if (email.trim() === "") {
    alert("Email is a mandatory Field.\n");
    flag = false;
  }
  else if (address.trim() === "") {
    alert("Address is a mandatory Field.\n");
    flag = false;
  }
  else if (position.trim() === "") {
    alert("Position is a mandatory Field.\n");
    flag = false;
  }
  else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === email.length - 1) {
    alert("Please enter a valid email address.\n");
    flag = false;
  }
  // if (!flag) {
  //     alert(errorMsg);
  // }

  return flag;
}
