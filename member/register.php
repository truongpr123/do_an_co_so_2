<?php
$conn = mysqli_connect("localhost", "root", "", "do_an_2") or die($conn);

if (isset($_POST['registerBtn'])){

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
echo 'Đăng ký thành công!';

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration PHP và MySQL</title>
</head>
<body>
<div class="header">
<h2>Đăng ký thành viên</h2>
</div>

<form method="POST" action="<?php ($_SERVER['PHP_SELF'])?>">
<table>
<tr>
<td>
<input type="text" name="username" placeholder="Tên đăng ký">
</td>
</tr>
<tr>
<tr>
<td>
<input type="email" name="email" placeholder="Địa chỉ Email">
</td>
</tr>
<tr>
<td>
<input type="password" name="password" placeholder="Mật khẩu">
</td>
</tr>
<tr>
<td>
<button type="submit" class="btn" name="registerBtn">Đăng ký</button>
</td>
</tr>
</table>
</form>
</body>
</html>