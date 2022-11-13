<!-- CATALOG FUNCTION -->
<h1>Products Control</h1>
<?php 
  include ('configs/connectDB.php');
  $sql_cat = "SELECT * FROM categories ORDER BY catID ASC";
  if($connect->query($sql_cat)){
    $result = $connect->query($sql_cat);
    $arr_result = $result->fetch_all(MYSQLI_ASSOC);
  }else{
    die('error:'.$connect->connect_error);
  }
  // include ('configs/closeDB.php');
?>
<table class="table categories-tbl">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Category Name</th>
      <th scope="col">Control Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
      foreach($arr_result as $row){
    ?>
    <tr>
    <th scope="row"> <?php echo $row['catID']; ?></th>
    <td><?php echo $row['catName']; ?></td>
    <td>
      <button type="button" class="btn btn-sm btn-primary"><a href="modules/handles/productshandle.php?act=deletecat&catid=<?php echo $row['catID']; ?>">Delete</a></button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<!-- ADD CATEGORY FUNCTION -->
<button id="btn-add-cat" class="btn btn-sm btn-primary"><i class="ti-import"></i>   ADD NEW CATEGORY</button>
<div class="modal-addCatForm js-addform">
  <div class="addCatForm-container js-addform-ctn">
    <div class="addCatForm-close js-addform-close">
      <i class="ti-close"></i>
    </div>
    <form action="modules/handles/productshandle.php" method="POST">
      <h2> ADD A NEW CATEGORY </h2>
      <div class="mb-3 row">
        <label for="inputcatid" class="col-sm-2 col-form-label">Category ID</label>
        <div class="col-sm-10">
          <input type="text" name="catid" class="form-control" id="inputcatid">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputcatname" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
          <input type="text" name="catname" class="form-control" id="inputcatname">
        </div>
      </div>
      <button type="submit" name="addcat" class="btn btn-primary"> <i class="ti-save" ></i> SAVE</button>
    </form>
  </div>
</div>
<!-- PRODUCT TABLE -->
<table class="table products-tbl">
  <thead>
    <tr>
      <th class="col-1">STT</th>
      <th class="col-2">Product Name</th>
      <th class="col-1">Price</th>
      <th class="col-1">Product Image</th>
      <th class="col-1">Quantity</th>
      <th class="col-1">CatName</th>
      <th class="col-2">Description</th>
      <th class="col-2">Control</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql_product = "SELECT * FROM categories,products WHERE categories.catID = products.catID ORDER BY productID ASC";
    if($connect->query($sql_cat)){
      $products = $connect->query($sql_product);
      $arr_products = $products->fetch_all(MYSQLI_ASSOC);
    }else{
      die('error:'.$connect->connect_error);
    }
      foreach($arr_products as $pro){
    ?>
      <tr>
        <td><?php echo $pro['productID']; ?></td>
        <td><?php echo $pro['productName']; ?></td>
        <td><?php echo $pro['price']; ?></td>
        <td> <img src="modules/handles/upload/<?php echo $pro['imageLink']; ?>" alt="<?php echo $pro['imageLink']; ?>" width="120px"></td>
        <td><?php echo $pro['quantity']; ?></td>
        <td><?php echo $pro['catName']; ?></td>
        <td><?php echo $pro['description']; ?></td>
        <td>
          <button type="button" class="btn btn-sm btn-primary btn-edit-product">Edit</button>
          <button type="button" class="btn btn-sm btn-primary"><a href="modules/handles/productshandle.php?productid=<?php echo $pro['productID']; ?>">Delete</a></button>
        </td>
      </tr>
    <?php }?>
  </tbody>
</table>
<!-- ADD PRODUCTS FUNCTION -->
<button id="btn-add-pro" class="btn btn-sm btn-primary"> <i class="ti-import"></i>    ADD NEW PRODUCT</button>
<div class="modal-addProductForm js-addproduct">
  <div class="addProductForm-container js-addproduct-ctn">
    <div class="addProductForm-close js-addproduct-close">
      <i class="ti-close"></i>
    </div>
    <form action="modules/handles/productshandle.php" method="POST" enctype="multipart/form-data">
      <h2> ADD A NEW PRODUCT </h2>
      <div class="mb-3 row">
        <label for="inputproid" class="col-sm-2 col-form-label">Product ID</label>
        <div class="col-sm-10">
          <input type="text" name="productid" class="form-control" id="inputproid">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputproname" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
          <input type="text" name="productname" class="form-control" id="inputproname">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputprocode" class="col-sm-2 col-form-label">Product Code</label>
        <div class="col-sm-10">
          <input type="text" name="productcode" class="form-control" id="inputprocode">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputproprice" class="col-sm-2 col-form-label">Product Price</label>
        <div class="col-sm-10">
          <input type="text" name="price" class="form-control" id="inputproprice">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputproimage" class="col-sm-2 col-form-label">Product Image</label>
        <div class="col-sm-10">
          <input type="file" name="imglink" class="form-control" id="inputproimage">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputproquantity" class="col-sm-2 col-form-label">Product Quantity</label>
        <div class="col-sm-10">
          <input type="text" name="quantity" class="form-control" id="inputproquantity">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputdes" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <textarea rows="8" name="descript" class="form-control" id="inputdes">
          </textarea>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputprocatid" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
          <select name="catename" style="width: 100%;">
            <?php 
            foreach($arr_result as $row){         
            ?>
            <option value="<?php echo $row['catID'] ?>"> <?php echo $row['catName'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <button type="submit" name="addproduct" class="btn btn-primary"> <i class="ti-save" ></i> SAVE</button>
    </form>
  </div>
</div>
<!-- EDIT PRODUCTS FUNCTION -->
<div class="modal-editProductForm js-editproduct">
  <div class="editProductForm-container js-editproduct-ctn">
    <div class="editProductForm-close js-editproduct-close">
      <i class="ti-close"></i>
    </div>
    <form action="modules/handles/productshandle.php?productid=<?php echo $pro['productID']; ?>" method="POST" enctype="multipart/form-data">
      <h2> EDIT THIS PRODUCT </h2>
      <div class="mb-3 row">
        <label for="inputproname" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
          <input type="text" name="productname" class="form-control" id="inputproname">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputprocode" class="col-sm-2 col-form-label">Product Code</label>
        <div class="col-sm-10">
          <input type="text" name="productcode" class="form-control" id="inputprocode">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputproprice" class="col-sm-2 col-form-label">Product Price</label>
        <div class="col-sm-10">
          <input type="text" name="price" class="form-control" id="inputproprice">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputproimage" class="col-sm-2 col-form-label">Product Image</label>
        <div class="col-sm-10">
          <input type="file" name="imglink" class="form-control" id="inputproimage" >
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputproquantity" class="col-sm-2 col-form-label">Product Quantity</label>
        <div class="col-sm-10">
          <input type="text" name="quantity" class="form-control" id="inputproquantity">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputdes" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <textarea rows="8" name="descript" class="form-control" id="inputdes"">
          </textarea>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputprocatid" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
          <select name="catename" style="width: 100%;">
            <?php 
            foreach($arr_result as $row){         
            ?>
            <option value="<?php echo $row['catID'] ?>"> <?php echo $row['catName'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <button type="submit" name="editproduct" class="btn btn-primary"> <i class="ti-save" ></i> SAVE</button>
    </form>
  </div>
</div>
<script src="./js/products.js"></script>