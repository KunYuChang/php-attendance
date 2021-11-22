<?php  

  $title = 'Index'; 
  include_once "./includes/header.php";
  require_once "./db/conn.php";  

  $results = $crud->getSpecialties();
?>

<h1 class="text-center">Registration for IT Conference</h1>

<!-- 
    - First Name
    - Last Name
    - Date of Birth (Use DatePicker)
    - Specialty(Database Admin, Software Developer, Web Administrator)
    - Email Address
    - Contact Number
 -->

<form method="post" action="success.php"> 
  <!-- 姓 -->
  <div class="mb-3">
    <label for="firstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="firstName" name="firstName" required>   
  </div>
  <!-- 名 -->
  <div class="mb-3">
    <label for="lastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lastName" name="lastName">   
  </div>
  <!-- 生日 -->
  <div class="mb-3">
    <label for="dob" class="form-label">Date Of Barth</label>
    <input type="date" class="form-control" id="dob" name="dob">   
  </div>
  <!-- 專長 -->
  <div class="mb-3">
    <select name="expertise" class="form-select form-select-lg">
      <option selected>Area of Expertise</option>
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
      <?php } ?>
    </select>  
  </div>
  <!-- 信箱 -->
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email"> 
  </div>
  <!-- 電話 -->
  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="phone" name="phone">
  </div>

  <div class="d-grid">
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>

</form>

<?php include_once "./includes/footer.php"; ?>  