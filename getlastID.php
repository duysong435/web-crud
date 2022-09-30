<?php
/* Cố gắng kết nối máy chủ MySQL. Giả sử bạn đang chạy MySQL
Máy chủ có cài đặt mặc định (người dùng 'root' không có mật khẩu) */
// $link = mysqli_connect("localhost", "root", "", "demo");
//  require_once('config.php' );
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');
 
/* Cố gắng kết nối với cơ sở dữ liệu MySQL */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Kiểm tra kết nối
if($mysqli === false){
    die("ERROR: Không thể kết nối. " . $mysqli->connect_error);
}
 
// Cố gắng thực hiện câu lệnh INSERT
$sql = "INSERT INTO employees (name, address, salary) VALUES ('Jon', 'Weasley', 10)";
if($mysqli->query($sql) === true){
    // Lấy ID đã chèn cuối cùng
    $last_id = $mysqli->insert_id;
    echo "Chèn bản ghi thành công. ID đã chèn cuối cùng là: " . $last_id;
} else{
    echo "ERROR: Không thể thực thi câu lệnh $sql. " . $mysqli->error;
}
 
// Đóng kết nối
$mysqli->close();
?>

