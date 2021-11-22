<?php

  require_once "./db/conn.php"; 
  // Get values from post operation
  if (isset($_POST['submit'])) {
    // EXTRACT VALUES FROM THE $_POST ARRAY
    $id = $_POST['id'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['expertise'];

    // Call Crud function
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact,$specialty);

    // Redirect to index.php
    if ($result) {      
      header("Location: viewrecords.php");
    } else {
      include 'includes/errormessage.php';
    }
  }  else {
    include 'includes/errormessage.php';
  }
?>