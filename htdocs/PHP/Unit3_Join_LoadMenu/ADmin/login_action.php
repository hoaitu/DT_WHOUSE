
<?php 
session_start();


// session
require_once ('../connection.php');
date_default_timezone_set('Asia/Ho_Chi_Minh'); //láy đúng time phải set
if (isset($_POST['submit'] ) && $_POST ['Email']!= '' && $_POST ['pass']!= '' ) {

    // <!-- lay du lieu len -->
    $email = $_POST['Email'] ;
    $password = md5($_POST['pass']) ; 
// echo $email ."<br>";
// echo $password ;

$query_category = "SELECT * FROM  authors  WHERE email = '".$email."' AND  password = '".$password."' AND  stattus = 1 "; 

// var_dump($query_category);
$result_category = $connection->query($query_category)-> fetch_assoc();
// var_dump($result_category) ;
// cau lenh kiem tra xem nguoi dung co ton tai tronf he thong ko 


    

         


if ($result_category !== NULL ) {
    // khởi tạo sestion
    $_SESSION['isLogin'] = true;
    $_SESSION['authour'] = $result_category;
      // $_SESSION['authour'] = $email;
setcookie('msg', 'DN thanh cong' , time()+5);
    //dua toi dau
    header('Location: index.php');

    }else {
        setcookie('msg', 'DN khong thanh cong , ban  da nhap sai user or pass' , time()+5);
      header('Location: login.php');
    }
}else {
    setcookie('msg', 'DN khong thanh cong ,Dien day du tt' , time()+5);
         header('Location: login.php'); 
}


       

             ?>
             <!--   // setcookie('msg' , 'Dang nhap thanh cong ' , time() + 2);
        header ("Location : index.php");

         }else {
            setcookie('msg' , 'Dang nhap that bai' , time () + 2);
     header ("Location : login.php");
    } -->