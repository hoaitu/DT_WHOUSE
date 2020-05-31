<?php 

	session_start();
 // session_destroy();
  if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true ){
        header('Location: login.php');
         }


 ?>
 <?php 
 	if (isset($_SESSION['cart'])) {
       // $_SESSION ['isLogin'] =[];
  ?>
  <table class="table table-hover">
  	<thead>
  		<tr>
  			<th>STT</th>
  			<th>Name</th>
  			<th>QTY</th>
  			<th>Action</th>
  			<th>Action</th>
  		
  	</tr>
    </thead>
    <!-- Nếu thêm gio hàng thành công -->
              <?php if (isset($_SESSION['success'])){?>
              <p class="text-danger"> <?=$_SESSION['success'] ?></p>
              <?php } ;  unset($_SESSION['success']) ?>
    <tbody>
        <?php foreach ($_SESSION['cart'] as $key => $value ) {
        
        ?>
      <tr>
        <td><?= $key ?></td>
        <td><?= $value['title']?></td>
        <td><?= $value['qty']?></td>
        <td>
          <input type="number" name="qty" id="qty" value="<?= $value ['qty']?>" min= "0">
        </td>
        <td><a href="delete.php?key=<?=$key?>" >Delete</a></td>
            <td><a href="javascrip:void(0)">Update</a></td>
        
        
      </tr>
    <?php } ?>

    <button type="submit" class="btn btn-default">Update</button>
    </tbody>
  </table>
  <?php } else { ?>
    <p>KO ton tai gio hang</p>
    <?php } ?>