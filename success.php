<?php

$title = 'Index';
include_once "./includes/header.php";
require_once "./db/conn.php";

if (isset($_POST['submit'])) {
  // EXTRACT VALUES FROM THE $_POST ARRAY
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $contact = $_POST['phone'];
  $specialty = $_POST['expertise'];
  // CALL FUNCTION TO INSERT AND TRACK IF SUCCESS OR NOT
  $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

  if ($isSuccess) {
    include "./includes/successmessage.php";
  } else {
    include "./includes/errormessage.php";
  }
}
?>

<?php include_once "./includes/footer.php"; ?>  