<h1>Member Control</h1>
<?php 
  include ('configs/connectDB.php');
  $sql = "SELECT * FROM users ORDER BY userID ASC";
  if($connect->query($sql)){
    $result = $connect->query($sql);
    $arr_result = $result->fetch_all(MYSQLI_ASSOC);
  }else{
    die('error:'.$connect->connect_error);
  }
  include ('configs/closeDB.php');
?>
<table class="table member-tbl">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Control</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($arr_result as $row){
    ?>
    <tr>
      <th scope="row"><?php echo $row['userID']; ?></th>
      <td><?php echo $row['userEmail']; ?></td>
      <td><?php echo $row['userPassword']; ?></td>
      <td><?php echo $row['userName']; ?></td>
      <td><?php echo $row['userPhone']; ?></td>
      <td>
      <button type="button" class="btn btn-sm btn-primary btn-edit-form">Edit</button>
      <button type="button" class="btn btn-sm btn-primary"><a href="modules/handles/membershandle.php?action=delete&userid=<?php echo $row['userID']; ?>">Deleted</a></button>
      </td>
    </tr>
      <?php } ?>
  </tbody>
</table>
<!-- ADD MEMBER FUNCTION -->
<button id="btn-add-form" class="btn btn-sm btn-primary">ADD A NEW MEMBER</button>
<div class="modal-addform js-addform">
  <div class="addform-container js-addform-ctn">
    <div class="addform-close js-addform-close">
      <i class="ti-close"></i>
    </div>
    <form action="modules/handles/membershandle.php" method="POST">
      <h2> ADD A NEW MEMBER </h2>
      <div class="mb-3 row">
        <label for="inputuserid" class="col-sm-2 col-form-label">User ID</label>
        <div class="col-sm-10">
          <input type="text" name="userId" class="form-control" id="inputuserid">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" name="email" class="form-control" id="staticEmail">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="text" name="password" class="form-control" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control" id="inputName">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPhone" class="col-sm-2 col-form-label">Phone number</label>
        <div class="col-sm-10">
          <input type="text" name="phone" class="form-control" id="inputPhone">
        </div>
      </div>
      <button type="submit" name="add" class="btn btn-primary">ADD</button>
    </form>
  </div>
</div>
<!-- EDIT MEMBER FUNCTION -->
<div class="modal-editform js-editform">
  <div class="editform-container js-editform-ctn">
    <div class="editform-close js-editform-close">
      <i class="ti-close"></i>
    </div>
    <form action="modules/handles/membershandle.php?userid=<?php echo $row['userID'] ?>" method="POST">
      <h2> EDIT INFORMATION </h2>
      <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">New Email</label>
        <div class="col-sm-10">
          <input type="text" name="newemail" class="form-control" id="staticEmail">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
        <div class="col-sm-10">
          <input type="text" name="newpassword" class="form-control" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputName" class="col-sm-2 col-form-label">New Name</label>
        <div class="col-sm-10">
          <input type="text" name="newname" class="form-control" id="inputName">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPhone" class="col-sm-2 col-form-label">New Phone number</label>
        <div class="col-sm-10">
          <input type="text" name="newphone" class="form-control" id="inputPhone">
        </div>
      </div>
      <button type="submit" name="edit" class="btn btn-primary">EDIT</button>
    </form>
  </div>
</div>
<script src="./js/members.js"></script>