<?php $servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "baze_istrynimui";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


include("view/entry_form.php") ;

// if ($conn->query("general") != true){
// $sql = "CREATE TABLE general (
//   id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   rank VARCHAR(15),
//   f_name VARCHAR(30) NOT NULL,
//   s_name VARCHAR(30) NOT NULL,
//   main_reserv BOOLEAN,
//   st_date DATE NOT NULL,
//   en_date DATE NOT NULL,
//   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//   )";
// }

// $sql = "INSERT INTO general( rank, f_name, s_name, main_reserv, st_date, en_date)
//           values ('srg.', 'vardenis', 'pavardenis', true, 2023-06-15, 2024-02-12)";

echo "<pre>";
print_r($conn);
?>