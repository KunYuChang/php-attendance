<?php

$title = 'Edit Record';
include_once "./includes/header.php";
require_once "./db/conn.php";

// 獲取要渲染的選項
$results = $crud->getSpecialties();

// 檢查viewrecords是否有傳送id參數過來
if (!isset($_GET['id'])) {
  // echo 'error';
  include 'includes/errormessage.php';
  header("Location: viewrecords.php");
} else {
  $id = $_GET['id'];
  $attendee = $crud->getAttendeeDetails($id);
?>

  <h1 class="text-center">Edit Record</h1>

  <!-- 表單將傳送到editpost -->
  <form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>">
    <!-- 姓 -->
    <div class="mb-3">
      <label for="firstName" class="form-label">First Name</label>
      <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstName" name="firstName">
    </div>
    <!-- 名 -->
    <div class="mb-3">
      <label for="lastName" class="form-label">Last Name</label>
      <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastName" name="lastName">
    </div>
    <!-- 生日 -->
    <div class="mb-3">
      <label for="dob" class="form-label">Date Of Barth</label>
      <input type="date" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
    </div>
    <!-- 專長 -->
    <div class="mb-3">
      <select name="expertise" class="form-select form-select-lg">
        <option selected>Area of Expertise</option>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
          <option value="<?php echo $r['specialty_id'] ?>" 
            <?php
              if ($r['specialty_id'] == $attendee['specialty_id']) echo 'selected'
            ?>>       
            <?php echo $r['name']; ?>
          </option>
        <?php } ?>
      </select>
    </div>
    <!-- 信箱 -->
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" name="email">
    </div>
    <!-- 電話 -->
    <div class="mb-3">
      <label for="phone" class="form-label">Contact Number</label>
      <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone">
    </div>

    <div class="d-grid">
      <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
    </div>

  </form>

<?php } ?>

<?php include_once "./includes/footer.php"; ?>