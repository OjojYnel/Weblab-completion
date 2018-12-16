<center>
<?php
include 'config.php';

  if(isset($_POST['upload']))
  {

    $target = "../stored/".basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];
    $desc = $_POST['desc'];
    $icode = $_POST['icode'];
    $ename = $_POST['ename'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $sql = "INSERT INTO `equipment`(`equipment_code`, `equipment_name`, `category`, `equipment_price`, `equipment_pic`, `equipment_desc`,`equipment_quantity`) VALUES ('$icode','$ename','$category','$price','$image','$desc','$qty')";
    $result = mysqli_query($con,$sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
      $msg = "Image Uploaded Successfully!";
    } else{
      $msg = "Image Uploaded Failed!";
    }

    if($result) {
echo 'Equipment Added';
    }else{
      echo 'Equipment, Not Added';
    }


    header("refresh:1;url=add.php");

    }
?>

</center>
