<?php

// Kết nối CSDL
$conn = mysqli_connect ('localhost', 'root', '', 'do_an_2') or die ('Không thể kết nối tới database');
mysqli_set_charset($conn, 'UTF8');

// Khởi tạo SESSION
session_start();
if (isset($_SESSION['username'])){
unset($_SESSION['username']);
}

// Dùng Isset kẻm tra
if (isset($_POST['login'])) {

$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);

if (!$username || !$password) {
echo "Nhập đầy đủ thông tin <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;
}

// mã hóa pasword
// $password = md5($password);

//Kiểm tra tên đăng nhập có tồn tại không
$query = "SELECT username, password FROM users WHERE username='$username'";

$result = mysqli_query($conn, $query) or die( mysqli_error($conn));

$row = mysqli_fetch_array($result);

//So sánh 2 mật khẩu có trùng khớp hay không
if ($password != $row['password']) {
echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;
}

//Lưu tên đăng nhập
$_SESSION['username'] = $username;
echo "Xin chào <b>" .$username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";
die();
$connect->close();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<form action='<?php ($_SERVER['PHP_SELF'])?>' class="dangnhap" method='POST'>
Tên đăng nhập : <input type='text' name='username' />
Mật khẩu : <input type='password' name='password' />
<input type='submit' class="button" name="login" value='Đăng nhập' />
<form>
</body>
</html>